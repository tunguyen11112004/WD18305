<?php
if(is_array($hanghoa)){
    extract($hanghoa);
}
$hinhpath="../img/". $hinh;
if(is_file($hinhpath)){
    $hinhpath="<img src='".$hinhpath."' width='100px' height='100px'>";
}else{
    $hinhpath="No file img!";
}
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>SỬA THÔNG TIN HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatehh" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label>Loại hàng: </label> <br>
                <select name="idlh" id="">
                    <!-- <option value="" selected>măc định</option> -->
                    <?php
                    foreach($listloaihang as $key=>$value){
                        if($id_loai==$value['id']){
                            echo '<option value="'.$value['id'].'" >'.$value['ten_l'].'</option>' ;
                        }else{
                            echo '<option value="'.$value['id'].'">'.$value['ten_l'].'</option>' ;
                        }

                    }
                    ?>
                </select>
            </div>
    </div>

        </div>
        <div class="row2 mb10">
            <label>Tên hàng hóa: </label> <br>
            <input type="text" name="tenhh" value="<?=$ten_hh?>">
        </div>
        <div class="row2 mb10">
            <label>Giá: </label> <br>
            <input type="text" name="giahh" value="<?=$price?>">
        </div>
        <div class="row2 mb10">
            <label>Hình ảnh: </label> <br>
            <input type="file" name="hinh" ><br>
            <?php echo $hinhpath ?>
        </div>
        <div class="row2 mb10">
            <label>Mô tả: </label> <br>
            <textarea name="mota" id="" cols="30" rows="10" value="<?=$mota?>"></textarea>
        </div>
        <div class="row mb10 ">
            <input type="hidden" name="id" value="<?=$id?>">
            <input class="mr20" name="capnhat" type="submit" value="Cập Nhật">
            <input  class="mr20" type="reset" value="NHẬP LẠI">

            <a href="index.php?act=listhh">  <input  class="mr20" type="button" value="DANH SÁCH"></a>
        </div>
        <?php
        if(isset($thongbao)&&($thongbao!="")){
            echo "<hhan style='color:red'>$thongbao</hhan>";
        }else if(isset($error)){
            foreach($error as $er){
                echo "<hhan style='color:red'>$er</hhan>";
            }
        }
        ?>
        
        </form>
    </div>
</div>
