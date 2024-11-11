<style>
    h2{margin-bottom: 20px;font-size: 24px;text-align: center;}
    input[type="text"],input[type="tel"],input[type="email"]{padding: 8px 10px;width: 300px;margin-bottom: 10px;}
    input[type="submit"]{padding: 10px 20px;margin-top: 15px;}
    .page-order{display: flex;}
    .form-order{width: 70%;}
    .sub-order{width: 30%;}
    .sub-order td,.sub-order th{padding: 5px;}
    .sub-order td:first-child,.sub-order th:first-child{width: 70%;}
    .sub-order td:last-child,.sub-order th:last-child{text-align: right;}
</style>
<div class="page-order">
    <div class="form-order">
        <form action="" method="post">
            <h2>Thông tin khách hàng</h2>
            <div><input type="text" name="txthoten" id="" placeholder="Họ và tên" required></div>
            <div><input type="tel" name="txttel" id="" placeholder="Số điện thoại" required></div>
            <div><input type="email" name="txtemail" id="" placeholder="Email" required></div>
            <div><input type="text" name="txtaddress" id="" placeholder="Địa chỉ" required></div>
            <h3>Phương thức thanh toán</h3>
            <p><input type="radio" name="pttt" id="" value="1" required> Thanh toán khi giao hàng</p>
            <p><input type="radio" name="pttt" id="" value="2" required> Chuyển khoản ngân hàng</p>
            <input type="submit" value="Xác nhận đặt hàng" name="order_confirm">
        </form>
    </div>
    <div class="sub-order">
        <h2>Đơn hàng</h2>
        <table >
            <tr>
                <th>Sản phẩm</th>
                <th>Thành tiền</th>
            </tr>
            <?php 
                // print_r($cart);
                foreach ($cart as $item) {
            ?>
            <tr>
                <td>
                    <?php echo $item['name'];?><br>
                    <small>SL: <?php echo $item['quantity'];?></small>
                </td>
                <td><?php echo number_format($item['quantity']*$item['price'], 0, ",", "."); ?> ₫</td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td><b>Tổng tiền</b></td>
                <td><b><?php echo number_format($_SESSION['resultTotal'], 0, ",", "."); ?> ₫</b></td>
            </tr>
        </table>
    </div>
</div>
