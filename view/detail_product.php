<?php 
  if(is_array($sp)){
    extract($sp);
  }
?>
<!--Chi tiết sản phẩm-->
<div class="wrap__detail" style=" margin: 20px 0;">

    <div class="detail__first">
        <div class="detail__first-img">
            <img src="./upload/img/sanpham/<?=$hinh_anh?>" alt="">
        </div>
        <div class="detail__first-content">
            <div class="detail__title">
                <?=$ten_sp?>
            </div>
            <div class="detail_category">Danh mục : <span>Quần áo Bóng đá</span></div>
            <div class="detail__price">
                Giá: <?= $gia?> vnđ
            </div>
            <div class="detail__quantity">
                <div class="detail__quantity-title">
                    Số lượng
                </div>

                <form action="?act=add_cart" method="POST">
                    <div class="quantity">
                        <input type="hidden" value="<?=$id?>" name="id">
                        <input type="hidden" value="<?=$gia?>" name="gia">
                        <div class="decrease" onclick="increase()">-</div>
                        <!-- <div class="number">1</div> -->
                        <input type="number" value="1" min="1" name="so_luong_sp" class="number">
                        <div class="increase" onclick="decrease()">+</div>
                    </div>
            </div>
            <div class="quantiti_kho">
                Số lượng còn: <?=$so_luong?>
            </div>
            <div class="action">

                <?php if(isset($_SESSION['user']) && isset($_SESSION['user1'])): ?>
                <button class="buy__now">Mua ngay</button>
                <button class="addCart" type="submit" name="btn_addcart">Thêm vào giỏ hàng</button>
                <?php endif; ?>
                <?php if(!isset($_SESSION['user']) && !isset($_SESSION['user1'])){
                        echo 'Đăng nhập để thực hiện chức năng mua ngay và thêm vào giỏ hàng';
                } ?>
            </div>
            </form>



            <div class="line"></div>
            <h3>Đặc điểm nổi bật</h3>
            <p>Chất liệu: Denim <br>
                Thành phần: 98% Cotton + 2% Spandex<br>
                Công nghệ Laser Marking tạo các vệt hiệu ứng chuẩn xác trên sản phẩm<br>
                Vải Denim được wash trước khi may nên không rút và hạn chế ra màu sau khi giặt<br>
                Bề mặt quần không thô ráp<br>
                Co giãn tốt giúp quần ôm vừa vặn, thoải mái<br>
                Dáng Slim Fit ôm tôn dáng, giúp bạn "hack" đôi chân dài và gọn đẹp<br>
                Người mẫu: 179 cm - 75 kg, mặc quần size 32<br>
                Tự hào sản xuất tại Việt Nam<br>
                Lưu ý: Sản phẩm vẫn sẽ bạc màu sau một thời gian dài sử dụng theo tính chất tự nhiên</p>
        </div>

    </div>
    <div class="line"></div>
    <div class="comment">
        <div class="comment__title">Bình luận</div>
        <div class="comment__add">Thêm bình luận</div>
        <div class="comment__content">
            <div class="comment__content-acount">
                <i class="fa-solid fa-user"></i>
                Nguyễn Văn A
            </div>
            <div class="comment__content-cm">
                Sản phẩm tốt....
            </div>

        </div>
        <div class="comment__content">
            <div class="comment__content-acount">
                <i class="fa-solid fa-user"></i>
                Nguyễn Văn B
            </div>
            <div class="comment__content-cm">
                Sản phẩm rất vừa vặn
            </div>

        </div>

    </div>
    <h4>Sản phẩm liên quan</h4>
    <div class="product__relative">
        <div class="product__relative-item">sản phẩm 1</div>
        <div class="product__relative-item">Sản phẩm 2</div>
        <div class="product__relative-item">Sản phẩm 2</div>
    </div>

</div>
<script>
var decreaseE = document.querySelector('.decrease')
var numberE = document.querySelector('.number')
var increaseE = document.querySelector('.increase')
var init = 0;

function decrease() {
    init = numberE.value;
    init++
    numberE.value = init
}

function increase() {
    init = numberE.value;

    init--
    if (init < 1) {
        init = 1;
    }
    numberE.value = init
}
</script>










<!-- footer -->