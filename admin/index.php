<?php   
    include_once("../model/pdo.php");
    include_once("../model/danhmuc.php");
    include_once("../model/sanpham.php");
    include_once("../model/khachhang.php");
    $act=$_GET['act'] ??'';
    $view='./trangchu/trangchu.php';
    switch ($act) {
    case 'list_sp':
        $title="Danh sách sản phẩm";
        $showsp=load_sp_dm();
        $view='./sanpham/list.php';
            break;
    case 'add_sp':
        $title='Thêm sản phẩm';
        $list_dm=load_all_danhmuc();
        $view='./sanpham/add.php';
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $ten_sp=$_POST['ten_sp'] ??'';
            $gia=$_POST['gia'] ??'';
            $mo_ta=$_POST['mo_ta'] ??'';
            $so_luong=$_POST['so_luong'] ??'';
            $chi_tiet=$_POST['chi_tiet'] ??'';
            $hinh_anh=$_FILES['hinh_anh']['name'] ??'';
            $hinh_anh_tmp=$_FILES['hinh_anh']['tmp_name'] ??'';
            move_uploaded_file($hinh_anh_tmp,'../upload/img/sanpham/'.$hinh_anh);
            $id_dm=$_POST['danh_muc'] ??'';
            add_sp($ten_sp,$gia,$mo_ta,$so_luong,$chi_tiet,$hinh_anh,$id_dm);
            $thongbao="thêm thành công"??'';

        }
        break;
    case 'edit_sp':
        $title= 'Sửa sản phẩm';
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $show_one_sp=get_one_sp($id);
            $list_dm=load_all_danhmuc();
    }
        $view='./sanpham/edit.php';
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $ten_sp=$_POST['ten_sp'] ??'';
            $gia=$_POST['gia'] ??'';
            $mo_ta=$_POST['mo_ta'] ??'';
            $so_luong=$_POST['so_luong'] ??'';
            $chi_tiet=$_POST['chi_tiet'] ??'';
            $hinh_anh=$_FILES['hinh_anh']['name'] ;
            if($hinh_anh==""){
                $hinh_anh=$show_one_sp['hinh_anh'];
            }
            $hinh_anh_tmp=$_FILES['hinh_anh']['tmp_name'] ??'';
            move_uploaded_file($hinh_anh_tmp,'../upload/img/sanpham/'.$hinh_anh);
            $id_dm=$_POST['danh_muc'] ??'';
            update_sp($id,$ten_sp,$gia,$mo_ta,$so_luong,$chi_tiet,$hinh_anh,$id_dm);
            $thongbao="Sửa thành công"??'';
        
        }
        break;  
    case 'delete_sp':
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            delete_sp($id);
        }
        $title='Danh sách sản phẩm';
        $showsp=load_sp_dm();
        $view='./sanpham/list.php';
        break;
    //CRUD danh mục
    case "list_dm":
        $dsdm = load_all_danhmuc();
        $view = "danhmuc/list-danhmuc.php";
        break;
    case "add_dm":
        if(isset($_POST['btn_add'])){
            add_danhmuc($_POST['ten_dm']);
            header("location: ?act=list_dm");
        }
        $view = "danhmuc/add-danhmuc.php";
        break;
    case "edit_dm":
        if(isset($_GET['iddm']) && $_GET['iddm'] > 0){
            $list = getone_danhmuc($_GET['iddm']);
        }
        if(isset($_POST['btn_update'])){
            $ten_danhmuc = $_POST['tendm'];
            $id_danhmuc = $_POST['iddm'];
            update_danhmuc($id_danhmuc, $ten_danhmuc);
            header("location: ?act=list_dm");
        }
        $view = "danhmuc/edit-danhmuc.php";
        break;
    case "delete_dm":
        if(isset($_GET['iddm']) && $_GET['iddm'] > 0){
            delete_danhmuc($_GET['iddm']);
            header("location: ?act=list_dm");
        }
        break;
    //crud khách hàng
    case "dskh":
        $dskh = danhsach_khachhang();
        $view = "khachhang/list_khachhang.php";
            break;
        // thêm khách hàng
    case "insert_kh":
        if(isset($_POST['btn_insert'])){
            $name_kh = $_POST['name_kh'];
            $username = $_POST['username'];
            $password = $_POST['pass'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];
            $so_dt = $_POST['so_dt'];
            $vai_tro = $_POST['vai_tro'];
            add_khachhang($name_kh, $username, $password, $so_dt, $email, $dia_chi,$vai_tro);
            header("location: ?act=dskh");
        }

        $view = "khachhang/add_khachhang.php";
            break;
        // cập nhật khách hàng
    case "edit_kh":
        if(isset($_GET['idkh']) && $_GET['idkh'] > 0){
            $list_kh = getone_khachhang($_GET['idkh']);
        }
        if(isset($_POST['btn_update'])){
            $name_kh = $_POST['name_kh'];
            $username = $_POST['username'];
            $password = $_POST['pass'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];
            $so_dt = $_POST['so_dt'];
            $vai_tro = $_POST['vai_tro'];
            $idkh = $_POST['idkh'];
            update_khachhang($name_kh, $username, $password, $so_dt, $email, $dia_chi,$vai_tro, $idkh);
            header("location: ?act=dskh");
        }
        $view = "khachhang/edit_khachhang.php";
            break;
        // xóa khách hàng    
        case "delete_kh":
            if(isset($_GET['idkh']) && $_GET['idkh'] > 0){  
                delete_khachang($_GET['idkh']);
                header("location: ?act=dskh");
            }
            $view = "khachhang/list_khachhang.php";
            break;    
        default:
            # code...
            break;
    }
    include_once('header.php');
    include_once($view);
    include_once('footer.php');

?>