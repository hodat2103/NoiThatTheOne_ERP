<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Sửa Thông Tin Nhân Viên</title>
    <style>
        .formsuanv {
            margin: 50px auto;
            border: 1px solid #17a2b8;
            border-radius: 5px;
            padding: 20px;
            max-width: 700px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .tieude {
            background-color: #17a2b8;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .footer-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form class="formsuanv" method="post" action="http://localhost/BHSTHI/NhanVien_DanhSach/suadl">
        <div class="tieude">
            <h5>Sửa thông tin nhân viên</h5>
        </div>

        <?php
        if (isset($data['dulieu']) && $data['dulieu']) {
            while ($row = mysqli_fetch_array($data['dulieu'])) {
        ?>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="txtMaNV">Mã nhân viên</label>
                        <input type="text" class="form-control" name="txtMaNV" id="txtMaNV" placeholder="Nhập mã nhân viên" value="<?php echo $row['maNV'] ?>" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="txtTenNV">Tên nhân viên</label>
                        <input type="text" class="form-control" name="txtTenNV" id="txtTenNV" placeholder="Nhập tên nhân viên" value="<?php echo $row['tenNV'] ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="txtNgaySinh">Ngày sinh</label>
                        <input type="date" class="form-control" name="txtNgaySinh" id="txtNgaySinh" value="<?php echo $row['ngaySinh'] ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="txtDiaChi">Địa chỉ</label>
                        <input type="text" class="form-control" name="txtDiaChi" id="txtDiaChi" placeholder="Nhập địa chỉ" value="<?php echo $row['diaChi'] ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="txtChucVu">Chức vụ</label>
                        <select class="form-control" name="txtChucVu" id="txtChucVu">
                            <option disabled selected>Chọn chức vụ</option>
                            <option value="Nhân viên" <?php if (isset($data['chucVu']) && $data['chucVu'] == 'Nhân viên') echo 'selected' ?>>Nhân viên</option>
                            <option value="Quản lý" <?php if (isset($data['chucVu']) && $data['chucVu'] == 'Quản lý') echo 'selected' ?>>Quản lý</option>
                            <option value="Chủ siêu thị" <?php if (isset($data['chucVu']) && $data['chucVu'] == 'Chủ siêu thị') echo 'selected' ?>>Chủ siêu thị</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="chkGioiTinh">Giới tính</label>
                        <br>
                        <input type="radio" name="chkGioiTinh" value="Nam" <?php if (isset($row['gioiTinh']) && $row['gioiTinh'] == 'Nam') echo 'checked'; ?>> Nam &nbsp; &nbsp;
                        <input type="radio" name="chkGioiTinh" value="Nữ" <?php if (isset($row['gioiTinh']) && $row['gioiTinh'] == 'Nữ') echo 'checked'; ?>> Nữ &nbsp; &nbsp;
                        <input type="radio" name="chkGioiTinh" value="Khác" <?php if (isset($row['gioiTinh']) && $row['gioiTinh'] == 'Khác') echo 'checked'; ?>> Khác
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="txtLuongNV">Lương nhân viên</label>
                        <input type="number" class="form-control" name="txtLuongNV" id="txtLuongNV" placeholder="Nhập lương" value="<?php if (isset($row['luongNV'])) echo $row['luongNV'] ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="txtsdtNV">Số điện thoại</label>
                        <input type="number" class="form-control" name="txtsdtNV" id="txtsdtNV" placeholder="Nhập số điện thoại" value="<?php if (isset($row['sdtNV'])) echo $row['sdtNV'] ?>">
                    </div>
                </div>
        <?php
            }
        }
        ?>

        <div class="footer-buttons">
            <button type="submit" class="btn btn-outline-danger" name="btnHuy">Hủy</button>
            <button type="submit" class="btn btn-outline-success" name="btnLuu">Cập nhật</button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
