<?php
function loadall_hanghoa_home(){
    $sql="select * from hanghoa where 1 order by id desc limit 0,9";
    $listhanghoa=pdo_query($sql);
    return  $listhanghoa;
}
function loadall_hanghoa_top10(){
    $sql="select * from hanghoa where 1 order by luotxem desc limit 0,10";
    $listhanghoa=pdo_query($sql);
    return $listhanghoa;
}

function loadone_hanghoaCart ($idList) {
    $sql = 'SELECT * FROM hanghoa WHERE id IN ('. $idList . ')';
    $sanpham = pdo_query($sql);
    return $sanpham;
}

function loadall_hanghoa($keyw = "", $idlh = 0) {
    $sql = "SELECT hanghoa.*, COUNT(binhluan.id_bl) AS sobinhluan 
            FROM hanghoa
            LEFT JOIN binhluan ON binhluan.id_hh = hanghoa.id
            -- Hiển thị sản phẩm với các điều kiện
            WHERE hanghoa.trangthai = 0";
    if ($keyw != "") {
        $sql .= " AND hanghoa.ten_hh LIKE '%" . $keyw . "%'";
    }
    if ($idlh > 0) {
        $sql .= " AND hanghoa.id_loai = '" . $idlh . "'";
    }
        // End hiển thị sản phẩm
    $sql .= " GROUP BY hanghoa.id"; //Nhóm sản phẩm với id sản phẩm

    $sql .= " ORDER BY hanghoa.id DESC"; //Sắp xêps sản phẩm với id giảm dần

    $listhanghoa = pdo_query($sql);
    return $listhanghoa;
}


// 
function loadone_hanghoa($id){
    $sql = "select * from hanghoa where id = ".$id;
    $results = pdo_query_one($sql);
    return $results;
}
function load_hanghoa_cungloai($id, $id_lh){
    $sql = "select * from hanghoa where id_loai = $id_lh and id <> $id";
    $result = pdo_query($sql);
    return $result;
}
function insert_hanghoa($tenhh,$giahh, $hinh, $mota, $idlh){
    $sql = "INSERT INTO `hanghoa`(`ten_hh`, `price`, `hinh`, `mota`, `id_loai`) VALUES ('$tenhh', '$giahh', '$hinh', '$mota', '$idlh');";
    pdo_execute($sql);
}
function update_hanghoa($id,$idlh,$tenhh,$giahh,$mota,$hinh){
    if($hinh!=""){
        // $sql="update hanghoa set idlh='".$idlh."',name='".$tenhh."',price='".$giahh."',mota='".$mota."',img='".$hinh."' where id=".$id;
        $sql=  "UPDATE `hanghoa` SET `ten_hh` = '{$tenhh}', `price` = '{$giahh}', `hinh` = '{$hinh}', `mota` = '{$mota}', `id_loai` = '{$idlh}' WHERE `hanghoa`.`id` = $id;";
    }else{
        //  $sql="update hanghoa set idlh='".$idlh."',name='".$tenhh."',price='".$giahh."',mota='".$mota."' where id=".$id;
        $sql=  "UPDATE `hanghoa` SET `ten_hh` = '{$tenhh}', `price` = '{$giahh}', `mota` = '{$mota}', `idloai` = '{$idlh}' WHERE `hanghoa`.`id` = $id";
    }
    pdo_execute($sql);
}

function hard_delete($id){
    $sql = "DELETE FROM hanghoa WHERE id=" .$id;
    pdo_execute($sql);
}

