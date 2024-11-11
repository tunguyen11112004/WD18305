<main class="catalog  mb ">
    <div class="boxleft">
        <div class="banner">
            <img id="banner" src="./img/banner-dan-van-phong.webp" alt="">
        </div>

        <div class="items">
            <?php
            $i = 0;
            foreach ($hanghoa as $sp) :
                extract($sp);
                $linksp = "index.php?act=hanghoact&idsp=" . $id;
                $hinh = $img_path . $hinh;
                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }
            ?>
                <div class="box_items <?php echo $mr ?>">
                    <div class="row img">
                        <a href="<?php echo $linksp ?>" style="display:block;margin:0 auto;"><img src="<?php echo $hinh ?>" alt=""></a>
                    </div>
                    <a href="<?php echo $linksp ?>">
                        <b><?php echo $ten_hh ?></b>
                    </a>
                    <p style="color: red;">
                        <b><?php echo number_format($price) ?> ₫</b>
                    </p>
                    <div>
                        <button data-id="<?= $id ?>" class="btnCart" onclick="addToCart(<?= $id ?>, '<?= $ten_hh ?>', <?= $price ?>)">Thêm vào giỏ hàng</button>
                    </div>
                </div>
            <?php
                $i += 1;
                endforeach;
            ?>

        </div>
    </div>
    
</main>
<script src="main.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    let totalProduct = document.getElementById('totalProduct');
    function addToCart(productId, productName, productPrice) {
        // console.log(productId, productName, productPrice);
        // Sử dụng jQuery
        $.ajax({
            type: 'POST',
            // Đường dẫ tới tệp PHP xử lý dữ liệu
            url: './view/addToCart.php',
            data: {
                id: productId,
                ten_hh: productName,
                price: productPrice
            },
            success: function(response) {
                totalProduct.innerText = response;
                alert('Bạn đã thêm sản phẩm vào giỏ hàng thành công!')
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>