<div class="createNewBanner">
    <h4>
        THÊM MỚI BANNER CHO HOMEPAGE
    </h4>
    <div class="success">
        <?php echo(isset($_SESSION['uploadBannerSuccess']) ? $_SESSION['uploadBannerSuccess'] : ''); ?>
    </div>
    <div class="fail">
        <?php echo(isset($_SESSION['existedFile']) ? $_SESSION['existedFile'] : ''); ?>
    </div>
    <div class="invalidSize">
        <?php echo(isset($_SESSION['invalidSize']) ? $_SESSION['invalidSize'] : ''); ?>
    </div>
    <div class="content">
        <form id="createNewBanner" enctype="multipart/form-data" method="post"
              action="<?php echo baseUrl('banner/saveNew'); ?>">
            <input id="banner" type="file" accept="image/*" name="banner" required>
            <button type="submit" class="btn btn-success">Tạo mới</button>
        </form>
    </div>
    <div class="note">
        Chú ý: Banner phải đúng kích thước 800 x 300 pixel.
    </div>
</div>
<?php
if (isset($_SESSION['uploadBannerSuccess'])) {
    unset($_SESSION['uploadBannerSuccess']);
}
if (isset($_SESSION['existedFile'])) {
    unset($_SESSION['existedFile']);
}
if (isset($_SESSION['invalidSize'])) {
    unset($_SESSION['invalidSize']);
}
?>