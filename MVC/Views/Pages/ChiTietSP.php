<?php
$db_connection = mysqli_connect("localhost", "root", "", "baitap");
$sql_dm = "SELECT * FROM qlnhomsp ORDER BY maNSP DESC";
$dt_dm = mysqli_query($db_connection, $sql_dm);

//Hiển thị tất cả sản phẩm
$sql_pro = "SELECT * FROM qlsanpham,qlnhomsp WHERE qlsanpham.maNSP=qlnhomsp.maNSP ORDER BY qlsanpham.maSP DESC LIMIT 25";
$query_pro = mysqli_query($db_connection, $sql_pro);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/BHSTHI/Public/Css/style.css">
    <link rel="stylesheet" href="\MVC\Public\Css\bootstrap.min.css">
    <title>Bán hàng siêu thị</title>
</head>

<body>
    <header class="header">
        <div class="main">
            <table>
                <tr>
                    <td>
                        <img class="Logo" src="http://localhost/BHSTHI/Public/Images/Logo_chuan.jpg" alt="Ảnh lỗi" height="90px">
                    </td>
                    <td>

                    </td>
                    <td>
                        <img class="Diachi" src="http://localhost/BHSTHI/Public/Images/Diachi_chuan.jpg" alt="Ảnh lỗi" height="45px">
                    </td>
                    <td>
                        <img class="Sdt" src="http://localhost/BHSTHI/Public/Images/Sodienthoai_chuan.jpg" alt="Ảnh lỗi" height="45px">
                    </td>
                    <td>
                        <a href="http://localhost/BHSTHI/MVC/Views/Pages/GioHang.php">
                        <img class="Sdt" src="http://localhost/BHSTHI/Public/Images/Giohang_chuan.jpg" alt="Ảnh lỗi" height="45px">
                        </a>
                    </td>
                </tr>
            </table>
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


                <!-- <?php
                        while ($row = mysqli_fetch_array($dt_dm)) {
                        ?>
                    <li><b><a href="?maNSP=<?php echo $row['maNSP'] ?>"><?php echo $row['tenNSP'] ?></a></b></li>
                <?php
                        }
                ?> -->
            </ul>
        </div>
    </header>

    <div id="main1">

        <?php
        // Kết nối tới cơ sở dữ liệu
        $db_connection = mysqli_connect("localhost", "root", "", "baitap");

        // Kiểm tra kết nối
        if (!$db_connection) {
            die("Lỗi kết nối: " . mysqli_connect_error());
        }

        // Kiểm tra có tham số maNSP trong URL hay không
        if (isset($_GET['maNSP'])) {
            $maNSP = $_GET['maNSP'];

            // Truy vấn để lấy thông tin sản phẩm dựa trên maNSP
            $sql_chitiet = "SELECT * FROM qlsanpham WHERE maSP = '$maNSP' LIMIT 1";
            $query_chitiet = mysqli_query($db_connection, $sql_chitiet);

            // Kiểm tra xem truy vấn có thành công hay không
            if ($query_chitiet) {
                // Kiểm tra xem có dữ liệu sản phẩm hay không
                $row = mysqli_fetch_array($query_chitiet);
                if ($row) {
                    // Hiển thị chi tiết sản phẩm


        ?>

                    <form method="post" action="http://localhost/BHSTHI/MVC/Views/Pages/GioHang.php?maSP=<?php echo $row['maSP'] ?>">
                        <div class="wrapper_chitiet">
                            <div class="hinhanh_sanpham">
                                <img width="50%" src="http://localhost/BHSTHI/MVC/Controllers/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
                            </div>
                            <div class="chitiet_sanpham">
                                <p>Mã sản phẩm: <?php echo $row['maSP'] ?></p>
                                <p>Tên sản phẩm: <input value="<?php echo $row['tenSP'] ?>" name="name" /></p>
                                <!-- <p>Giá: <input value="<?php echo number_format($row['giaSP'], 0, ',', ',') . 'vnđ' ?>" name="price" /> </p> -->
                                <p>Giá: <input value="<?php echo $row['giaSP'] ?>" name="price" /> </p>
                                <p>NSX: <?php echo $row['NSX'] ?></p>
                                <p>HSD: <?php echo $row['hanSD'] ?></p>
                                <p>Mức ưu đãi: <input type="text" name="mucuudai" value="<?php echo number_format($row['mucUuDai'], 2) . '%' ?>"></p>
                                <input value="1" style="width: 200px;" type="number" name="txtSL" class="form-control" placeholder="Số lượng" value="<?php if (isset($data['nsx'])) echo $data['nsx'] ?>">
                                <div style="margin-top: 10px;">
                                    <button type="submit" class="btn btn-outline-info" name="btnGH">Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                    </form>
        <?php
                } else {
                    echo "<p>Không có sản phẩm nào được tìm thấy.</p>";
                }
            } else {
                echo "<p>Có lỗi xảy ra khi truy vấn cơ sở dữ liệu.</p>";
            }
        } else {
            echo "<p>Tham số 'maNSP' không tồn tại trong URL.</p>";
        }

        // Đóng kết nối tới cơ sở dữ liệu
        mysqli_close($db_connection);
        ?>

    </div>

    <div class="clear"></div>
    <div class="footer">
        <p class="footer_copyright">Copyright by HMH SuperMarket</p>
    </div>
</body>

</html>