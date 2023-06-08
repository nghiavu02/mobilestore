<?php
//pretty($mobiles);
$numberCategorys = sizeof($categorys);
?>
<div id="category-list">
    <div class="addSuccess">
        <?php echo isset($_SESSION['deleteCategorySuccess']) ? $_SESSION['deleteCategorySuccess'] : '';
        ?>
    </div>
    <div class="addFail">
        <?php echo isset($_SESSION['deleteCategoryFail']) ? $_SESSION['deleteCategoryFail'] : '';
        ?>
    </div>
    <div class="addFail">
        <?php echo isset($_SESSION['deleteCategoryFails']) ? $_SESSION['deleteCategoryFails'] : '';
        ?>
    </div>
    <div class="addSuccess">
        <?php echo isset($_SESSION['saveCategorySuccess']) ? $_SESSION['saveCategorySuccess'] : '';
        ?>
    </div>
    <div class="addFail">
        <?php echo isset($_SESSION['saveCategoryFail']) ? $_SESSION['saveCategoryFail'] : '';
        ?>
    </div>
    <div class="addSuccess">
        <?php echo isset($_SESSION['addNewCategorySuccess']) ? $_SESSION['addNewCategorySuccess'] : ''; ?>
    </div>
    <div class="addFail">
        <?php echo isset($_SESSION['addNewCategoryFail']) ? $_SESSION['addNewCategoryFail'] : ''; ?>
    </div>
    <div class="top-menu">
        <?php if (getAction() == "list"): ?>
        <h4>
            Danh sách thể loại (Tổng số: <?php echo $numberCategorys; ?> thể loại)
        </h4>
    <?php endif; ?>
        <div class="modal">

        </div>
        <div class="add-new">
            <a href="<?php echo baseUrl('category/add'); ?>" class="btn btn-success">Thêm mới</a>
        </div>
    </div>
    <div class="list-item">
        <table class="table">
            <tr>
                <th class="c1">STT</th>
                <th class="c2">Tên thể loại</th>
                <th class="c3">Mô tả</th>
                <th class="c4">Hành động</th>
            </tr>
            <?php for ($i = 0; $i < $numberCategorys; $i++):?>
                <tr>
                    <td class="c1"><?php echo $i + 1; ?></td>
                    <td class="c2">
                        <a href="<?php echo baseUrl('category/edit/' . $categorys[$i]['idTheloai']); ?>">
                            <?php echo $categorys[$i]['tentheloai']; ?>
                        </a>
                    </td>
                    <td class="c3"><?php echo $categorys[$i]['moTa']; ?></td>
                    <td class="c4">
                    <a href="<?php echo baseUrl('category/deleteCategory/' . $categorys[$i]['idTheloai']); ?>">
                        <button class="btn btn-danger">
                            Xóa
                        </button>
                    </a>
                    </td>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</div>
<?php
if (isset($_SESSION['addNewCategorySuccess'])) {
    unset($_SESSION['addNewCategorySuccess']);
}
if (isset($_SESSION['addNewCategoryFail'])) {
    unset($_SESSION['addNewCategoryFail']);
}
if (isset($_SESSION['saveCategorySuccess'])) {
    unset($_SESSION['saveCategorySuccess']);
}
if (isset($_SESSION['saveCategoryFail'])) {
    unset($_SESSION['saveCategoryFail']);
}
if (isset($_SESSION['deleteCategorySuccess'])) {
    unset($_SESSION['deleteCategorySuccess']);
}
if (isset($_SESSION['deleteCategoryFail'])) {
    unset($_SESSION['deleteCategoryFail']);
}
if (isset($_SESSION['deleteCategoryFails'])) {
    unset($_SESSION['deleteCategoryFails']);
}
?>