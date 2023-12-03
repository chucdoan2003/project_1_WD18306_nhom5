<?php
    function load_thongke_sanpham_danhmuc(){
        $sql = "select danhmuc.id, danhmuc.ten_danhmuc, COUNT(*) 'so_luong' from danhmuc join san_pham on danhmuc.id = san_pham.id_dm group by danhmuc.id, danhmuc.ten_danhmuc
        order by so_luong desc";
        return pdo_query($sql);
    }
    function load_thongke_doanhthu(){
        $sql = "SELECT MONTH(created_at) AS thang, COUNT(*) AS so_luong_donhang, SUM(hoa_don.tong_tien) AS tong_doanh_thu FROM hoa_don WHERE YEAR(created_at) = 2023 AND trang_thai = 3 GROUP BY MONTH(created_at)";
        return pdo_query($sql);
    }
    function load_thongke_sanpham_theongay(){
        $sql = "SELECT COUNT(hoa_don.id) 'so_luong', created_at FROM `hoa_don` WHERE trang_thai = 3 GROUP BY created_at";
        return pdo_query($sql);
    }
?>
?>