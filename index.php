<?php 
      
    include_once("./model/pdo.php");
    include_once("./model/danhmuc.php");
    include_once("./model/sanpham.php");
    include_once("./model/khachhang.php");
    include_once("./model/giohang.php");
    include_once("./model/thanhtoan.php");
    include_once("./model/hoadon.php");
    session_start();
    $act=$_GET['act'] ??'';
    $view='./view/home.php';
    $spnew=get_sp_new();
    $sptop4view=get_sp_view_top4();
    switch ($act) {
        case 'home':
            $title="Home";
            
        
            $view='./view/home.php';
            break;
        case 'ctsp':
            $title="Chi tiết sản phẩm";
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
            $sp=get_one_sp($id);
            $view='./view/detail_product.php';
            break;
        case 'gio_hang':
            $title= 'Giỏ hàng';
            if(isset($_SESSION['user1'])){
                $id=$_SESSION['user1']['id'];
                // $show_cart=show_cart($id);
                $carts=show_gh($id);
                
            }
            $view= './view/cart.php';
            break;
            //login
        case 'add_cart':
            if(isset($_POST['btn_addcart'])){
                $id_sp=$_POST['id'];
                $so_luong=$_POST['so_luong_sp'];
                $gia=$_POST['gia'];
                $tonggia=$so_luong*$gia;
                $id_tk=$_SESSION['user1']['id'];
                // kiểm tra id tk có trong giỏ hàng chưa
                $checkID_tk=check_idtk_cart($id_tk);
                $id_cart=$checkID_tk['id'];
                $checkID_sp=check_idsp_ctgh($id_sp,$id_cart);
                if(!is_array($checkID_tk) && $checkID_tk!==""){
                    $id_giohang=insert_tk_cart($id_tk);
                    insert_sp_ctgh($id_giohang,$id_sp,$so_luong,$tonggia);
                }
                else if(is_array($checkID_sp) && $checkID_sp!== "" && is_array($checkID_tk)){                  
                    update_soluong($so_luong,$id_sp);
                    $newsp=check_idsp_ctgh($id_sp,$id_cart);
                    $new_sl=$newsp['so_luong'];
                    $new_gia=$gia * $new_sl;
                    update_gia($id_sp,$new_gia);                                   
                }
                else if(is_array($checkID_tk) && !is_array($checkID_sp)){
                    extract($checkID_tk);
                    insert_sp_ctgh($id,$id_sp,$so_luong,$tonggia);
                }
            }   
            break;
        case 'delete_cart':
            if(isset($_GET['id_sp']) && isset($_GET['id_cart'])){
                $id_sp=$_GET['id_sp'];
                $id_cart=$_GET['id_cart'];
                delete_sp_cart($id_sp,$id_cart);
            }
            if(isset($_SESSION['user1'])){
                $id=$_SESSION['user1']['id'];
                // $show_cart=show_cart($id);
                $carts=show_gh($id);
                
            }
            $view='./view/cart.php';
            break;
        //chuyển tới trang thanh toán
        case 'add_tt':
            if(isset($_SESSION['user1']) && $_SESSION['user1']!=''){
                $id_tk=$_SESSION['user1']['id'];
            }
            if(isset($_POST['tt']) && isset($_POST['idProducts']))
            {
                $idProducts=$_POST['idProducts'];
            }
            $total=0;
            $view='./view/thanhtoan.php';
            break;
        
        case 'accept_tt':
            if(isset($_SESSION['user1']) && $_SESSION['user1']!= ''){
                $id_tk=$_SESSION['user1']['id'];  
            }
            $id_carts=get_id_cart($id_tk);
          
            if(isset($_POST['id_producttt'])){
                $idProducttts=$_POST['id_producttt'];
            }
            if(isset($_POST['accept_tt']) && $_POST['accept_tt']!=''){
                $id_cart=$id_carts['id'];
                $tong_tien=$_POST['total'];
                $ngay=date('d-m-Y H:i:s');
                $httt=$_POST['tt_code'];
                
                $id_hoadon=insert_hoadon($id_tk,$id_cart,$tong_tien,$ngay,$httt);
                $ho_ten=$_POST['ho_ten'];
                $sdt=$_POST['sdt'];
                $email=$_POST['email'];
                $dia_chi=$_POST['dia_chi'];
                insert_nguoinhan($id_hoadon,$ho_ten,$sdt,$email,$dia_chi);
            }
            foreach($idProducttts as $idProducttt){
                $cart_product=get_sp_frcart($id_tk,$idProducttt);
                $id_sp=$cart_product['id_sp'];
                $gia=$cart_product['gia'];
                $so_luong=$cart_product['so_luong'];
                insert_cthd($id_hoadon,$id_sp,$so_luong, $gia);
            }
            
            $view='./view/tt_success.php';
            break;
        // Hiển thị đơn hàng
        case 'don_hang':
            if(isset($_SESSION['user1']) && $_SESSION['user1']!=""){
                $id_tk=$_SESSION['user1']['id'];
                $bills=get_hd_idtk($id_tk);
            }
            $title='Đơn hàng';
            $view='./view/don_hang.php';
            break;
       
        case "login":
            if(isset($_POST['btn_login'])){
                $username = $_POST['username'];
                $password = $_POST['pass'];
                $arr = login($username, $password);
                if(is_array($arr)){
                $_SESSION['user'] = $username;
                $_SESSION['user1'] = $arr;
                }
                else {
                $thongbao =  "Tài khoản mật khẩu không đúng. Vui lòng điền lại thông tin";
                }
            }
            if(isset($_SESSION['user'])){
                header("location: ?act=detail_account");
            }
            $view = "./view/account/login.php";
            break;
            // đăng ký
         case "register":
            if(isset($_POST['btn_insert'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $repeat_pass = $_POST['repeat_pass'];
                $vaitro = $_POST['vai_tro'];
                if($pass == $repeat_pass){
                them_taikhoan($username, $pass, $email, $vaitro);
                }
                else{
                $err = "Mật khẩu nhập lại không khớp. Vui lòng nhập lại";
                }
                $thongbao = "Đăng ký thành công";
            }
            $view = "./view/account/register.php";
            break;
        case "detail_account":  
            $view = "./view/account/detail_account.php";
            break;
            // đăng xuất
        case 'logout':
            if(isset($_SESSION['user'])){
                unset($_SESSION['user']);
                header('location: ?act=login');
            }
            break;
            // update tài khoản
        case "edit_account":
            if(isset($_SESSION['user1'] )){
                unset($_SESSION['user1']);
            }
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
                $_SESSION['user1'] = getone_khachhang($_GET['idkh']);
                header("location: ?act=detail_account");
            }
            $view = "./view/account/edit_account.php";
            break;

        // case "demo":
        //     if(isset($_POST['gui'])){
        //         $httt=$_POST['tt_code'];
            
        //     } 
        //     $view='demo.php';
        //     break;
        default:
            # code...
            $view= './view/home.php';
            break;
    }
    include_once('./view/header.php');
    include_once('./view/slide_show.php');
    include_once($view);
    include_once('./view/footer.php');

?>