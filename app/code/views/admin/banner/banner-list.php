<?php
echo "<script type='text/javascript'>
        var numberBanners = '" . sizeof($banners) . "';
      </script>";
?>
    <div id="manage-banner">
        <h4>
            QUẢN LÝ BANNER TRANG HOME
        </h4>
        <div class="success-delete">
            <?php echo(isset($_SESSION['deleteBannerSuccess']) ? $_SESSION['deleteBannerSuccess'] : ''); ?>
        </div>
        <div class="success-update">
            <?php echo(isset($_SESSION['updateVisibleBannerSuccess']) ? $_SESSION['updateVisibleBannerSuccess'] : ''); ?>
        </div>
        <div class="content">
            <form id="formUpdageBanner" method="post" action="<?php echo baseUrl('banner/updateVisibleBanner'); ?>">
                <table class="table">
                    <tr>
                        <th class="c1">Id banner</th>
                        <th class="c2">Tên ảnh</th>
                        <th class="c3">Hình ảnh</th>
                        <th class="c4">Đường dẫn</th>
                        <th class="c5">Hiển thị trên homepage</th>
                        <th class="c6">Hành động</th>
                    </tr>
                    <?php for ($i = 0; $i < sizeof($banners); $i++):
                        $linkImage = BASE_URL . $banners[$i]['url'];
                        if ($banners[$i]['visible'] == "1") {
                            echo "<script type='text/javascript'>
                                var visible" . $i . " = 1;
                            </script>";
                        } else {
                            echo "<script type='text/javascript'>
                                var visible" . $i . " = 0;
                            </script>";
                        }
                        ?>
                        <tr>
                            <td class="c1"><?php echo $banners[$i]['idBanner']; ?></td>
                            <td class="c2"><?php echo $banners[$i]['name']; ?></td>
                            <td class="c3"><img src="<?php echo $linkImage; ?>" alt=""></td>
                            <td class="c4"><?php echo $banners[$i]['url']; ?></td>
                            <td class="c5"><input class="cb-<?php echo $i; ?>" type="checkbox"
                                                  name="visibleOnHome<?php echo $banners[$i]['idBanner']; ?>"></td>
                            <td class="c6">
                                <button class="btn btn-danger"
                                        onclick="<?php echo "deleteBanner(" . $banners[$i]['idBanner'] . ")"; ?>">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <a href="<?php echo baseUrl('banner/createNew'); ?>" class="btn btn-success">
                    Thêm mới
                </a>
                <button type="submit" class="btn btn-info">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>
<?php
if (isset($_SESSION['updateVisibleBannerSuccess'])) {
    unset($_SESSION['updateVisibleBannerSuccess']);
}
if (isset($_SESSION['deleteBannerSuccess'])) {
    unset($_SESSION['deleteBannerSuccess']);
}
?>