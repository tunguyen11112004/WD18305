
<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <form action="index.php?act=listdh" method="post">
                    <label for="">Tìm kiếm:</label>
                    <input type="text" name="keyw2" placeholder="Mã Đơn...">
                    <input type="submit" name="timdh" value="GO">
                </form>
                <table>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Ngày Đặt</th>
                        <th>Tổng Tiền</th>
                        <th>Địa Chỉ Nhận</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                    </tr>

                    <?php
                    foreach ($listdh as $donhang) {
                        extract($donhang);
                        $suadh = "index.php?act=suadh&id_dh=" . $id_dh;
                        $tt = $donhang['ten_tt'];
                        echo '<tr>
                                <td>' . $donhang['id_dh'] . '</td>
                                <td>' . $donhang['ngay_dat'] . '</td>
                                <td>' . $donhang['tong_tien'] . '</td>
                                <td>' . $donhang['dia_chi_nhan'] . '</td>';
                                if($tt == "Chờ xác nhận "){
                                    echo'<td>'.'<span style="padding:10px;border-radius: 5px;background-color:  rgb(248, 250, 174);color: rgb(64, 64, 2);">'. $tt .'</span>' .'</td>';
                                }else if($tt == "Đã xác nhận"){
                                    echo'<td>'.'<span style="padding:10px;border-radius: 5px;background-color: rgb(35, 156, 249);color: rgb(64, 64, 2);">'. $tt .'</span>' .'</td>';
                                }else if($tt == "Đã giao cho đơn vị vận chuyển"){
                                    echo'<td>'.'<span style="padding:10px;border-radius: 5px;background-color: rgb(249, 128, 35);color: rgb(64, 64, 2);">'. $tt .'</span>' .'</td>';
                                }else if($tt == "Đang giao hàng"){
                                    echo'<td>'.'<span style="padding:10px;border-radius: 5px;background-color: rgb(35, 53, 249);color: rgb(64, 64, 2);">'. $tt .'</span>' .'</td>';
                                }else if($tt == "Đã giao hàng thành công"){
                                    echo'<td>'.'<span style="padding:10px;border-radius: 5px;background-color: rgb(46, 249, 35);color: rgb(64, 64, 2);">'. $tt .'</span>' .'</td>';
                                }else if($tt == "Đã hủy"){
                                    echo'<td>'.'<span style="padding:10px;border-radius: 5px;background-color: rgb(249, 35, 35);color: rgb(64, 64, 2);">'. $tt .'</span>' .'</td>';
                                }
                                '<td>' . $tt . '</td>';
                                echo'<td>
                                    <a href="' . $suadh . '"><input type="button" value="Sửa"> </a>                                     
                                </td>
                            </tr>';
                    }
                    ?>
                </table>
            </div>
        </form>
    </div>
</div>




</div>