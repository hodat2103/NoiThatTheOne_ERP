<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Sửa khách hàng</title>

    <style>
        .Them_KH {
            margin: 50px auto;
            border: 1px solid #17a2b8;
            border-radius: 5px;
            padding: 20px;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .tieude {
            background-color: #17a2b8;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .form-row {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .footer-buttons {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <form class="Them_KH" method="post" action="http://localhost/BHSTHI/KhachHang_DanhSach/suadl">
        <div class="tieude">
            <h5>Sửa khách hàng</h5>
        </div>

        <div class="form-row">
            <?php
            if (isset($data['dulieu']) && $data['dulieu']) {
                while ($row = mysqli_fetch_array($data['dulieu'])) {
            ?>
                    <div class="form-group col-md-6">
                        <label for="txtMaKH">Mã khách hàng</label>
                        <input type="text" class="form-control" name="txtMaKH" placeholder="Mã khách hàng" value="<?php echo $row['maKH'] ?>" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="txtTenKH">Tên khách hàng</label>
                        <input type="text" class="form-control" name="txtTenKH" placeholder="Tên khách hàng" value="<?php echo $row['tenKH'] ?>">
                    </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtSDT">Số điện thoại</label>
                <input type="number" class="form-control" name="txtSDT" placeholder="Số điện thoại" value="<?php echo $row['sdtKH'] ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="txtGioiTinh">Giới tính</label>
                <div>
                    <input type="radio" name="txtGioiTinh" value="Nam" <?php if (isset($row['gioiTinhKH']) && $row['gioiTinhKH'] == 'Nam') echo 'checked'; ?>> Nam &nbsp;
                    <input type="radio" name="txtGioiTinh" value="Nữ" <?php if (isset($row['gioiTinhKH']) && $row['gioiTinhKH'] == 'Nữ') echo 'checked'; ?>> Nữ &nbsp;
                    <input type="radio" name="txtGioiTinh" value="Khác" <?php if (isset($row['gioiTinhKH']) && $row['gioiTinhKH'] == 'Khác') echo 'checked'; ?>> Khác
                </div>
            </div>
        </div>
        <?php
                }
            }
        ?>

        <div class="footer-buttons">
            <button type="submit" class="btn btn-outline-danger" name="btnHuy">Hủy</button>
            <button type="submit" class="btn btn-outline-success" name="btnSua">Sửa</button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
