<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bán hàng siêu thị - Cập nhật nhân viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 1200px;

            margin-left: 270px;
            margin-right: 10px;
            margin-top: 50px;
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
        }

        .form-body {
            padding: 20px;
        }

        .btn-custom {
            width: 100px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <form class="form-container" method="post" action="http://localhost/BHSTHI/NhanVien_Them/themmoi">
        <div class="form-header">
            Cập nhật nhân viên
        </div>
        <div class="form-body">
            <!-- First row: Mã nhân viên, Tên nhân viên, Ngày sinh -->
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="txtMaNV">Mã nhân viên</label>
                    <input type="text" class="form-control" name="txtMaNV" id="txtmaNV" placeholder="Nhập mã nhân viên" value="<?php if (isset($data['mnv'])) echo $data['mnv'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="txtTenNV">Tên nhân viên</label>
                    <input type="text" class="form-control" name="txtTenNV" id="txttenNV" placeholder="Nhập tên nhân viên" value="<?php if (isset($data['tennv'])) echo $data['tennv'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="txtNgaySinh">Ngày sinh</label>
                    <input type="date" class="form-control" name="txtNgaySinh" id="txtngaySinh" value="<?php if (isset($data['ns'])) echo $data['ns'] ?>">
                </div>
            </div>

            <!-- Second row: Địa chỉ, Chức vụ, Giới tính -->
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="txtDiaChi">Địa chỉ</label>
                    <input type="text" class="form-control" name="txtDiaChi" id="txtdiaChi" placeholder="Nhập địa chỉ" value="<?php if (isset($data['dc'])) echo $data['dc'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="txtChucVu">Chức vụ</label>
                    <select class="form-control" name="txtChucVu" id="txtchucVu">
                        <option disabled selected>Chọn chức vụ</option>
                        <option value="Nhân viên" <?php if (isset($data['cv']) && $data['cv'] == 'Nhân viên') echo 'selected' ?>>Nhân viên</option>
                        <option value="Quản lý" <?php if (isset($data['cv']) && $data['cv'] == 'Quản lý') echo 'selected' ?>>Quản lý</option>
                        <option value="Chủ siêu thị" <?php if (isset($data['cv']) && $data['cv'] == 'Chủ siêu thị') echo 'selected' ?>>Chủ siêu thị</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="chkGioiTinh">Giới tính</label>
                    <br>
                    <input type="radio" name="chkGioiTinh" value="Nam" <?php if (isset($data['gt']) && $data['gt'] == 'Nam') echo 'checked'; ?>> Nam &nbsp;&nbsp;
                    <input type="radio" name="chkGioiTinh" value="Nữ" <?php if (isset($data['gt']) && $data['gt'] == 'Nữ') echo 'checked'; ?>> Nữ &nbsp;&nbsp;
                    <input type="radio" name="chkGioiTinh" value="Khác" <?php if (isset($data['gt']) && $data['gt'] == 'Khác') echo 'checked'; ?>> Khác
                </div>
            </div>

            <!-- Third row: Lương nhân viên, Số điện thoại -->
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="txtLuongNV">Lương nhân viên</label>
                    <input type="number" class="form-control" name="txtLuongNV" id="txtluongNV" placeholder="Nhập lương" value="<?php if (isset($data['lnv'])) echo $data['lnv'] ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="txtsdtNV">Số điện thoại</label>
                    <input type="number" class="form-control" name="txtsdtNV" id="txtsdtNV" placeholder="Nhập số điện thoại" value="<?php if (isset($data['sdt'])) echo $data['sdt'] ?>">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button class="btn btn-outline-info btn-custom" type="submit" name="btnLuu">Tạo mới</button>
            </div>
        </div>
    </form>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
