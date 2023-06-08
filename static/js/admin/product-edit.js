// Kiem tra anh logo, kich thuoc 600x600
function validateLogo(ctrl) {
	var fileUpload = ctrl;
	var regex = new RegExp('([a-zA-Z0-9s_\\.-:])+(.jpg|.png|.gif)$');
	if (regex.test(fileUpload.value.toLowerCase())) {
		if (typeof fileUpload.files != 'undefined') {
			var reader = new FileReader();
			reader.readAsDataURL(fileUpload.files[0]);
			reader.onload = function(e) {
				var image = new Image();
				image.src = e.target.result;
				image.onload = function() {
					var height = this.height;
					var width = this.width;
					if (height == 600 && width == 600) {
						// alert("Ảnh hợp lệ.");
						return true;
					} else {
						fileUpload.value = '';
						alert('Ảnh không đúng kích thước 600 x 600 !');
						return false;
					}
				};
			};
		} else {
			alert('Trình duyệt của bạn không hỗ trợ HTML5.');
			return false;
		}
	} else {
		alert('Hãy chọn đúng định dạng file ảnh.');
		return false;
	}
}

// Kiem tra file anh phu, kich thuoc 1200x680
function validateImg(ctrl) {
	var fileUpload = ctrl;
	var regex = new RegExp('([a-zA-Z0-9s_\\.-:])+(.jpg|.png|.gif)$');
	if (regex.test(fileUpload.value.toLowerCase())) {
		if (typeof fileUpload.files != 'undefined') {
			var reader = new FileReader();
			reader.readAsDataURL(fileUpload.files[0]);
			reader.onload = function(e) {
				var image = new Image();
				image.src = e.target.result;
				image.onload = function() {
					var height = this.height;
					var width = this.width;
					if (height == 680 && width == 1020) {
						// alert("Ảnh hợp lệ.");
						return true;
					} else {
						fileUpload.value = '';
						alert('Ảnh không đúng kích thước 1020 x 680 !');
						return false;
					}
				};
			};
		} else {
			alert('Trình duyệt của bạn không hỗ trợ HTML5.');
			return false;
		}
	} else {
		alert('Hãy chọn đúng định dạng file ảnh.');
		return false;
	}
}

$(document).ready(function() {
	if (typeof ten !== 'undefined') {
		$('.enamePhone').val(ten);
		$('.emausac').val(mauSac);
		$('.esoluong').val(soLuongTrongKho);
		$('.egiaNhap').val(giaNhap);
		$('.egiaBan').val(giaBan);
		$('.egiamGia').val(giamGia);
		$('.ecpu').val(CPU);
		$('.egpu').val(gpu);
		$('.eram').val(RAM);
		$('.ebonhotrong').val(boNhoTrong);
		$('.ehedieuhanh').val(heDieuHanh);
		$('.emanhinh').val(manHinh);
		$('.ecamerasau').val(cameraSau);
		$('.ecameratruoc').val(cameraTruoc);
		$('.epin').val(dungLuongPin);
		$('.esacpin').val(sacNhanh);
		$('.esim').val(SIM);
		if (_4G == 1) {
			$('.ecn4g').val('Có');
		} else {
			$('.ecn4g').val('Không');
		}
		$('.esosao').val(soSao);
		$('.etheloai').val(theloai);
		$('.ensx').val(nhasanxuat);
		$('.emota').val(moTa);
	}
});

$('#saveEditProduct').submit(function (e) {
    var giaNhap = parseInt($('.egiaNhap').val());
    var giaBan = parseInt($('.egiaBan').val());
    var giamGia = parseInt($('.egiamGia').val());
    if (giaNhap <= 0 || giaBan <= 0 || giamGia < 0) {
        e.preventDefault();
        alert('Giá cả phải là số dương !');
    }
    if (giamGia > giaBan) {
        e.preventDefault();
        alert('Giảm giá phải nhỏ hơn giá bán !');
    }

})