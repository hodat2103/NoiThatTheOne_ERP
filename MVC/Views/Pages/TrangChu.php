<?php
$db_connection = mysqli_connect("localhost", "root", "210303", "baitap");
$sql_dm = "SELECT * FROM qlnhomsp ORDER BY maNSP DESC";
$dt_dm = mysqli_query($db_connection, $sql_dm);

// Initialize variables to avoid errors when there are no values
$row_title = null;
$query_pro = null;
$row_cate = null;

// Display product group
if (isset($_GET['maNSP'])) {
    $maNSP = $_GET['maNSP'];
    $sql_pro = "SELECT * FROM qlsanpham WHERE maNSP = '$maNSP' ORDER BY maSP DESC";
    $query_pro = mysqli_query($db_connection, $sql_pro);

    if ($query_pro) {
        $row_title = mysqli_fetch_array($query_pro);

        // Get the name of the product group
        $maNSP = $row_title['maNSP'];
        $sql_cate = "SELECT * FROM qlnhomsp WHERE maNSP = '$maNSP' LIMIT 1";
        $query_cate = mysqli_query($db_connection, $sql_cate);

        if ($query_cate) {
            $row_cate = mysqli_fetch_array($query_cate);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/BHST/Public/Css/style.css">
    <title>Bán hàng siêu thị</title>
</head>

<body>
    <header class="header bg-info text-white">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <a href="http://localhost/BHSTHI/SanPham_DanhSach">
                    <img class="Logo" src="http://localhost/BHSTHI/Public/Images/Logo_chuan.jpg" alt="Ảnh lỗi" height="90px">
                </a>
                <div class="d-none d-md-block">
                    <img class="Diachi" src="http://localhost/BHSTHI/Public/Images/Diachi_chuan.jpg" alt="Ảnh lỗi" height="45px">
                    <img class="Sdt" src="http://localhost/BHSTHI/Public/Images/Sodienthoai_chuan.jpg" alt="Ảnh lỗi" height="45px">
                    <a href="http://localhost/BHSTHI/MVC/Views/Pages/GioHang.php">
                        <img class="Sdt" src="http://localhost/BHSTHI/Public/Images/Giohang_chuan.jpg" alt="Ảnh lỗi" height="45px">
                    </a>
                </div>
            </div>

            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/BHSTHI/MVC/Views/Pages/SanPhamMoi.php"><b>Trang chủ</b></a>
                        </li>
                        <?php while ($row = mysqli_fetch_array($dt_dm)) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="?maNSP=<?php echo $row['maNSP'] ?>"><b><?php echo $row['tenNSP'] ?></b></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="container my-4">
        <?php if ($row_title) { ?>
            <h3 class="text-center font-weight-bold"><?php echo $row_cate['tenNSP'] ?></h3>
            <div class="row">
                <?php
                mysqli_data_seek($query_pro, 0);
                while ($row = mysqli_fetch_array($query_pro)) {
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <a href="http://localhost/BHSTHI/MVC/Views/Pages/ChiTietSP.php?maNSP=<?php echo $row['maSP'] ?>">
                                <img class="card-img-top" src="http://localhost/BHSTHI/MVC/Controllers/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Tên sản phẩm: <?php echo $row['tenSP'] ?></h5>
                                    <p class="card-text">Giá: <?php echo number_format($row['giaSP'], 0, ',', '.') . ' vnđ' ?></p>
                                    <p class="card-text">NSX: <?php echo $row['NSX'] ?></p>
                                    <p class="card-text">HSD: <?php echo $row['hanSD'] ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p>Không có sản phẩm nào được tìm thấy trong nhóm này.</p>
        <?php } ?>
    </main>

    <footer class="footer bg-info text-white text-center py-3">
        <p class="footer_copyright">Copyright by HMH SuperMarket</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
