<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Ensure full width for the table container */
        .table-container {
            width: 100%;
        }

        /* Adjust table header font size */
        .table th {
            font-size: 14px;
        }

        /* Adjust table body font size */
        .table td {
            font-size: 14px;
        }

        /* Responsive image inside table */
        .table img {
            max-width: 100px;
            height: auto;
        }

        /* Center align icons */
        .fa-edit,
        .fa-trash {
            cursor: pointer;
        }

        /* Make the "Mua Hàng" button aligned to the right */
        .mua-hang-btn {
            margin-top: 10px;
            text-align: right;
        }
    </style>
</head>

<body>
    <!-- Tạo mới sản phẩm -->
    <div class="container mt-4">
        <div class="text-right mb-4">
            <form action="http://localhost/BHSTHI/SanPham_Them">
                <button type="submit" class="btn btn-info font-weight-bold">Tạo mới</button>
            </form>
        </div>

        <!-- Form tìm kiếm sản phẩm -->
        <div class="card mb-4 shadow">
            <div class="card-header bg-info text-white font-weight-bold">
                Tìm kiếm sản phẩm
            </div>
            <div class="card-body">
                <form method="post" action="http://localhost/BHSTHI/SanPham_DanhSach/timkiem">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtMaSP">Mã sản phẩm</label>
                            <input type="text" class="form-control" name="txtMaSP" placeholder="Nhập mã sản phẩm">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtTenSP">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="txtTenSP" placeholder="Nhập tên sản phẩm">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-info">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="card shadow table-container">
            <div class="card-header bg-info text-white font-weight-bold">
                Danh sách sản phẩm
            </div>
            <div class="card-body">
                <!-- Make table responsive -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center w-100">
                        <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>NSX</th>
                                <th>Số lượng</th>
                                <th>Nhà cung cấp</th>
                                <th>Kho</th>
                                <th>Nhóm SP</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example row, replace with PHP dynamic content -->
                            <?php
                            if (isset($data['dulieu']) && $data['dulieu'] != null) {
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($data['dulieu'])) {
                            ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><?php echo $row['maSP']; ?></td>
                                        <td><?php echo $row['tenSP']; ?></td>
                                        <td><img src="http://localhost/BHSTHI/MVC/Controllers/uploads/<?php echo $row['hinhAnh']; ?>" class="img-fluid"></td>
                                        <td><?php echo $row['giaSP']; ?></td>
                                        <td><?php echo $row['NSX']; ?></td>
                                        <td><?php echo $row['soLuong']; ?></td>
                                        <td>
                                            <?php
                                            $db_connection = mysqli_connect("localhost", "root", "210303", "baitap");

                                            $maNCC = $row['maNCC'];

                                            $query = "SELECT tenNCC FROM qlnhacungcap WHERE maNCC = '$maNCC'";
                                            $result = mysqli_query($db_connection, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                $nccRow = mysqli_fetch_assoc($result);
                                                echo $nccRow['tenNCC']; 
                                            } 

                                            mysqli_close($db_connection);
                                            ?>
                                        </td>

                                        <td>
                                        <?php
                                            $db_connection = mysqli_connect("localhost", "root", "210303", "baitap");

                                            $maKho = $row['maKho'];

                                            $query = "SELECT tenKho FROM qlkho WHERE maKho = '$maKho'";
                                            $result = mysqli_query($db_connection, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                $kRow = mysqli_fetch_assoc($result);
                                                echo $kRow['tenKho']; 
                                            } 

                                            mysqli_close($db_connection);
                                            ?>
                                        </td>


                                        <td>
                                        <?php
                                            $db_connection = mysqli_connect("localhost", "root", "210303", "baitap");

                                            $maNSP = $row['maNSP'];

                                            $query = "SELECT tenNSP FROM qlnhomsp WHERE maNSP = '$maNSP'";
                                            $result = mysqli_query($db_connection, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                $kRow = mysqli_fetch_assoc($result);
                                                echo $kRow['tenNSP']; 
                                            } 

                                            mysqli_close($db_connection);
                                            ?>
                                        </td>
                                        <td>
                                            <a href="http://localhost/BHSTHI/SanPham_DanhSach/sua/<?php echo $row['maSP']; ?>" class="text-warning">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="http://localhost/BHSTHI/SanPham_DanhSach/xoa/<?php echo $row['maSP']; ?>" class="text-danger">
                                                <i class="fas fa-trash fa-lg"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Mua Hàng button -->
        <div class="text-right mt-3 mua-hang-btn">
            <form action="">
                <button type="submit" class="btn btn-outline-info">Mua Hàng</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>