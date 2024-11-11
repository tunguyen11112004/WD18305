<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=addlh" method="POST">
            <div class="row2 mb10">
                <label>Tên loại</label> <br>
                <input type="text" name="tenloai" placeholder="Nhập vào loại hàng hóa">
            </div>
            <div class="row mb10 ">
                <input class="mr20" name="themmoi" type="submit" value="XONG">
                <input class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=listlh"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thanhcong) && ($thanhcong != "")) {
                echo $thanhcong;
            }else if(isset($thatbai) && ($thatbai!="")){
                echo $thatbai;
            }

            ?>
        </form>
    </div>
</div>