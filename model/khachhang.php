<?php
    
    
    //dang ky
    function insert_khachhang($ten,$pass,$hinh,$sdt,$email,$vaitro){
        $sql="INSERT INTO `khachhang` ( `ten`, `matkhau`, `hinh`, `sdt`, `email`, `vaitro`) VALUES ( '$ten','$pass','$hinh', '$sdt','$email','$vaitro'); ";
        pdo_execute($sql);
    }

    function checkuser($ten,$pass){
        $sql="select * from khachhang where ten ='".$ten."' AND matkhau='".$pass."'" ;
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function checkemail($email){
        $sql="select * from taikhoan where `email`={$email}";
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function loadall_kh(){
        $sql="select * from khachhang order by id_kh asc";
        $listkh=pdo_query($sql);
        return  $listkh;
    }

    function loadone_kh($id_kh){
        $sql = "select * from khachhang where id_kh = ".$id_kh;
        $result = pdo_query_one($sql);
        return $result;
    }


    function loadall_khachhang($keyw) {
        $sql = "SELECT khachhang.* FROM `khachhang` WHERE 1;";
        if ($keyw != "") {
            $sql = "SELECT * FROM `khachhang` WHERE  khachhang.ten LIKE '%" . $keyw . "%'";
        }
            // End hiển thị sản phẩm
            $sql .= " GROUP BY khachhang.id_kh";
        $listkh = pdo_query($sql);
        return $listkh;
    }

    function update_khachhang($id_kh,$ten,$hinh,$sdt,$email,$vaitro){
        if($hinh!=""){
            $sql=  "UPDATE `khachhang` SET `ten` = '{$ten}', `sdt` = '{$sdt}', `hinh` = '{$hinh}', `email` = '{$email}', `vaitro` = '{$vaitro}' WHERE `khachhang`.`id_kh` = $id_kh;";
        }else{
            $sql=  "UPDATE `khachhang` SET `ten` = '{$ten}', `sdt` = '{$sdt}', `email` = '{$email}', `vaitro` = '{$vaitro}' WHERE `khachhang`.`id_kh` = $id_kh";
        }
        pdo_execute($sql);
    }

   

    function xoa_kh($id_kh){
        $sql = "DELETE FROM khachhang WHERE id_kh=" .$id_kh;
        pdo_execute($sql);
    }
    