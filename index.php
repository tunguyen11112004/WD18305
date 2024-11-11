<?php
session_start();
include "model/pdo.php";
include "model/hanghoa.php";
include "model/khachhang.php";
include "model/loaihang.php";
include "model/order.php";
include "global.php";
$hanghoa = loadall_hanghoa_home();
$dsdm = loadall_loaihang();
$dstop10 = loadall_hanghoa_top10();
include "view/header.php";
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "listCart":
            // Kiểm tra xem giỏ hàng có dữ liệu hay không
            if (!empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];

                // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
                $productId = array_column($cart, 'id');
                
                // Chuyển đôi mảng id thành một cuỗi để thực hiện truy vấn
                $idList = implode(',', $productId);
                
                // Lấy sản phẩm trong bảng sản phẩm theo id
                $dataDb = loadone_hanghoaCart($idList);
                // var_dump($dataDb);
            }
            include "view/listCartOrder.php";
            break;
        case "hanghoa":
            if ((isset($_POST['keyw']) && ($_POST['keyw'] != ""))) {
                $keyw = $_POST['keyw'];
            } else {
                $keyw = "";
            }
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $idlh = $_GET['id'];
            } else {
                $idlh = 0;
            }
            $dssp = loadall_hanghoa($keyw, $idlh);
            $tendm = load_ten_dm($idlh);
            include "view/hanghoa.php";
            break;
        case "order":
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                // print_r($cart);
                if (isset($_POST['order_confirm'])) {
                    $txthoten = $_POST['txthoten'];
                    $txttel = $_POST['txttel'];
                    $txtemail = $_POST['txtemail'];
                    $txtaddress = $_POST['txtaddress'];
                    $pttt = $_POST['pttt'];
                    if (isset($_SESSION['user'])) {
                        $id_user = $_SESSION['user']['id_kh'];
                    } else {
                        $id_user = 0;
                    }
                    $idBill = addOrder($id_user, $txthoten, $txttel, $txtemail, $txtaddress, $_SESSION['resultTotal'], $pttt);
                    foreach ($cart as $item) {
                        addOrderDetail($idBill, $item['id'], $item['price'], $item['quantity'], $item['price'] * $item['quantity']);
                    }
                    unset($_SESSION['cart']);
                    $_SESSION['success'] = $idBill;
                    header("Location: index.php?act=success");
                }
                include "view/order.php";
            } else {
                header("Location: index.php?act=listCart");
            }
            break;
        case "success":
            if (isset($_SESSION['success'])) {
                include 'view/success.php';
            } else {
                header("Location: index.php");
            }
            break;
        case "hanghoact":
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                
                $onesp = loadone_hanghoa($id);
                include "view/hanghoact.php";
            } else {
                include "view/home.php";
            }
            break;

            case "dangky":
                if (isset($_POST['themkh1']) && ($_POST['themkh1'])) {
                    $ten = $_POST['tenkh'];
                    $pass = $_POST['pass'];
                    $hinh = $_POST['pass2'];
                    $sdt = $_POST['sdt'];
                    $email = $_POST['email'];
                    $vaitro = $_POST['vaitro'];
                    
                    insert_khachhang($ten, $pass, $hinh, $sdt, $email, $vaitro);
                    $thanhcong = "Thêm thành công";
                }

                include "view/khachhang/dangky.php";
                break;

        case "dangnhap":
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $ten = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($ten, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    $_SESSION['pass'] = $checkuser;
                    header('Location: index.php');
                    // $thongbao="bạn đã đăng nhập thành công ";
                } else {
                    $thongbao = "tài khoản không tồn tại. Vui lòng đăng ký";
                }
            }
            include "view/khachhang/dangnhap.php";
            break;
        case "edit_khachhang":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_khachhang($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = checkuser($user, $pass);

                header('Location: index.php?act=edit_khachhang');
            }
            include "view/khachhang/edit_khachhang.php";
            break;
        case "quenmk":
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là:" . $checkemail['pass'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "view/khachhang/quenmk.php";
            break;
        case "thoat":
            session_unset();
            header('Location: index.php');
            include "view/gioithieu.php";
            break;
        case "gioithieu":
            include "view/gioithieu.php";
            break;
        case "lienhe":
            include "view/lienhe.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
