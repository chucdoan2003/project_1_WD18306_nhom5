<!-- Đơn hàng -->
<div class="wrap__donhang">
    <h1>Đơn hàng của bạn</h1>
    <div class="donhang__items">
        <?php foreach($bills as $bill): ?>
        <div class="donhang__item">
            <h3>Mã Đơn hàng <?php echo $bill['id'] ?></h3>
            <?php $chitiet_bills=get_cthd_id($bill['id']);
                foreach($chitiet_bills as $chi_tiet_bill): ?>
            <?php $sp=get_tensp_img($chi_tiet_bill['id_sp']);
                if(is_array($sp)){
                    extract($sp);
                } ?>
            <div class="donhang__item-sp">
                <div class="donhang__img"><img src="./upload/img/sanpham/<?=$hinh_anh?>" alt=""
                        style="height: 120px; width: 100px;">
                </div>
                <div class="donhang__title"><?=$ten_sp?></div>
                <div class="donhang__soluong">Số lượng: <?=$chi_tiet_bill['so_luong']?></div>
                <div class="donhang_gia">Giá: <?=$chi_tiet_bill['gia']?></div>


            </div>
            <?php endforeach; ?>
            <div class="donhang__total">Tổng tiền:<?=$bill['tong_tien']?> vnđ</div>
            <div class="donhang__trangthai">Trạng thái: <?php if($bill['trang_thai']==0){
                echo "Chưa xác nhận";   
            } else if($bill['trang_thai']==1){
                echo 'Đã xác nhận';
            }
            else if($bill['trang_thai']==2){
                echo 'Đã giao hàng thành công';
            }else if($bill['trang_thai']== 3){
                echo 'Đã hủy';
            }
            
            
            ?>

            </div>
            <button class="btn btn-danger">Hủy đơn hàng</button>
        </div>
        <?php endforeach; ?>
        <button class="btn btn-warning">Lịch sử đơn hàng</button>

    </div>
</div>
<!-- footer -->