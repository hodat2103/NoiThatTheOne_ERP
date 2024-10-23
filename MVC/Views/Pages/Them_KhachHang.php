<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật khách hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 50px auto;
        }

        .form-section {
            border: 1px solid #17a2b8;
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
    </style>
</head>

<body>
    <div class="container">
        <form class="form-section" method="post" action="http://localhost/BHSTHI/KhachHang_Them/themmoi">
            <div class="form-header">Cập nhật khách hàng</div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtMaKH">Mã khách hàng</label>
                    <input type="text" class="form-control" name="txtMaKH" placeholder="Mã khách hàng" value="<?php if (isset($data['mkh'])) echo $data['mkh'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtTenKH">Tên khách hàng</label>
                    <input type="text" class="form-control" name="txtTenKH" placeholder="Tên khách hàng" value="<?php if (isset($data['tenkh'])) echo $data['tenkh'] ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtSDT">Số điện thoại</label>
                    <input type="number" class="form-control" name="txtSDT" placeholder="Số điện thoại" value="<?php if (isset($data['sdt'])) echo $data['sdt'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtGioiTinh">Giới tính</label><br>
                    <input type="radio" name="txtGioiTinh" value="Nam" <?php if (isset($data['gt']) && $data['gt'] == 'Nam') echo 'checked'; ?>> Nam &nbsp;
                    <input type="radio" name="txtGioiTinh" value="Nữ" <?php if (isset($data['gt']) && $data['gt'] == 'Nữ') echo 'checked'; ?>> Nữ &nbsp;
                    <input type="radio" name="txtGioiTinh" value="Khác" <?php if (isset($data['gt']) && $data['gt'] == 'Khác') echo 'checked'; ?>> Khác
                </div>
            </div>
            <div style="text-align: center; margin: 10px;">
                <button type="submit" class="btn btn-outline-info" name="btnLuu">Lưu</button>
            </div>
        </form>
    </div>
</body>

</html>
