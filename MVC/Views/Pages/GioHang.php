<?php

session_start();


$db_connection = mysqli_connect("localhost", "root", "210303", "baitap");
$sql_dm = "SELECT * FROM qlnhomsp ORDER BY maNSP DESC";
$dt_dm = mysqli_query($db_connection, $sql_dm);

// Khởi tạo biến để tránh lỗi khi không có giá trị
$row_title = null;
$query_pro = null;
$row_cate = null;

// Hiển thị nhóm sản phẩm
if (isset($_GET['maNSP'])) {
    $maNSP = $_GET['maNSP'];
    $sql_pro = "SELECT * FROM qlsanpham WHERE maNSP = '$maNSP' ORDER BY maSP DESC";
    $query_pro = mysqli_query($db_connection, $sql_pro);

    if ($query_pro) {
        $row_title = mysqli_fetch_array($query_pro);

        // Lấy tên nhóm sản phẩm
        $maNSP = $row_title['maNSP'];
        $sql_cate = "SELECT * FROM qlnhomsp WHERE maNSP = '$maNSP' LIMIT 1";
        $query_cate = mysqli_query($db_connection, $sql_cate);

        if ($query_cate) {
            $row_cate = mysqli_fetch_array($query_cate);
        }
    }
}

//Tạo giỏ hàng
if (isset($_POST['btnGH'])) {
    if (isset($_SESSION['cart'])) {
        $session_array_id = array_column($_SESSION['cart'], "maSP");

        if (!in_array($_GET['maSP'], $session_array_id)) {
            $session_array = array(
                'maSP' => $_GET['maSP'],
                'tenSP' => $_POST['name'],
                'giaSP' => $_POST['price'],
                'soLuong' => 1, // Thêm số lượng mặc định là 1 khi thêm sản phẩm
                'mucUuDai' => $_POST['mucuudai'],
            );
            $_SESSION['cart'][] = $session_array;
        }
    } else {
        $session_array = array(
            'maSP' => $_GET['maSP'],
            'tenSP' => $_POST['name'],
            'giaSP' => $_POST['price'],
            'soLuong' => 1, // Thêm số lượng mặc định là 1 khi thêm sản phẩm
            'mucUuDai' => $_POST['mucuudai'],
        );

        $_SESSION['cart'][] = $session_array;
    }
}

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
                        <img class="Sdt" src="http://localhost/BHSTHI/Public/Images/Giohang_chuan.jpg" alt="Ảnh lỗi" height="45px">
                    </td>
                </tr>
            </table>
        </div>

        <div class="menu">
            <ul>
                <li><b><a href="http://localhost/BHSTHI/MVC/Views/Pages/SanPhamMoi.php">Trang chủ</a></b></li>

                <?php

                while ($row = mysqli_fetch_array($dt_dm)) {
                ?>
                    <li><b><a href="?maNSP=<?php echo $row['maNSP'] ?>"><?php echo $row['tenNSP'] ?></a></b></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </header>

    <div id="main1">
        <?php
        $output = "";
        $output .= "<table class='table table-bordered table-striped'>";
        $output .= "<tr>";
        $output .= "<th>Mã sản phẩm</th>";
        $output .= "<th>Tên sản phẩm</th>";
        $output .= "<th>Giá sản phẩm</th>";
        $output .= "<th>Số lượng</th>";
        $output .= "<th>Mức ưu đãi</th>";
        $output .= "<th>Tổng tiền</th>";
        $output .= "<th>Chức năng</th>";
        $output .= "</tr>";
        $tien = 0;
        $maSP = "";
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $output .= "<tr>";
                $output .= "<td>" . (isset($value['maSP']) ? $value['maSP'] : '') . "</td>";
                $output .= "<td>" . (isset($value['tenSP']) ? $value['tenSP'] : '') . "</td>";
                $output .= "<td>" . (isset($value['giaSP']) ? $value['giaSP'] : '') . "</td>";


                $output .= "<td>" . (isset($value['soLuong']) ? $value['soLuong'] : '') . "</td>";
                $output .= "<td>" . (isset($value['mucUuDai']) ? $value['mucUuDai'] : '') . "</td>";
                // $output .= "<td>" . (isset($value['giaSP']) && isset($value['soLuong']) ? (intval($value['giaSP']) * intval($value['soLuong']) -  ((intval($value['giaSP'])) * (intval($value['soLuong'])) * (intval($value['mucUuDai']) / 100))) : '') . "</td>";
                $output .= "<td>" . (isset($value['giaSP']) && isset($value['soLuong']) && isset($value['mucUuDai']) ? ((intval($value['giaSP']) * intval($value['soLuong'])) -  (((intval($value['giaSP'])) * (intval($value['soLuong'])) * (intval($value['mucUuDai']) / 100)))) : '') . "</td>";

                $output .= "<td>
                <form action='' method='POST'>
                    <input type='hidden' name='maXoa' value='" . $value['maSP'] . "'>
                    <button class='btn btn-danger' name='btnxoa'>Xóa</button>
                </form>
            </td>";
                $output .= "</tr>";

                $tien += (intval($value['giaSP']) * intval($value['soLuong']) -  ((intval($value['giaSP']) * intval($value['soLuong'])) * intval($value['mucUuDai'])) / 100);
                $maSP = $maSP . ',' . $value['maSP'];
            }
        }

        $output .= "</table>";
        echo $output;
        ?>

        <!-- Thêm giỏ hàng -->

        <form action="http://localhost/BHSTHI/HoaDon_Them/themmoi" method="POST">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>
                        <!-- Mã khách hàng: <input type="text" name="txtMaKH"> -->
                        <select class="form-control" name="txtMaKH">

                            <option disabled selected>Chọn mã khách hàng</option>
                            <!-- <option>NV01</option> -->

                            <?php
                            $db_connection = mysqli_connect("localhost", "root", "", "baitaplon");

                            if (!$db_connection) {
                                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                            }

                            $query = "SELECT maKH FROM qlkhachhang";

                            $result = mysqli_query($db_connection, $query);

                            if ($result) {
                                // Lặp qua kết quả và tạo tùy chọn cho mỗi giá trị maNCC
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $mkh = $row['maKH'];
                                    echo "<option value='$mkh'>$mkh</option>";
                                }
                            } else {
                                echo "<script> alert('Not OK'); </script>";
                            }

                            mysqli_close($db_connection);
                            ?>
                        </select>
                    </td>
                    <td>
                        Mã sản phẩm: <input type="text" name="txtMaSP" value="<?php echo $maSP; ?>" readonly>
                    </td>
                    <td>
                        Tổng tiền: <input type="text" name="txtTien" value="<?php echo $tien; ?> " readonly>
                    </td>
                    <td>
                        <button name="btnThanhToan" class='btn btn-danger' type="submit">Thanh toán</button>
                    </td>
                </tr>
            </table>
            <a href="http://localhost/BHSTHI/KhachHang_Them" class="btn btn-outline-info" role="submit" aria-disabled="true">ĐĂNG KÝ KHÁCH HÀNG</a>
        </form>

    </div>

    <!-- //Xử lý nút xóa sản phẩm trong giỏ hàng -->
    <?php

    //Xử lý nút xóa sản phẩm trong giỏ hàng
    if (isset($_POST['btnxoa'])) {
        $maXoa = $_POST['maXoa'];
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['maSP'] == $maXoa) {
                unset($_SESSION['cart'][$key]);
            }
        }
    }




    ?>


    <div class="clear"></div>
    <div class="footer">
        <p class="footer_copyright">Copyright by HMH SuperMarket</p>
    </div>
</body>

</html>