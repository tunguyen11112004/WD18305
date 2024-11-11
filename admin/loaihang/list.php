<div>
    <?php
        if(isset($thanhcong)&& ($thanhcong)!=""){
            echo $thanhcong;
        }else if (isset($thanhcongcn) && ($thanhcongcn != "")) {
            echo "<hhan style='color:green;font-weight:bold;'>$thanhcongcn</hhan>";
        }
    ?>
</div>
<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2  ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>THAO TÁC</th>
                    </tr>
                    <?php
                    foreach ($listloaihang as $loaihang) {
                        extract($loaihang);
                        $sualh="index.php?act=sualh&idlh=".$id;
                        $delete="index.php?act=hard_delete&idlh=".$id;
                        echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $ten_l . '</td>
                        <td>
                            <a href="'.$sualh.'"><input type="button" value="Sửa"> </a>
                            <a href="'.$delete.'"><input type="button" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không?\')" value="Xóa"></a>
                        </td>
                    </tr>';
                    }
                    ?>



                </table>
            </div>
            <div class="row mb10 ">
                <a href="index.php?act=addlh"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>




</div>