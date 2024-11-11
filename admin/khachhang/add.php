<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM KHÁCH HÀNG</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=addkh" method="POST" enctype="multipart/form-data">

            <div class="row2 mb10 form_content_container">
                <label> Tên khách hàng <span class="do">*</span> </label> <br>
                <input type="text" name="tenkh" placeholder="Nhập Tên Tài khoản" required>
            </div>
            <div class="row2 mb10 ">
                <label>Mật khẩu </label> <br>
                <input type="password" name="pass" id="" required>
            </div>
            <div class="row2 mb10">
                <label>Nhập lại mật khẩu </label> <br>
                <input type="password" name="pass" id="" required>
            </div>
            <div class="row2 mb10">
                <label>Hình ảnh </label> <br>
                <input type="file" name="hinh">
            </div>
            <div class="row2 mb10">
                <label>sdt </label> <br>
                <input type="text" name="sdt" placeholder=" vui lòng nhập sdt" required>
            </div>
            <div class="row2 mb10">
                <label>Email </label> <br>
                <input type="text" name="email" placeholder="vui lòng nhập email" required>            
            </div>
            <div class="row2 mb10">
                <label>Vai Trò </label> <br>
                <select name="vaitro" id="">
                    <option value="quản lý">quản lý</option>
                    <option value="khách hàng">khách hàng</option>
                </select>
            </div>
            <div class="row mb10 ">
                <input class="mr20" name="themkh" type="submit" value="XONG">
                <input class="mr20" type="reset" value="NHẬP LẠI">
            </div>
            <?php
            if (isset($thanhcong) && ($thanhcong != "")) {
                echo $thanhcong;
            }

            ?>
        </form>
    </div>
</div>