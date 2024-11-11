<div class="row2">
         <div class="row2 font_title">
          <h1>THÊM MỚI SẢN PHẨM</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=addhh" method="POST" enctype="multipart/form-data">
              <div class="row2 mb10 form_content_container">
                  <label> Danh mục </label> <br>
                  <select name="idlh" id="">
                    <option value="0" selected>Tất cả</option>
                      <?php
                      foreach ($listloaihang as $loaihang){
                          extract($loaihang);
                          echo '<option value="'.$id.'">'.$ten_l.'</option>';
                      }
                      ?>
                  </select>
              </div>
           <div class="row2 mb10 form_content_container">
           <label> Tên sản phẩm </label> <br>
            <input type="text" name="tenhh" placeholder="nhập vào tên san phẩm">
           </div>
           <div class="row2 mb10">
            <label>Giá sản phẩm </label> <br>
            <input type="text" name="giahh" placeholder="nhập vào của sản phẩm">
           </div>
              <div class="row2 mb10">
                  <label>Hình ảnh </label> <br>
                  <input type="file" name="hinh" >
              </div>
              <div class="row2 mb10">
                  <label>Mô tả </label> <br>
                  <textarea name="mota" cols="30" rows="10"></textarea>
              </div>
           <div class="row mb10 ">
         <input class="mr20" name="themmoi" type="submit" value="XONG">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listhh"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
              <?php
              if(isset($thanhcong)&& ($thanhcong!="")){
                  echo $thanhcong;
              }

              ?>
          </form>
         </div>
        </div>