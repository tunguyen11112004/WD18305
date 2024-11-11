     <!-- END HEADER -->
     <main class="catalog  mb ">

       <div class="boxleft">

         <div class="box_title">Đăng ký thành viên</div>
         <div class="box_content form_account">
           <form action="index.php?act=dangky" method="post">

             <div>
               Tên đăng nhập
               <input type="text" name="tenkh" placeholder="Nhập Tên Tài khoản" required>
             </div>
             Mật khẩu
             <div>
               <input type="password" name="pass" placeholder="Mật khẩu" id="" required>
             </div>
             Nhập lại mật khẩu
             <div>
             <input type="password" name="pass2"  required>
             </div>
             SĐT
             <div>
               <input type="number" name="sdt" id="" placeholder="Sdt" required>
             </div>
             <div>
               <p>Email</p>
               <input type="email" name="email" placeholder="email">
             </div>
             Vai trò
             <div>
               <select name="vaitro" id="">
                 <option value="quản lý">quản lý</option>
                 <option value="khách hàng">khách hàng</option>
               </select>
             </div>
             <a href="./dangnhap.php"><input type="submit" name="themkh1" value="Đăng ký" ></a>
             
             <input type="reset" value="Nhập lại">
           </form>
           <?php
            if (isset($thongbao) && ($thongbao != "")) {
              echo $thongbao;
            }
            ?>
         </div>

       </div>




     </main>