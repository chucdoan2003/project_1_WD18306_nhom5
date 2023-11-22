<?php
    //Hàm thêm sản phẩm
    function add_sp($ten_sp,$gia,$mo_ta,$so_luong,$chi_tiet,$hinh_anh,$id_dm){
        $sql="insert into san_pham(ten_sp,gia,mo_ta,so_luong,chi_tiet,hinh_anh,id_dm)
            values(?,?,?,?,?,?,?)";
        pdo_execute($sql,$ten_sp,$gia,$mo_ta,$so_luong,$chi_tiet,$hinh_anh,$id_dm);
    }
    //Lấy tất cả sản phẩm trong bảng 
    function load__all_sp(){
        $sql= "select * from san_pham";
        return pdo_query($sql); 
    }
    //Lấy sản phẩm và danh mục
    function load_sp_dm(){
        $sql='SELECT san_pham.*,danhmuc.ten_danhmuc FROM san_pham JOIN danhmuc ON san_pham.id_dm=danhmuc.id';
        return pdo_query($sql);
    }
    //lấy sản phẩm theo id
    function get_one_sp($id){
        $sql= "select * from san_pham where id=?";
        return pdo_query_one($sql,$id); 
    }
    //Update sản phẩm
    function update_sp($id,$ten_sp,$gia,$mo_ta,$so_luong,$chi_tiet,$hinh_anh,$id_dm){
        $sql= "update san_pham set ten_sp=?, gia=?, mo_ta=?, so_luong=?,
            chi_tiet=?, hinh_anh=?, id_dm=? where id=?";
            pdo_execute($sql,$ten_sp,$gia,$mo_ta,$so_luong,$chi_tiet,$hinh_anh,$id_dm, $id);
    }
    //Xóa sản phẩm
    function delete_sp($id){
        $sql= "delete from san_pham where id=?";
        pdo_execute($sql,$id);

    }
    //Lấy sản phẩm mới
    function get_sp_new(){
        $sql= "select * from san_pham where id_dm=?";
        return pdo_query($sql,4);
    }
    // lấy sản phẩm có view nhiều nhất
    function get_sp_view_top4(){
        $sql= "select * from san_pham order by luot_xem desc limit 4";
        return pdo_query($sql);
    }
    // lấy tên sản phẩm và ảnh
    function get_tensp_img($id_sp){
        $sql= "select san_pham.ten_sp, san_pham.hinh_anh from san_pham where id=?";
        return pdo_query_one($sql,$id_sp);
    }
?>