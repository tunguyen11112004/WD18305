<div class="row2">
    <div class="row2 font_title">
        <h1>THỐNG KÊ SẢN PHẨM TRONG DANH MỤC</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ NHỎ NHẤT</th>
                        <th>GIÁ LỚN NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                    <?php
                        foreach($dsthongke as $thongke){
                            extract($thongke);
                    ?>
                    <tr>
                        <td><?=$id?></td>
                        <td><?=$ten_l?></td>
                        <td><?=$soluong?></td>
                        <td><?=$gia_min?></td>
                        <td><?=$gia_max?></td>
                        <td><?=number_format($gia_avg,2)?></td>
                    </tr>
                    <?php        
                        }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                
                <a href="?act=bieudo"> <input class="mr20" type="button" value="Xem biểu đồ"></a>
            </div>
        </form>
    </div>
</div>