<div id="order-checkout">
    <h4>TRANG THANH TOÁN ĐƠN HÀNG</h4>
    <div class="success">
        <?php echo isset($_SESSION['successCheckout']) ? $_SESSION['successCheckout'] : ''; ?>
    </div>
    <div class="fail">
        <?php echo isset($_SESSION['errorCheckout']) ? $_SESSION['errorCheckout'] : ''; ?>
    </div>
    <div class="content">
        <h5>Nhập vào thông tin đơn hàng để thanh toán:</h5>
        <form id="checkout" method="post" action="<?php echo baseUrl('order/executeCheckout'); ?>">
            <table class="table">
                <tr>
                    <th>Mã đơn hàng:</th>
                    <th>
                        <input name="maDonHang" type="number" required>
                    </th>
                </tr>
                <tr>
                    <th>Số tiền thanh toán:</th>
                    <th>
                        <input name="soTien" type="number" required> VND
                    </th>
                </tr>
                <tr>
                    <th>
                        <button type="submit" class="btn btn-success">Thanh toán</button>
                    </th>
                    <th></th>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if (isset($_SESSION['successCheckout'])) {
    unset($_SESSION['successCheckout']);
}
if (isset($_SESSION['errorCheckout'])) {
    unset($_SESSION['errorCheckout']);
}
?>