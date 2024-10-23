<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật nhóm sản phẩm</title>
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
        <form class="form-section" method="post" action="http://localhost/BHSTHI/NhomSanPham_Them/themmoi">
            <div class="form-header">Cập nhật nhóm sản phẩm</div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtMaNSP">Mã nhóm sản phẩm</label>
                    <input type="text" class="form-control" name="txtMaNSP" placeholder="Mã nhóm sản phẩm" value="<?php if (isset($data['mnsp'])) echo $data['mnsp']; ?>" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="txtTenNSP">Tên nhóm sản phẩm</label>
                    <input type="text" class="form-control" name="txtTenNSP" placeholder="Tên nhóm sản phẩm" value="<?php if (isset($data['tennsp'])) echo $data['tennsp']; ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtTT">Thứ tự</label>
                    <input type="number" class="form-control" name="txtTT" placeholder="Thứ tự" value="<?php if (isset($data['tt'])) echo $data['tt']; ?>" required>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-outline-info" name="btnLuu">Cập nhật</button>
            </div>
        </form>
    </div>
</body>

</html>
