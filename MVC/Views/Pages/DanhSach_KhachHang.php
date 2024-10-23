<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 1000px;
            margin:  auto;
        }

        .form-section {
            border: 1px solid #17a2b8;
            margin-bottom: 20px;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            background-color: #17a2b8;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
            font-size: 20px;
            font-weight: bold;
        }

        .btn-custom {
            width: 120px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- Form for Adding New Customer -->
        <form action="http://localhost/BHSTHI/KhachHang_Them" method="get">
            <div style="text-align: right;">
                <input class="btn btn-outline-info" type="submit" name="btnTaoMoi" value="Tạo mới" style="width: 85px; font-weight: bold">
            </div>
        </form>

        <!-- Search Customer Form -->
        <form class="form-section" method="post" action="http://localhost/BHSTHI/KhachHang_DanhSach/timkiem">
            <div class="form-header">Tìm kiếm khách hàng</div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="txtMaKH">Mã khách hàng</label>
                    <input type="text" class="form-control" name="txtMaKH" placeholder="Mã khách hàng" value="<?php if (isset($data['mkh'])) echo $data['mkh'] ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="txtTenKH">Tên khách hàng</label>
                    <input type="text" class="form-control" name="txtTenKH" placeholder="Tên khách hàng" value="<?php if (isset($data['tenkh'])) echo $data['tenkh'] ?>">
                </div>
            </div>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-outline-info" name="btnSearch">Tìm kiếm</button>
            </div>
        </form>

        <!-- Customer List Form -->
        <form class="form-section" method="post" action="">
            <div class="form-header">Danh sách khách hàng</div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã khách hàng</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($data['dulieu']) && $data['dulieu'] != null) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($data['dulieu'])) {
                    ?>
                            <tr>
                                <td><?php echo ++$i ?></td>
                                <td><?php echo $row['maKH'] ?></td>
                                <td><?php echo $row['tenKH'] ?></td>
                                <td><?php echo $row['sdtKH'] ?></td>
                                <td><?php echo $row['gioiTinhKH'] ?></td>
                                <td>
                                    <a href="http://localhost/BHSTHI/KhachHang_DanhSach/sua/<?php echo $row['maKH'] ?>">
                                        <i class="fas fa-edit fa-lg" style="color: black;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="http://localhost/BHSTHI/KhachHang_DanhSach/xoa/<?php echo $row['maKH'] ?>">
                                        <i class="fas fa-archive fa-lg" style="color: black;"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
