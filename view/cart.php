<div class="wrap__cart">
    <div class="cart__title">
        <h1>Giỏ hàng của bạn</h1>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4">Sản phẩm</div>
        <div class="col-2">Đơn giá</div>
        <div class="col-2">Số lượng</div>
        <div class="col-2">Số tiền</div>
    </div>
    <form action="?act=add_tt" method="POST">
        <div class="cart__items">
            <?php 
            foreach($carts as $cart):
        ?>
            <div class="row cart__item">
                <div class="col-2 align__item"><input type="checkbox" name="idProducts[]" value="<?=$cart['id_sp']?>">
                    <a onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ?')"
                        href="?act=delete_cart&id_sp=<?=$cart['id_sp']?>&id_cart=<?=$cart['id_giohang']?>"> <i
                            class="fa-solid fa-trash"></i></a>
                </div>
                <div class="col-4 cart__item-product">
                    <div class="cart__img">
                        <img src="./upload/img/sanpham/<?=$cart['hinh_anh']?>" alt="">
                    </div>

                    <div class="cart__content">
                        <div class="cart__name"><?=$cart['ten_sp']?></div>

                        <div class="detail_category">Danh mục : <span>Quần áo Bóng đá</span></div>

                    </div>

                </div>
                <div class="col-2 align__item"><?=$cart['gia_sp']?></div>
                <div class="col-2 align__item">
                    <div class="quantity">
                        <div class="decrease" onclick="increase()">-</div>
                        <!-- <div class="number">1</div> -->
                        <input type="number" value="<?=$cart['so_luong']?>" min="1" name="so_luong_sp" class="number">
                        <div class="increase" onclick="decrease()">+</div>
                    </div>

                </div>
                <div class="col-2 align__item"><?=$cart['gia']?></div>
            </div>

            <?php endforeach; ?>


        </div>
        <button class="thanhtoan" type="submit" name="tt">
            Thanh Toán
        </button>
    </form>

    <div class="choice__delete">
        <div class="choice">
            Chọn tất cả
        </div>
        <div class="delete">
            Xóa mục đã chọn
        </div>
        <div class="tongtien">
            Tổng tiền: <span>999 000 vnđ</span>
        </div>






    </div>

</div>