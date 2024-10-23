<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhà cung cấp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 900px;
            margin: 50px auto;
            border: 1px solid #17a2b8;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            background-color: #17a2b8;
            padding: 10px;
            border-radius: 5px 5px 0 0;
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .form-body {
            padding: 20px;
        }

        .btn-custom {
            width: 100px;
            font-weight: bold;
        }

        table th, table td {
            text-align: center;
        }

        .form-action {
            text-align: center;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <!-- Create New Supplier Button -->
    <form action="http://localhost/BHSTHI/NhaCungCap_Them" method="post">
        <div class="form-action">
            <button class="btn btn-outline-info btn-custom" type="submit" name="btnTaoMoi">Tạo mới</button>
        </div>
    </form>

    <!-- Search Form -->
    <form class="form-container" method="post" action="http://localhost/BHSTHI/NhaCungCap_DanhSach/timkiem">
        <div class="form-header">Tìm kiếm nhà cung cấp</div>
        <div class="form-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtMaNCC">Mã nhà cung cấp</label>
                    <input type="text" class="form-control" name="txtMaNCC" placeholder="Mã nhà cung cấp" value="<?php if (isset($data['maNCC'])) echo $data['maNCC'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtTenNCC">Tên nhà cung cấp</label>
                    <input type="text" class="form-control" name="txtTenNCC" placeholder="Tên nhà cung cấp" value="<?php if (isset($data['tenNCC'])) echo $data['tenNCC'] ?>">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-outline-info btn-custom" name="btnSearch">Tìm kiếm</button>
            </div>
        </div>
    </form>

    <!-- Supplier List Table -->
    <form class="form-container" method="post">
        <div class="form-header">Danh sách nhà cung cấp</div>
        <div class="form-body">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Mã NCC</th>
                        <th>Tên NCC</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($data['dulieu']) && $data['dulieu'] != null) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($data['dulieu'])) {
                    ?>
                            <tr>
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $row['maNCC']; ?></td>
                                <td><?php echo $row['tenNCC']; ?></td>
                                <td><?php echo $row['diachiNCC']; ?></td>
                                <td><?php echo $row['sdtNCC']; ?></td>
                                <td><?php echo $row['emailNCC']; ?></td>
                                <td>
                                    <a href="http://localhost/BHSTHI/NhaCungCap_DanhSach/sua/<?php echo $row['maNCC']; ?>">
                                        <i class="fas fa-edit fa-lg" style="color: black;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="http://localhost/BHSTHI/NhaCungCap_DanhSach/xoa/<?php echo $row['maNCC']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa nhà cung cấp này?')">
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
        </div>
    </form>

    <!-- Bootstrap JS and FontAwesome -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
