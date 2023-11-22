<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <title>admin</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>
    <div class="container">
        <div class="admin__aside">
            <div class="admin__aside-title">
                Drashboard
            </div>
            <div class="admin__aside-nav">
                <ul>
                    <li><a href="#">Trang chủ</a> </li>
                    <li> <a href="./?act=list_sp">Sản phẩm</a> </li>
                    <li> <a href="./?act=list_dm"> Danh mục</a></li>
                    <li> <a href="./?act=dskh">Khách hàng</a></li>
                    <li> <a href="./dethi/list_dethi.html"> Thống kê</a></li>
                    <li> <a href="./khach_hang/list_khachhang.html">Bình luận</a></li>
                    <li> <a href="./khach_hang/list_khachhang.html">Đơn hàng</a></li>

                </ul>
            </div>
        </div>
        <div class="admin__article">
            <div class="admin__article__header">
                <div class="search">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="decor">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-solid fa-bell"></i>
                    <i class="fa-solid fa-circle-user"></i>
                </div>
            </div>