<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Sửa Nhóm Sản Phẩm</title>
    <style>
        .Them_NSP {
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

    <form class="Them_NSP" method="post" action="http://localhost/BHSTHI/NhomSanPham_DanhSach/suadl">
        <div class="tieude">
            <h5>Sửa Nhóm Sản Phẩm</h5>
        </div>

        <?php
        if (isset($data['dulieu']) && $data['dulieu']) {
            while ($row = mysqli_fetch_array($data['dulieu'])) {
        ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="txtMaNSP">Mã nhóm sản phẩm</label>
                        <input type="text" class="form-control" name="txtMaNSP" placeholder="Mã nhóm sản phẩm" value="<?php echo $row['maNSP'] ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="txtTenNSP">Tên nhóm sản phẩm</label>
                        <input type="text" class="form-control" name="txtTenNSP" placeholder="Tên nhóm sản phẩm" value="<?php echo $row['tenNSP'] ?>" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="txtMoTa">Thứ tự</label>
                        <input type="text" class="form-control" name="txtTT" placeholder="Thứ tự" value="<?php echo $row['thuTu'] ?>" required>
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
