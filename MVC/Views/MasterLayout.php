<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nội Thất The One</title>
    <link rel="stylesheet" href="\MVC\Public\Css\bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Helvetica, Arial, sans-serif;
            padding-top: 90px;
            background-color: #f8f9fa;
        }

        .header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .main {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .main img {
            height: 90px;
        }
        .history {
            border-radius: 15px;
            width: 250px;
            height: 450px;
        }
        .sidebar {
            position: fixed;
            top: 90px; /* Adjusted to fit below the header */
            left: 0;
            width: 250px;
            background-color: #17a2b8;
            height: calc(100% - 90px); /* Fill the remaining height */
            padding: 20px;
            color: white;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 10px;
            display: block; /* Make links fill the list item */
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .banner {
            width: 100%;
            height: 500px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .aside {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #17a2b8;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-left: 270px; /* Adjusted to make space for sidebar */
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%; /* Full width on small screens */
                height: auto; /* No fixed height */
            }

            .aside {
                margin-left: 0; /* No margin on small screens */
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="main">
            <a href="http://localhost/BHSTHI/SanPham_DanhSach">
                <img class="Logo" src="http://localhost/BHSTHI/Public/Images/the_one_logo.png" alt="Logo lỗi">
            </a>
            <div class="ml-auto">
                <img class="history" src="http://localhost/BHSTHI/Public/Images/HOAPHAT.jpg" alt="Địa chỉ lỗi" height="45px">
                <img class="Sdt" src="" alt="" height="45px">
            </div>
        </div>
    </header>

    <aside class="sidebar">
        <ul>
            <li><a href="http://localhost/BHSTHI/SanPham_DanhSach">SẢN PHẨM</a></li>
            <li><a href="http://localhost/BHSTHI/Nhanvien_Danhsach">NHÂN VIÊN</a></li>
            <li><a href="http://localhost/BHSTHI/NhaCungCap_Danhsach">NHÀ CUNG CẤP</a></li>
            <li><a href="http://localhost/BHSTHI/KhachHang_Danhsach">KHÁCH HÀNG</a></li>
            <li><a href="http://localhost/BHSTHI/NhomSanPham_Danhsach">NHÓM SP</a></li>
            <li><a href="http://localhost/BHSTHI/HoaDon_DanhSach">HÓA ĐƠN</a></li>
            <li><a href="http://localhost/BHSTHI/Kho_Danhsach">KHO</a></li>
            <li><a href="">THỐNG KÊ</a></li>
            <li><a style="color: black;" href="http://localhost/BHSTHI/login">ĐĂNG XUẤT</a></li>
        </ul>
    </aside>

    <div class="container mt-4">
        <div class="aside">
            <?php
            if (isset($data['page']) && !empty($data['page'])) {
                $pagePath = './MVC/Views/Pages/' . $data['page'] . '.php';
                if (file_exists($pagePath)) {
                    include_once $pagePath;
                } else {
                    echo '<p>Trang không tồn tại.</p>';
                }
            } else {
                echo '<p>Không có trang được chỉ định.</p>';
            }
            ?>
        </div>
    </div>

</body>

</html>
