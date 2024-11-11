<?php

function loadall_dh()
{
    $sql = "SELECT donhang.*, trangthai.ten_tt FROM donhang 
    INNER JOIN trangthai ON donhang.id_tt = trangthai.id_tt";
    $listdh = pdo_query($sql);
    return  $listdh;
}

function loadone_dh($id_dh){
    $sql = "select * from donhang where id_dh = ".$id_dh;
    $result = pdo_query_one($sql);
    return $result;
}

function loadall_donhang($keyw2)
{
    $sql = "SELECT donhang.*, trangthai.ten_tt FROM donhang 
    INNER JOIN trangthai ON donhang.id_tt = trangthai.id_tt;";
    if ($keyw2 != "") {
        $sql = "SELECT * FROM `donhang` WHERE  donhang.id_dh LIKE '$keyw2'";
    }
    // End hiển thị sản phẩm
    $sql .= " GROUP BY donhang.id_dh";
    $listdh = pdo_query($sql);
    return $listdh;
}

function update_dh($id_dh, $id_tt) {
    $sql=  "UPDATE `donhang` SET  `id_tt` = '{$id_tt}' WHERE `donhang`.`id_dh` = $id_dh";
    pdo_execute($sql);
}