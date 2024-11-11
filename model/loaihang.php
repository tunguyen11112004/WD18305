<?php
function loadone_loaihang($idlh){
    $sql="select *from loaihang where id=".$idlh;
    $oldloaihang=pdo_query($sql);
    return $oldloaihang;
}
function loadall_loaihang(){
    $sql="select * from loaihang order by id asc";
    $listloaihang=pdo_query($sql);
    return  $listloaihang;
}
function load_ten_lh($idlh){
    if($idlh>0){
        $sql="select * from hanghoa where id=".$idlh;
        $lh=pdo_query_one($sql);
        extract($lh);
        return $ten_loai;
    }else{
        return "";
    }
}

function load_ten_dm($idlh){
    if($idlh>0){
    $sql="select * from sanpham where id=".$idlh;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
    }else{
        return "";
    }
}

function update_lh($id, $ten_loai) {
    $sql=  "UPDATE `loaihang` SET  `ten_l` = '{$ten_loai}' WHERE `loaihang`.`id` = $id";
    pdo_execute($sql);
}
function add_lh($ten_loai){
    $sql="insert into loaihang (`ten_l`) value ('$ten_loai')";
    pdo_execute($sql);
}
function hard_delete_lh($idlh){
    $sql="delete from loaihang where id=".$idlh;
    pdo_execute($sql);
}