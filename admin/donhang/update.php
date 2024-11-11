<?php
    if(is_array($donhang)){
        extract($donhang);
    }

?>
<div class="row2">
    <div class="row2 font_title">
        <h1>Cập nhật trang thái đơn hàng</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatedh&&id_dh=<?=$id_dh?>" method="POST">
            <div class="row2 mb10">
                <label>ID</label> <br>
                <input type="text" name="id_dh" value="<?=$id_dh?>">
            </div>
            <div class="row2 mb10">
                <label>Trạng thái</label> <br>
                <select name="id_tt" id="">



                
                    <option value="1">Chờ xác nhận</option>
                    <option value="2">Đã xác nhận</option>
                    <option value="3">Đã giao cho đơn vị vận chuyển</option>
                    <option value="4">Đang giao hàng</option>
                    <option value="5">Đã giao hàng thành công</option>
                    <option value="6">Đã hủy</option>
                </select>
            </div>
            <div class="row mb10 ">
                <input class="mr20" name="suadh" type="submit" value="XONG">
                <input class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=listdh"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if(isset($thongbao2)&&($thongbao2!="")){
                echo "<hhan style='color:red'>$thongbao2</hhan>";
            }else if(isset($error)){
                foreach($error as $er){
                    echo "<hhan style='color:red'>$er</hhan>";
                }
            }

            ?>
        </form>
    </div>
</div>