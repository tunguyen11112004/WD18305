<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/css2.css">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&dihhlay=swap" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <div class="boxcenter">
        <!-- BIGIN HEADER -->
        <header>
            <div class="row mb header_admin">
                <h1>Admin</h1>
            </div>
        </header>
        <div class="main">


            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="?act=thongke">Thống kê</a></li>
                        <li><a href="?act=listlh">Danh mục</a></li>
                        <li><a href="?act=listhh">Hàng hóa</a></li>
                        <li><a href="?act=listdh">Đơn hàng</a></li>
                        <li><a href="?act=listkh">Khách hàng</a></li>
                        <li><a href="http://localhost/admin/index.php">Về trang chính</a></li>
                    </ul>
                </nav>
            </div>
            <div class="row2">
                <?php
                include "../model/pdo.php";
                include "../model/loaihang.php";
                include "../model/hanghoa.php";
                include "../model/thongke.php";
                include "../model/binhluan.php";
                include "../model/khachhang.php";
                include "../model/donhang.php";

                if (isset($_GET['act']) && ($_GET['act'] != "")) {
                    $act = $_GET['act'];
                    switch ($act) {
                        case "listlh":
                            $listloaihang = loadall_loaihang();
                            include "loaihang/list.php";
                            break;
                        case "listhh":
                            if (isset($_POST['tim']) && ($_POST['tim'])) {
                                $keyw = $_POST['keyw'];
                                $idlh = $_POST['idlh'];
                            } else {
                                $keyw = "";
                                $idlh = 0;
                            }
                            $listloaihang = loadall_loaihang();
                            $listhanghoa = loadall_hanghoa($keyw, $idlh);
                            include "hanghoa/list.php";
                            break;
                        case "listkh":
                            if (isset($_POST['timkh']) && ($_POST['timkh'])) {
                                $keyw = $_POST['keyw'];
                            } else {
                                $keyw = "";
                            }
                            $listkh = loadall_kh();
                            $listkh = loadall_khachhang($keyw);
                            include "khachhang/list.php";
                            break;
                        case "listdh":
                            if (isset($_POST['timdh']) && ($_POST['timdh'])) {
                                $keyw2 = $_POST['keyw2'];
                            } else {
                                $keyw2 = "";
                            }
                            $listdh = loadall_dh();
                            $listdh = loadall_donhang($keyw2);
                            include "donhang/list.php";
                            break;
                        case "bieudohh":
                            $listhanghoa = loadall_hanghoa();
                            include "hanghoa/bieudo.php";
                            break;
                        case "addlh":
                            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                                $tenloai = $_POST['tenloai'];
                                if ($tenloai != "" && $tenloai == true) {
                                    add_lh($tenloai);
                                    $thanhcong = "Thêm mới loại sản phẩm thành công";
                                } else {
                                    $thatbai = "Thêm mới thất bại, vui lòng không bỏ trống!";
                                }
                            }
                            $listloaihang = loadall_loaihang();
                            include "loaihang/add.php";
                            break;
                        case "addhh":
                            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                                $idlh = $_POST['idlh'];
                                $tenhh = $_POST['tenhh'];
                                $giahh = $_POST['giahh'];
                                $mota = $_POST['mota'];
                                $hinh = $_FILES['hinh']['name'];
                                //                    echo $hinh;
                                $target_dir = "../img/";
                                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                                //                    echo $target_file;
                                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                                    //                        echo "Bạn đã img ảnh thành công";
                                } else {
                                    //                        echo "img ảnh không thành công";
                                }
                                //                    echo $idlh;
                                insert_hanghoa($tenhh, $giahh, $hinh, $mota, $idlh);
                                $thanhcong = "Thêm thành công";
                            }

                            $listloaihang = loadall_loaihang();
                            include "hanghoa/add.php";
                            break;
                        case "addkh":
                            if (isset($_POST['themkh']) && ($_POST['themkh'])) {
                                $ten = $_POST['tenkh'];
                                $pass = $_POST['pass'];
                                $sdt = $_POST['sdt'];
                                $email = $_POST['email'];
                                $vaitro = $_POST['vaitro'];
                                $hinh = $_FILES['hinh']['name'];
                                //                    echo $hinh;
                                $target_dir = "../img/";
                                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                                //                    echo $target_file;
                                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                                    //                        echo "Bạn đã img ảnh thành công";
                                } else {
                                    //                        echo "img ảnh không thành công";
                                }
                                //                    echo $idlh;
                                insert_khachhang($ten, $pass, $hinh, $sdt, $email, $vaitro);
                                $thanhcong = "Thêm thành công";
                            }

                            include "khachhang/add.php";
                            break;
                        case "sualh":
                            if (isset($_GET['idlh']) && ($_GET['idlh']) > 0) {
                                $loaihang = loadone_loaihang($_GET['idlh']);
                            }
                            include "loaihang/update.php";
                            break;
                        case "updatelh":
                            if (isset($_GET['idlh']) && ($_GET['idlh']) > 0) {
                                $loaihang = loadone_loaihang($_GET['idlh']);
                            }
                            if (isset($_POST['sualh']) && ($_POST['sualh'])) {
                                $id = $_POST['id'];
                                $ten_loai = $_POST['tenloai'];
                                $listloaihang = loadall_loaihang();
                                $check = true;
                                $error = [];
                                if ($ten_loai == "") {
                                    array_push($error, "Không được để trống tên loại hàng!");
                                    $check = false;
                                }
                                //Kiểm tra nếu check = true thì thực hiện sửa danh mục
                                if ($check) {
                                    update_lh($id, $ten_loai);
                                    $thanhcongcn = "Cập nhật loại hàng thành công";
                                    $listloaihang = loadall_loaihang();
                                    include "loaihang/list.php";
                                } else {
                                    include "loaihang/update.php";
                                }
                            }
                            break;
                            //Hiển thị dữ liệu cũ
                        case "suahh":
                            if (isset($_GET['idhh']) && ($_GET['idhh'] > 0)) {
                                $hanghoa = loadone_hanghoa($_GET['idhh']);
                            }
                            $listloaihang = loadall_loaihang();
                            include "hanghoa/update.php";
                            break;

                            //Tải lên dữ liệu mới
                        case "updatehh":
                            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                                $idlh = $_POST['idlh'];
                                $id = $_POST['id'];
                                $tenhh = $_POST['tenhh'];
                                $giahh = $_POST['giahh'];
                                $mota = $_POST['mota'];
                                $hinh = $_FILES['hinh']['name'];
                                $target_dir = "../img/";
                                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                    "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been imged.";
                                } else {
                                    echo "Sorry, there was an error imging your file.";
                                }
                                update_hanghoa($id, $idlh, $tenhh, $giahh, $mota, $hinh);
                                $thongbao = "cập nhật thành công!";
                            }
                            $listhanghoa = loadall_hanghoa("", 0);
                            $listloaihang = loadall_loaihang();
                            include "hanghoa/list.php";
                            break;
                        case "suadh":
                            if (isset($_GET['id_dh']) && ($_GET['id_dh'] > 0)) {
                                $donhang = loadone_dh($_GET['id_dh']);
                            }
                            $listdh = loadall_dh();
                            include "donhang/update.php";
                            break;

                            //Tải lên dữ liệu mới
                        case "updatedh":
                            if (isset($_POST['suadh']) && ($_POST['suadh'])) {
                                $id_dh = $_POST['id_dh'];
                                $id_tt = $_POST['id_tt'];

                                update_dh($id_dh, $id_tt);
                                $thongbao2 = "cập nhật thành công!";
                            }
                            $listdh = loadall_dh();
                            include "donhang/list.php";
                            break;

                        case "suakh":
                            if (isset($_GET['id_kh']) && ($_GET['id_kh'] > 0)) {
                                $khachhang = loadone_kh($_GET['id_kh']);
                            }
                            $listkh = loadall_kh();
                            include "khachhang/update.php";
                            break;

                        case "updatekh":
                            if (isset($_POST['capnhat1']) && ($_POST['capnhat1'])) {
                                $id_kh = $_POST['id_kh'];
                                $ten = $_POST['ten'];
                                $sdt = $_POST['sdt'];
                                $email = $_POST['email'];
                                $vaitro = $_POST['vaitro'];
                                $hinh = $_FILES['hinh']['name'];
                                $target_dir = "../img/";
                                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                    "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been imged.";
                                } else {
                                    echo "Sorry, there was an error imging your file.";
                                }
                                update_khachhang($id_kh, $ten, $hinh, $sdt, $email, $vaitro);
                                $thongbao1 = "cập nhật thành công!";
                            }
                            $listkh = loadall_kh();
                            include "khachhang/list.php";
                            break;

                        case "hard_delete":
                            if (isset($_GET['idhh'])) {
                                hard_delete($_GET['idhh']);
                                $listhanghoa = loadall_hanghoa("", 0);
                                include "hanghoa/list.php";
                            } else if (isset($_GET['idlh'])) {
                                hard_delete_lh($_GET['idlh']);
                                $listloaihang = loadall_loaihang();
                                include "loaihang/list.php";
                            } else if (isset($_GET['id_kh'])) {
                                xoa_kh($_GET['id_kh']);
                                $listkh = loadall_kh();
                                include "khachhang/list.php";
                            }

                            break;



                        case "thongke":
                            $dsthongke = load_thongke_hanghoa_loaihang();
                            include "thongke/list.php";
                            break;
                        case "bieudo":
                            $dsthongke = load_thongke_hanghoa_loaihang();
                            include "thongke/bieudo.php";
                            break;
                    }
                } else {
                }
                ?>
            </div>
        </div>
    </div>