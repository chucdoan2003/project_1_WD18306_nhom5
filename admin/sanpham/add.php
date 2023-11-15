<div class="add__product">
    <h1>Thêm sản phẩm</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <p>Tên Sản phẩm</p>
            <input type="text" id="tensp" name="tensp">
        </div>
        <div class="form-group">
            <p>Giá</p>
            <input type="number" id="gia" name="gia">
        </div>
        <div class="form-group">
            <p>Mô tả</p>
            <input type="text" id="mota" name="mota">
        </div>
        <div class="form-group">
            <p for="">Danh mục</p>
            <select name="danhmuc" id="">
                <?php
            foreach($list_danhmuc as $danhmuc):?>
                <option value="<?= $danhmuc['id'] ?>"><?=$danhmuc['ten_danhmuc'] ?></option>
                <?php endforeach; ?>
            </select>

        </div>
        <div class="form-group">
            <p>Mô tả</p>
            <input type="text" id="mota" name="mota">
        </div>
        <div class="form-group color">
            <p>Màu</p>
            <input type="checkbox" name="" id="" value="Red">
            <span>Màu đỏ</span>
            <input type="checkbox" name="" id="" value="Blue">
            <span> màu xanh dương</span>
        </div>
        <div class="form-group size">
            <p>Size</p>
            <input type="checkbox"><span>S</span>
            <input type="checkbox"><span>M</span>
            <input type="checkbox"><span>L</span>
            <input type="checkbox"><span>XL</span>
        </div>
        <div class="form-group">
            <p>Hình ảnh</p>
            <input type="file">
        </div>
        <input type="submit" value="Thêm sản phẩm" name="btn_addsp" class="btn___addsp">


    </form>
</div>