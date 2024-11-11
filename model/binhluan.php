<?php 
    function loadall_binhluan($idhh){
        $sql = "
            SELECT binhluan.id, binhluan.noidung, khachhang.user, binhluan.ngaybinhluan FROM `binhluan` 
            LEFT JOIN khachhang ON binhluan.iduser = khachhang.id
            LEFT JOIN hanghoa ON binhluan.idpro = hanghoa.id
            WHERE hanghoa.id = $idhh;
        ";
        $result =  pdo_query($sql);
        return $result;
    }
    function insert_binhluan($id,$idpro, $noidung){
        $date = date('Y-m-d');
        $sql = "
            INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
            VALUES ('$noidung','$id','$idpro','$date');
        ";
        //echo $sql;
        //die;
        pdo_execute($sql);
    }

?>