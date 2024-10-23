<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bán hàng siêu thị</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .form-container,
        .table-container {
            
            margin-top: 50px;
            border: 1px solid #17a2b8;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            background-color: #17a2b8;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        .form-header span {
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn-custom {
            width: 100px;
            font-weight: bold;
        }

        .btn-create {
            margin: 30px 0;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Tạo mới nhân viên -->
        <div class="btn-create">
            <form action="http://localhost/BHSTHI/NhanVien_Them">
                <button class="btn btn-info btn-custom" type="submit" name="btnTaoMoi">Tạo mới</button>
            </form>
        </div>

        <!-- Form tìm kiếm nhân viên -->
        <div class="form-container">
            <div class="form-header">
                <span>Tìm kiếm nhân viên</span>
            </div>
            <div class="card-body">
                <form method="post" action="http://localhost/BHSTHI/NhanVien_DanhSach/timkiem">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="txtMaNV">Mã nhân viên</label>
                            <input type="text" class="form-control" name="txtMaNV" id="txtmaNV" placeholder="Mã nhân viên">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="txtTenNV">Tên nhân viên</label>
                            <input type="text" class="form-control" name="txtTenNV" id="txttenNV" placeholder="Tên nhân viên">
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-info btn-custom" type="submit" name="btnTimkiem">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Danh sách nhân viên -->
        <div class="table-container mt-4">
            <div class="form-header">
                <span>Danh sách nhân viên</span>
            </div>
            <table class="table table-striped table-bordered table-hover mt-2">
                <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>Mã nhân viên</th>
                        <th>Tên nhân viên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Chức vụ</th>
                        <th>Lương</th>
                        <th>Số điện thoại</th>
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
                            <tr class="text-center">
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $row['maNV']; ?></td>
                                <td><?php echo $row['tenNV']; ?></td>
                                <td><?php echo $row['ngaySinh']; ?></td>
                                <td><?php echo $row['gioiTinh']; ?></td>
                                <td><?php echo $row['diaChi']; ?></td>
                                <td><?php echo $row['chucVu']; ?></td>
                                <td><?php echo $row['luongNV']; ?></td>
                                <td><?php echo $row['sdtNV']; ?></td>
                                <td>
                                    <a href="http://localhost/BHSTHI/NhanVien_DanhSach/sua/<?php echo $row['maNV']; ?>" class="text-warning">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="http://localhost/BHSTHI/NhanVien_DanhSach/xoa/<?php echo $row['maNV']; ?>" class="text-danger">
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

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
