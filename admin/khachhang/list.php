
<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH KHÁCH HÀNG</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <form action="index.php?act=listkh" method="post">
                    <label for="">Tìm kiếm:</label>
                    <input type="text" name="keyw">
                    <input type="submit" name="timkh" value="GO">
                </form>
                <table>
                    <tr>
                        <th>MÃ KHÁCH HÀNG</th>
                        <th>TÊN KHÁCH HÀNG</th>
                        <th>HÌNH</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>EMAIL</th>
                        <th>VAI TRÒ</th>
                        <th>THAO TÁC</th>
                    </tr>

                    <?php
                    foreach ($listkh as $khachhang) {
                        extract($khachhang);
                        $hinhpath = "../img/" . $hinh;
                        $suakh = "index.php?act=suakh&id_kh=" . $id_kh;
                        $xoa_kh = "index.php?act=hard_delete&id_kh=" . $id_kh;
                        $vaitro = $khachhang['vaitro'];
                        if (is_file($hinhpath)) {
                            $hinhpath = "<img src= '" . $hinhpath . "' width='100px' height='100px'>";
                        } else {
                            $hinhpath = "No file img!";
                        }
                        echo '<tr>
                                <td>' . $khachhang['id_kh'] . '</td>
                                <td>' . $khachhang['ten'] . '</td>
                                <td>' . $hinhpath . '</td>
                                <td>' . $khachhang['sdt'] . '</td>
                                <td>' . $khachhang['email'] . '</td>';
                                if($vaitro == "quản lý"){
                                    echo'<td>'.'<span style="padding:10px;border-radius: 5px;background-color: pink;color: red;">'. $vaitro .'</span>' .'</td>';
                                }else if($vaitro == "khách hàng"){
                                    echo'<td>'.'<span style="padding:10px;border-radius: 5px;background-color: #a8faa8;color: rgb(41, 82, 0);">'. $vaitro .'</span>' .'</td>';
                                }
                                '<td>' . $vaitro . '</td>';
                            echo'<td>
                                    <a href="' . $suakh . '"><input type="button" value="Sửa"> </a>  
                                    <a href="' . $xoa_kh .'"><input type ="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"></a>
                                </td>
                            </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <a href="index.php?act=addkh"> <input class="mr20" type="button" value="NHẬP THÊM KHÁCH HÀNG"></a>
            </div>
        </form>
    </div>
</div>




</div>