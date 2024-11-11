<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website bán hàng</title>
  <link rel="stylesheet" href="./css/css1.css">
  <link rel="stylesheet" href="./img">
  <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <style>
    #totalProduct {
      color: #fff;
      background-color: red;
      font-size: 12px;
      padding: 5px;
      border-radius: 50%;
    }
  </style>
</head>

<body>
  <div class="boxcenter">
    <!-- BIGIN HEADER -->
    <header>

      <div class="row mb menu">
        <ul>
          <li class="dropdown">
            <a href="index.php"><img class="logo" src="./img/logo-watchstore.webp" alt=""></a>
          </li>
          <li class="dropdown">
            <a class="dropdownbtn" href="index.php">Trang chủ</a>
          </li>
          <li class="dropdown">
            <a class="dropdownbtn" href="index.php?act=gioithieu">Giới thiệu</a>
          </li>
          <li class="dropdown">
            <a class="dropdownbtn" href="">Danh mục</a>
            <div class="dropdown_content">
              <?php
              foreach ($dsdm as $dm) {
                extract($dm);
                $linkdm = "index.php?act=hanghoa&idlh=" . $id;
                echo '<a href="' . $linkdm . '">' . $ten_l . ' </a>';
              }
              ?>
            </div>
          </li>
          <li class="dropdown">
            <a class="dropdownbtn" href="index.php?act=gopy">Góp ý</a>
          </li>
          <li class="dropdown">
            <a class="dropdownbtn" href="index.php?act=lienhe">Liên hệ</a>
          </li>
          <li class="dropdown">
            <a class="dropdownbtn" href="index.php?act=listCart">Giỏ hàng</a>
            <span id="totalProduct"><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>
          </li>
          <li class="dropdown">
            <div class="box_search">
              <form action="index.php?act=hanghoa" method="POST">
                <input type="text" name="keyw" id="" placeholder="Từ khóa tìm kiếm">
                <input type="submit" name="timkiem" value="Tìm kiếm">
              </form>
            </div>
          </li>
          <li class="dropdown">
            <a class="dropdownbtn" href="index.php?act=dangnhap"><input type="button" value="Dăng nhập"></a>
          </li>
          <li class="dropdown">
            <a class="dropdownbtn" href="index.php?act=dangky"><input type="button" value="Đăng ký"></a>
          </li>
        </ul>
      </div>
    </header>
    <!-- END HEADER -->