<?php
$db_connection = mysqli_connect("localhost", "root", "210303", "baitap");

// Kiểm tra kết nối
if (!$db_connection) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Lấy danh sách nhóm sản phẩm
$sql_dm = "SELECT * FROM qlnhomsp ORDER BY maNSP DESC";
$dt_dm = mysqli_query($db_connection, $sql_dm);

// Hiển thị tất cả sản phẩm
$sql_pro = "SELECT * FROM qlsanpham, qlnhomsp WHERE qlsanpham.maNSP=qlnhomsp.maNSP ORDER BY qlsanpham.maSP DESC LIMIT 25";
$query_pro = mysqli_query($db_connection, $sql_pro);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/BHST/Public/Css/style.css">
    <link rel="stylesheet" href="\MVC\Public\Css\bootstrap.min.css">
    <title>Bán hàng siêu thị</title>
    <style>
        .header {
            background-color: #f8f9fa;
            padding: 10px 0;
        }
        .main {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .menu ul {
            list-style-type: none;
            padding: 0;
        }
        .menu ul li {
            display: inline;
            margin-right: 20px;
        }
        .menu ul li a {
            text-decoration: none;
            font-weight: bold;
            color: #17a2b8;
        }
        .ds_sp {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .ds_sp li {
            list-style: none;
            margin: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
        }
        .ds_sp img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="main">
            <a href="http://localhost/BHSTHI/SanPham_DanhSach">
                <img class="Logo" src="http://localhost/BHSTHI/Public/Images/Logo_chuan.jpg" alt="Ảnh lỗi" height="90px">
            </a>
            <div>
                <img class="Diachi" src="http://localhost/BHSTHI/Public/Images/Diachi_chuan.jpg" alt="Ảnh lỗi" height="45px">
                <img class="Sdt" src="http://localhost/BHSTHI/Public/Images/Sodienthoai_chuan.jpg" alt="Ảnh lỗi" height="45px">
                <a href="http://localhost/BHSTHI/MVC/Views/Pages/GioHang.php">
                    <img class="Sdt" src="http://localhost/BHSTHI/Public/Images/Giohang_chuan.jpg" alt="Ảnh lỗi" height="45px">
                </a>
            </div>
        </div>

        <div class="menu">
            <ul>
                <li><b><a href="http://localhost/BHSTHI/MVC/Views/Pages/SanPhamMoi.php">Trang chủ</a></b></li>
                <li><b><a href="http://localhost/BHSTHI/MVC/Views/Pages/TrangChu.php?maNSP=6">Văn phòng phẩm</a></b></li>
                <li><b><a href="http://localhost/BHSTHI/MVC/Views/Pages/TrangChu.php?maNSP=5">Hàng gia dụng cơ bản</a></b></li>
                <li><b><a href="http://localhost/BHSTHI/MVC/Views/Pages/TrangChu.php?maNSP=4">Mỹ phẩm</a></b></li>
                <li><b><a href="http://localhost/BHSTHI/MVC/Views/Pages/TrangChu.php?maNSP=3">Bánh kẹo</a></b></li>
                <li><b><a href="http://localhost/BHSTHI/MVC/Views/Pages/TrangChu.php?maNSP=2">Thực phẩm và hàng đông lạnh</a></b></li>
                <li><b><a href="http://localhost/BHSTHI/MVC/Views/Pages/TrangChu.php?maNSP=1">Rau củ, hoa quả</a></b></li>
            </ul>
        </div>
    </header>

    <div id="main1">
        <ul class="ds_sp">
            <?php
            mysqli_data_seek($query_pro, 0); // Reset con trỏ kết quả
            while ($row = mysqli_fetch_array($query_pro)) {
            ?>
                <li>
                    <a href="http://localhost/BHSTHI/MVC/Views/Pages/ChiTietSP.php?maSP=<?php echo $row['maSP'] ?>">
                        <img src="http://localhost/BHSTHI/MVC/Controllers/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
                        <p class="Ten">Tên sản phẩm: <?php echo $row['tenSP'] ?></p>
                        <p class="Gia">Giá: <?php echo number_format($row['giaSP'], 0, ',', '.') . ' vnđ'; ?></p>
                        <p class="NSX">NSX: <?php echo $row['NSX'] ?></p>
                        <p class="HSD">HSD: <?php echo $row['hanSD'] ?></p>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>

    <div class="footer">
        <p class="footer_copyright">Copyright by HMH SuperMarket</p>
    </div>
</body>

</html>
