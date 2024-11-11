<?php
    function load_thongke_hanghoa_loaihang(){
        $sql="select lh.id,lh.ten_l,count(*)'soluong',min(price) 'gia_min',max(price) 'gia_max',
         avg(price) 'gia_avg' from loaihang lh join hanghoa hh on lh.id=hh.id_loai group by lh.id, lh.ten_l order by soluong desc";
         return pdo_query($sql);
    }
?>