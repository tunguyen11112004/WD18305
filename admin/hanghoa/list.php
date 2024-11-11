
<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <form action="index.php?act=listhh" method="post">
                    <label for="">Tìm kiếm:</label>
                    <input type="text" name="keyw" placeholder="Tên Hàng Hóa">
                    <select name="idlh" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listloaihang as $loaihang) {
                            extract($loaihang);
                            
                            echo '<option value="' . $id . '">' . $ten_l . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" name="tim" value="GO">
                </form>
                <table>
                    <tr>
                        <th>MÃ SẢN PHẨM</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>GIÁ</th>
                        <th>HÌNH</th>
                        <th>LƯỢT XEM</th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($listhanghoa as $hanghoa) {
                        extract($hanghoa);
                        $hinhpath = "../img/" . $hinh;
                        $suahh = "index.php?act=suahh&idhh=" . $id;
                        $hard_delete = "index.php?act=hard_delete&idhh=" . $id;
                        if (is_file($hinhpath)) {
                            $hinhpath = "<img src= '" . $hinhpath . "' width='100px' height='100px'>";
                        } else {
                            $hinhpath = "No file img!";
                        }
                        echo '<tr>
                                <td>' . $hanghoa['id'] . '</td>
                                <td>' . $hanghoa['ten_hh'] . '</td>
                                <td>' . $hanghoa['price'] . '</td>
                                <td>' . $hinhpath . '</td>
                                <td>' . $hanghoa['luotxem'] . '</td>
                                <td>
                                    <a href="' . $suahh . '"><input type="button" value="Sửa"> </a>  
                                    <a href="' . $hard_delete .'"><input type ="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"></a>
                                    
                                </td>
                            </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <a href="index.php?act=addhh"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
                <a href="index.php?act=bieudohh"> <input class="mr20" type="button" value="XEM BIỂU ĐỒ"></a>
            </div>
        </form>
    </div>
</div>




</div>