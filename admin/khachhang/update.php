<?php
if (is_array($khachhang)) {
    extract($khachhang);
}
$hinhpath = "../img/" . $hinh;
if (is_file($hinhpath)) {
    $hinhpath = "<img src='" . $hinhpath . "' width='100px' height='100px'>";
} else {
    $hinhpath = "No file img!";
}
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>SỬA THÔNG TIN KHÁCH HÀNG</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatekh" method="POST" enctype="multipart/form-data">
        <div class="row2 mb10">
                <label>ID:</label> <br>
                <input type="text" name="id_kh" value="<?=$id_kh?>">
            </div>
            <div class="row2 mb10">
                <label>Tên khách hàng: </label> <br>
                <input type="text" name="ten" value="<?= $ten ?>">
            </div>
            <div class="row2 mb10">
                <label>Hình ảnh: </label> <br>
                <input type="file" name="hinh"><br>
                <?php echo $hinhpath ?>
            </div>
            <div class="row2 mb10">
                <label>Sdt: </label> <br>
                <input type="text" name="sdt" value="<?= $sdt ?>">
            </div>
            <div class="row2 mb10">
                <label>Email: </label> <br>
                <input type="text" name="email" value="<?= $email ?>">
            </div>
            <div class="row2 mb10">
                <label>Vai trò: </label> <br>
                <select name="vaitro" id="">
                    <option value="<?= $vaitro ?>"><?= $vaitro ?></option>
                    <option value="quản lý">quản lý</option>
                    <option value="khách hàng">khách hàng</option>
                </select>
            </div>
            <div class="row mb10 ">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input class="mr20" name="capnhat1" type="submit" value="Cập Nhật">
                <input class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=listkh"> <input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao1) && ($thongbao1 != "")) {
                echo "<hhan style='color:red'>$thongbao1</hhan>";
            } else if (isset($error)) {
                foreach ($error as $er) {
                    echo "<hhan style='color:red'>$er</hhan>";
                }
            }
            ?>

        </form>
    </div>
</div>