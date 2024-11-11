
<main class="catalog  mb ">
          
    <div class="boxleft">
    
                <<div class="box_title">TÀI KHOẢN</div>
              <div class="box_content form_account">
                <?php
                if(isset($_SESSION['user'])){
                  extract($_SESSION['user']);
                    ?>
                     Xin Chào
                 <?=$ten?>
                 <li class="form_li">
                  <a href="index.php?act=quenmk">Quên mật khẩu</a>
                </li>
                 <li class="form_li">
                  <a href="index.php?act=edit_khachhang">Cập nhật tài khoản</a>
                </li>
                <?php 
                 if($vaitro=="quản lý"){
                ?>
                <li class="form_li">
                  <a href="admin/index.php">Đăng nhập admin</a>
                </li>
                <?php }?>
                <li class="form_li">
                  <a href="index.php?act=thoat">Thoát </a>
                </li>
                    <?php
                }else{
                ?>
                  <form action="index.php?act=dangnhap" method="POST">
                  <h4>Tên đăng nhập</h4><br>
                  <input type="text" name="user">
                  <h4>Mật khẩu</h4><br>
                  <input type="password" name="pass"><br>
                  <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
                 <br><input type="submit" value="Đăng nhập" name="dangnhap">
                 <li class="form_li"><a href="#">Quên mật khẩu</a></li>
                 <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
                </form>
               <?php }?>
              </div>
         
      </main>