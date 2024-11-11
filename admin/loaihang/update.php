<?php
    if(is_array($loaihang)){
        $id= $loaihang[0]['id'];
        $ten_loai=$loaihang[0]['ten_l'];
    }

?>
<div class="row2">
    <div class="row2 font_title">
        <h1>sửa thông tin hàng hóa</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatelh&&idlh=<?=$id?>" method="POST">
            <div class="row2 mb10">
                <label>ID</label> <br>
                <input type="text" name="id" value="<?=$id?>">
            </div>
            <div class="row2 mb10">
                <label>Tên loại</label> <br>
                <input type="text" name="tenloai" value="<?=$ten_loai?>">
            </div>
            <div class="row mb10 ">
                <input class="mr20" name="sualh" type="submit" value="XONG">
                <input class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=listlh"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if(isset($thatbai) && ($thatbai!="")){
                echo "<hhan style='color:red'>$thatbai</hhan>";
            }else if(isset($error)){
                foreach($error as $er){
                    echo "<hhan style='color:red'>$er</hhan>";
                }
            }

            ?>
        </form>
    </div>
</div>