<?php   
    include_once("../model/pdo.php");
    include_once("../model/danhmuc.php");
    $act=$_GET['act'] ??'';
    $view='home.php';
    switch ($act) {
        case 'home':
            $title="Home";
            $view='home.php';
            break;
        case 'danhmuc':
            $title= 'danhmuc';
            $view= 'danhmuc/list.php';
            break;
        case 'list_sanpham':
            $title= 'Sản phẩm';
            $view= 'sanpham/list.php';
            break;
        case'add_sanpham':
            $title= 'Thêm sản phẩm';
            $view= 'sanpham/add.php';
            $list_danhmuc=load_all_danhmuc();
            if($_SERVER['REQUEST_METHOD']==='POST'){
                
            }
            break;
        case 'edit_sanpham':
            $title= 'Sửa sản phẩm';
            $view= './sanpham/edit.php';
            break;
        
        default:
            # code...
            break;
    }
    include_once('header.php');
    include_once($view);
    include_once('footer.php');

?>