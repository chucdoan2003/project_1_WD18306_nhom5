<!-- Thanh toan -->
<h1>Thanh toán</h1>
<form action="?act=accept_tt" method="POST">

    <div class="wrap__thanhtoan">
        <div class="ttgiao_hang">
            <h3>Thông tin giao hàng</h3>
            <div class="ttgiao_hang-hinhthuctt">
                <div class="mb-3">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="ho_ten" />
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">email</label>
                    <input type="text" class="form-control" name="email" />
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" />
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi" />
                </div>
                <div class="pttt">
                    <h3>Hình thức thanh toán</h3>
                    <div class="pttt__group">
                        <input type="radio" name="tt_code" class="pttt__check" value="0">
                        <span>Thanh toán khi nhận hàng</span>
                    </div>
                    <div class="pttt__group">
                        <input type="radio" name="tt_code" value="1">
                        <span>Chuyển khoản</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="ttgio_hang">
            <h3>Sản phẩm</h3>
            <?php foreach($idProducts as $idProduct): ?>
            <?php
                 $cart_product=get_sp_frcart($id_tk,$idProduct);

                 if(is_array($cart_product)){
                    extract($cart_product);
                    $total+=$gia;
                 }
            
                ?>
            <input type="hidden" name="id_producttt[]" value="<?=$id_sp?>">
            <div class="ttgio_hang-item">
                <img src="./upload/img/sanpham/<?=$hinh_anh?>" style="width: 100px;height: 120px" alt="">
                <div class="ttgio_hang-itemcontent">
                    <div class="ttgio_hang__title"><?=$ten_sp?></div>
                    <div class="ttgio_hang__soluong">Số lượng : <?=$so_luong?></div>
                    <div class="ttgio_hang__price">Giá: <?=$gia?> vnđ</div>
                </div>


            </div>
            <?php endforeach; ?>
            <div class="line"></div>

            <div class="tt_donhang">
                <div class="tamtinh">Tạm tính: <?=$total?> vnđ</div>
                <div class="phivc">Phí vận chuyển: Miễn phí</div>
                <div class="line"></div>
                <div class="tong">Tổng: <?=$total?></div>
                <input type="hidden" value="<?=$total?>" name="total">
            </div>

        </div>\

    </div>
    <button class="btn btn-success" name="accept_tt" type="submit" value="hihi">Xác nhận mua hàng</button>

</form>




<!-- footer -->