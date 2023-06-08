<?php


class User_Controller extends Base_Controller
{
    public function index()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/user/user-index');
    }

    public function login()
    {
        if (isset($_SESSION['isSignedIn'])) {
            redirect('');
        }
        $this->layout->set('null');
        $this->view->load('admin/user/user-login');
    }

    public function checkLogin()
    {
        $email = isset($_POST['a-login-email']) ? trim($_POST['a-login-email']) : '';
        $password = isset($_POST['a-login-password']) ? trim($_POST['a-login-password']) : '';
        // Tim kiem theo email va neu tim thay thi tra ve 1 account
        $account = $this->model->nhanvien->searchAccount($email);
        if (!empty($account)) {
            // $validAccount = true if (===email and ===password)
            $validEmail = ($email === $account['email']) ? true : false;
            $validPassword = password_verify($password . $email, $account['matKhau']);
            $validateAccount = $validEmail && $validPassword;
            if ($validateAccount) {
                // Dung mat khau
                // Neu account bi vo hieu hoa thi thong bao
                if ($account['status'] === "2") {
                    redirect('user/noticeDisable');
                } else if ($account['status'] === "0") {
                    // Neu account chua duoc kich hoat thi chuyen sang trang thong bao can kich hoat tai khoan
                    redirect('user/noticeNotActive');
                } else {
                    $_SESSION['isSignedIn'] = true;
                    $_SESSION['idNV'] = $account['idNhanVien'];
                    $_SESSION['nameNV'] = $account['tenNhanVien'];
                    $_SESSION['sexNV'] = $account['gioiTinh'];
                    $_SESSION['birdNV'] = $account['ngaySinh'];
                    $_SESSION['addressNV'] = $account['queQuan'];
                    $_SESSION['cmndNV'] = $account['cmnd'];
                    $_SESSION['phoneNV'] = $account['soDienThoai'];
                    $_SESSION['chucvuNV'] = $account['chucvu'];
                    $_SESSION['ghichuNV'] = $account['ghiChu'];
                    $_SESSION['emailNV'] = $account['email'];
                    $_SESSION['statusNV'] = $account['status'];
                    redirect('');
                }
            } else {
                // Sai mat khau
                $_SESSION['wrong-password-admin'] = 'Mật khẩu của bạn không đúng !';
                redirect('user/login');
            }

        }
    }

    function noticeDisable()
    {
        $message = null;
        $message = "Tài khoản của bạn đã bị vô hiệu hóa !. <br />";
        $this->layout->set('null');
        $this->view->load('admin/user/user-noticeDisable', [
            'message' => $message
        ]);
    }

    function noticeNotActive()
    {
        $message = null;
        $message = "Tài khoản của bạn chưa được kích hoạt !. <br />";
        $this->layout->set('null');
        $this->view->load('admin/user/user-noticeNotActive', [
            'message' => $message
        ]);
    }

    // logout tai khoan
    function logout()
    {
        session_unset();
        session_destroy();
        redirect('user/login');
    }

    public function register()
    {
        $this->layout->set('admin_default');
        $this->view->load('admin/user/user-register');
    }

    public function createAccount()
    {
        $post = $_POST ?? null;
        $resultCreate = null;
        $resultCreate = $this->model->nhanvien->createAdminAccount();
        if ($resultCreate !== false) {
            $title = "[ Cấp tài khoản nhân viên | MobileShop ]";
            $content = "";
            $content .= "Xin chào " . $resultCreate['ten'] . ",<br /><br />";
            $content .= "Bạn đã được cấp tài khoản nhân viên (hoặc quản trị viên) trên website " . ADMIN_BASE_URL . ".<br />";
            $content .= "Thông tin tài khoản như sau: <br />";
            $content .= "Email: " . $resultCreate['email'] . "<br />";
            $content .= "Mật khẩu mặc định: MobileShop123 <br />";
            $content .= "Chức vụ: " . $resultCreate['chucvu'] . " <br />";
            $content .= "Hãy thay đổi mật khẩu ngay trong lần đầu bạn đăng nhập. Xin cảm ơn ! <br />";
            $nTo = $resultCreate['ten'];
            $mTo = $resultCreate['email'];
            $diachicc = "shopnamhoang@gmail.com";
            $mailSuccess = sendMail($title, $content, $nTo, $mTo, $diachicc);
            if ($mailSuccess) {
                redirect('user/registerSuccess/' . $resultCreate['id']);
            } else {
                redirect('user/registerFail/');
            }
        }
    }

    public function registerSuccess()
    {
        $param = getParameter();
        if (!empty($param[0])) {
            $userObject = $this->model->nhanvien->getById('nhanvien', 'idNhanVien', $param[0]);
            $this->layout->set('admin_default');
            $this->view->load('admin/user/user-registerSuccess', [
                'result' => $userObject
            ]);
        } else {
            redirect('notfound/index');
        }
    }

    public function registerFail()
    {
        $this->layout->set('admin_default');
        $this->view->load('admin/user/user-registerFail');
    }

    // ham duoc ajax goi den de tim kiem email nguoi dung (kiem email dang ky moi da ton tai trong database hay chua)
    function searchEmail()
    {
        $result = null;
        $emailPrepareRegister = null;
        $param = getParameter();
        if (!empty($param[0])) {
            $emailPrepareRegister = $param[0];
            $result = $this->model->nhanvien->searchEmail($emailPrepareRegister);
        }
        $this->layout->set('null');
        $this->view->load('admin/searchEmailResult', [
            'result' => $result
        ]);
    }

    function changePassword()
    {
        if (!isset($_SESSION['isSignedIn'])) {
            redirect('user/login');
        }
        $this->layout->set('admin_default');
        $this->view->load('admin/user/user-changePassword');
    }

    // xu li doi mat khau nhan vien
    function savePassword()
    {
        // get real current password from database
        $realPassword = null;
        $dataReturn = $this->model->nhanvien->getAdminPassword($_SESSION['idNV']);
        if (!empty($dataReturn)) {
            $realPassword = $dataReturn['matKhau'];
        }
        // data user enter in form change password
        $currentPasswordText = isset($_POST['_password_current']) ? $_POST['_password_current'] : '';
        // kiem tra mat khau hien tai nhap vao co giong voi mat khau trong CSDL la $realPassword hay khong ?
        if (!password_verify(addslashes($currentPasswordText . $_SESSION['emailNV']), $realPassword)) {
            // neu khong trung khop
            $_SESSION['error-changePassNV'] = 'Mật khẩu hiện tại không đúng !';
            redirect('user/changePassword');
        } else {
            $newPasswordText = isset($_POST['_password_new']) ? $_POST['_password_new'] : '';
            $resultUpdate = $this->model->nhanvien->updateNVPassword($_SESSION['idNV'], $newPasswordText);
            if ($resultUpdate) {
                // neu luu mat khau moi thanh cong
                $_SESSION['success-changePassNV'] = 'Đổi mật khẩu mới thành công !';
                redirect('user/changePassword');
            } else {

            }
        }
    }

    public function forgetPass()
    {
        $this->layout->set('null');
        $this->view->load('admin/user/user-forgetPass');
    }

    public function executeForgetPass()
    {
        $emailForgetPass = isset($_POST['a-email-forget']) ? addslashes(trim($_POST['a-email-forget'])) : '';
        // Tim kiem email trong database
        $existAccount = $this->model->nhanvien->searchAccount($emailForgetPass);
        if ($existAccount != null) {
            // Generate code change pass
            $codeChangePass = password_hash(strval(date('Y-m-d H:i:s')) . $emailForgetPass, PASSWORD_DEFAULT);
            // Luu code change pass vao co so du lieu cua nguoi dung
            $saveCode = $this->model->nhanvien->saveCodeChangePass($emailForgetPass, $codeChangePass);
            if ($saveCode) {
                // Gui mail cho khach hang
                $linkVerify = baseUrl('user/verifyChangePass/') . $codeChangePass;
                $title = "[ Change Member Password | MobileShop ]";
                $content = "";
                $content .= "Xin chào " . $existAccount['tenNhanVien'] . ",<br /><br />";
                $content .= "Vui lòng kích vào nút bên dưới để thay đổi mật khẩu cho tài khoản của bạn trên website " . ADMIN_BASE_URL . ".<br />";
                $content .= "<span style='background-color:#07c;margin-top:15px;width: 200px;height: 40px;display:block;border-radius: 40px;cursor: pointer;'>
                            <span style='display:block;padding:10px;cursor: pointer;'>
                                <a href='{$linkVerify}' target='_blank' style='color:white;'>
                                    ĐỔI MẬT KHẨU NGAY
                                </a>
                            </span>
                          </span>";
                $nTo = $existAccount['tenNhanVien'];
                $mTo = $existAccount['email'];
                $diachicc = "";
                $mailSuccess = sendMail($title, $content, $nTo, $mTo, $diachicc);
                if ($mailSuccess) {
                    $_SESSION['mailChangePass-success'] = "Kiểm tra hộp thư của bạn để thay đổi mật khẩu !";
                } else {
                    $_SESSION['mailChangePass-fail'] = "Gửi mail đổi mật khẩu thất bại !";
                }
            }
        } else {
            $_SESSION['mailChangePass-notexist'] = "Không tồn tại tài khoản !";
        }
        redirect('user/forgetPass');
    }

    public function verifyChangePass()
    {
        $param = getParameter();
        if (!empty($param[0])) {
            $codeChangePass = $param[0];
            // Tim kiem codeChangePass trong co so du lieu, neu tim thay thi tra ve 1 object khach hang
            $resutl = $this->model->nhanvien->findCode($codeChangePass);
            if ($resutl != null) {
                // Chuyen den trang cho nhan vien nhap mat khau moi
                $_SESSION['emailNeedChangePass'] = $resutl['email'];
                redirect('user/enterNewPass');
            } else {
                redirect('user/invalidLink');
            }
        }
    }

    public function enterNewPass()
    {
        $this->layout->set('null');
        $this->view->load('admin/user/user-enterNewPass');
    }

    public function invalidLink()
    {
        $this->layout->set('null');
        $this->view->load('admin/user/user-invalidLink');
    }

    // Luu mat khau moi cua nhan vien
    public function saveNewPass()
    {
        $emailNeedChangePass = isset($_SESSION['emailNeedChangePass']) ? $_SESSION['emailNeedChangePass'] : '';
        $newPassword = isset($_POST['fa-newpass']) ? $_POST['fa-newpass'] : '';
        if (($emailNeedChangePass != null) && ($newPassword != null)) {
            $resutl = $this->model->nhanvien->saveNewPassword($emailNeedChangePass, $newPassword);
            if ($resutl == true) {
                $_SESSION['forgetChangepassSuccess'] = "Đổi mật khẩu mới thành công !";
                unset($_SESSION['emailNeedChangePass']);
            } else {
                $_SESSION['forgetChangepassFail'] = "Đổi mật khẩu mới thất bại !";
            }
            redirect('user/enterNewPass');
        }
    }

    // Luu thong tin chinh sua tai khoan nhan vien, do admin thuc hien
    public function updateAccount()
    {
        $idNV = isset($_POST['idNV']) ? $_POST['idNV'] : '';
        $controller = isset($_POST['controller']) ? $_POST['controller'] : '';
        $resultUpdate = $this->model->nhanvien->updateAdminAccount();
        if ($resultUpdate) {
            $_SESSION['successUpdateNVInfo'] = "Cập nhật thông tin tài khoản thành viên thành công !";
        } else {
            $_SESSION['failUpdateNVInfo'] = "Bạn chưa thay đổi gì !";
        }
        redirect($controller . '/index/' . $idNV);
    }
}