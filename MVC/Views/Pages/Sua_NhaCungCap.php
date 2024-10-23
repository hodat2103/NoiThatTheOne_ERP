<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Sửa Nhà Cung Cấp</title>

    <style>
        .Them_NCC {
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

    <form class="Them_NCC" method="post" action="http://localhost/BHSTHI/NhaCungCap_DanhSach/suadl">
        <div class="tieude">
            <h5>Sửa nhà cung cấp</h5>
        </div>

        <div class="form-row">
            <?php
            if (isset($data['dulieu']) && $data['dulieu']) {
                while ($row = mysqli_fetch_array($data['dulieu'])) {
            ?>
                    <div class="form-group col-md-4">
                        <label for="txtMaNCC">Mã nhà cung cấp</label>
                        <input type="text" class="form-control" name="txtMaNCC" placeholder="Mã nhà cung cấp" value="<?php echo $row['maNCC'] ?>" readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="txtTenNCC">Tên nhà cung cấp</label>
                        <input type="text" class="form-control" name="txtTenNCC" placeholder="Tên nhà cung cấp" value="<?php echo $row['tenNCC'] ?>">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="txtDCNCC">Địa chỉ</label>
                        <input type="text" class="form-control" name="txtDCNCC" placeholder="Địa chỉ" value="<?php echo $row['diachiNCC'] ?>">
                    </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="txtSDT">Số điện thoại</label>
                <input type="number" class="form-control" name="txtSDT" placeholder="Số điện thoại" value="<?php echo $row['sdtNCC'] ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="txtEmail">Email</label>
                <input type="email" class="form-control" name="txtEmail" placeholder="Email" value="<?php echo $row['emailNCC'] ?>">
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
