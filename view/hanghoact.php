     <!-- END HEADER -->
     <main class="catalog  mb ">

         <div class="boxleft">
             <div class="  mb">
                 <?php
                    extract($onesp);
                    ?>
                 <div class="box_title">CHI TIẾT SẢN PHẨM</div>
                 <div class="box_content">
                     <?php
                        extract($onesp);
                        //                    print_r($onesp);
                        $hinh = $img_path . $hinh;
                        echo '<img src="' . $hinh . '"><br>';
                        echo $mota;
                        ?>
                 </div>
             </div>
             <script>
                 $(document).ready(function() {
                     $("#binhluan").load("view/binhluan/binhluanform.php", {
                         idpro: <?= $id ?>
                     });

                 });
             </script>
             <div class=" " id="binhluan">
             </div>
             
         </div>
         
     </main>