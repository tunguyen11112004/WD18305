     <!-- END HEADER -->
     <main class="catalog  mb ">
          
    <div class="boxleft">
    
                <div class="box_title">Cập nhật tài khoản</div>
                <div class="box_content form_account">
                    <?php
                    if(isset($_SESSION['user']) && (is_array($_SESSION['user']))){
                        extract($_SESSION['user']);
                    }
                    ?>
                  <form action="index.php?act=edit_khachhang" method="post">
                    <div>
                    <p>Email</p>
                    <input type="email" name="email" value="<?=$email?>" placeholder="email">
                    </div>
                    <div>
                    Tên đăng nhập
                    <input type="text" name="user" value="<?=$ten?>"  placeholder="user">
                    </div>
                    Mật khẩu
                    <div>
                    <input type="password" name="pass" value="<?=$matkhau?>"  placeholder="pass">
                    </div>
                    Điện thoại
                    <div>
                    <input type="text" name="tel"value="<?=$sdt?>"  placeholder="tel">
                    </div>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" value="Cập nhật" name="capnhat">
                    <input type="reset" value="Nhập lại">
                  </form>
                  <?php
                  if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
                  }
                  ?>
             </div>
              
    </div>
          
         
      </main>