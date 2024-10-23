<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #f8f9fa;
            border: 1px solid #17a2b8;
            border-radius: 8px;
            padding: 20px;
        }

        .form-title {
            background-color: #17a2b8;
            color: white;
            text-align: center;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            margin-bottom: 20px;
        }

        .img-preview {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .img-preview img {
            max-width: 50%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer button {
            padding: 12px 30px;
            font-size: 16px;
            background-color: #17a2b8;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .form-footer button:hover {
            background-color: #138496;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="form-container" method="post" action="http://localhost/BHSTHI/SanPham_Them/themmoi" enctype="multipart/form-data">
            <div class="form-title">
                <h3>Cập Nhật Sản Phẩm</h3>
            </div>

            <!-- Form Fields -->

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="txtMaSP" class="form-label">Mã sản phẩm</label>
                    <input type="text" name="txtMaSP" class="form-control" placeholder="Mã sản phẩm" value="<?php if (isset($data['msp'])) echo $data['msp'] ?>">
                </div>
                <div class="col-md-4">
                    <label for="txtTenSP" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="txtTenSP" class="form-control" placeholder="Tên sản phẩm" value="<?php if (isset($data['tensp'])) echo $data['tensp'] ?>">
                </div>
                <div class="col-md-4">
                    <label for="txtGSP" class="form-label">Giá bán sản phẩm</label>
                    <input type="number" name="txtGSP" class="form-control" placeholder="Giá sản phẩm" value="<?php if (isset($data['gsp'])) echo $data['gsp'] ?>">
                </div>
            </div>

            <div class="img-preview">
                <img id="imgPreview" src="https://shopimg.posapp.vn/defaults/image.png" alt="Hình ảnh sản phẩm">
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="txtHA" class="form-label">Hình ảnh</label>
                    <input type="file" name="txtHA" accept="image/*" class="form-control" onchange="previewImage(this)">
                </div>
                <div class="col-md-6">
                    <label for="txtNSX" class="form-label">Ngày sản xuất</label>
                    <input type="date" name="txtNSX" class="form-control" value="<?php if (isset($data['nsx'])) echo $data['nsx'] ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="txtSL" class="form-label">Số lượng</label>
                    <input type="number" name="txtSL" class="form-control" value="<?php if (isset($data['sl'])) echo $data['sl'] ?>">
                </div>
                <!-- <div class="col-md-6">
                    <label for="txtMaKM" class="form-label">Mã khuyến mãi</label>
                    <select class="form-control" name="txtMaKM">
                        <option disabled selected>Chọn mã khuyến mãi</option>
                        <?php
                        $db_connection = mysqli_connect("localhost", "root", "210303", "baitap");
                        $query = "SELECT maKhuyenMai FROM qlkhuyenmai";
                        $result = mysqli_query($db_connection, $query);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['maKhuyenMai']}'>{$row['maKhuyenMai']}</option>";
                            }
                        }
                        mysqli_close($db_connection);
                        ?>
                    </select>
                </div> -->
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="txtNCC" class="form-label">Nhà cung cấp</label>
                    <select class="form-control" name="txtNCC">
                        <option disabled selected>Chọn nhà cung cấp</option>
                        <?php
                        $db_connection = mysqli_connect("localhost", "root", "210303", "baitap");
                        $query = "SELECT tenNCC FROM qlnhacungcap";
                        $result = mysqli_query($db_connection, $query);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['tenNCC']}'>{$row['tenNCC']}</option>";
                            }
                        }
                        mysqli_close($db_connection);
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="txtKho" class="form-label">Kho</label>
                    <select class="form-control" name="txtKho">
                        <option disabled selected>Chọn kho</option>
                        <?php
                        $db_connection = mysqli_connect("localhost", "root", "210303", "baitap");
                        $query = "SELECT tenKho FROM qlkho";
                        $result = mysqli_query($db_connection, $query);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['tenKho']}'>{$row['tenKho']}</option>";
                            }
                        }
                        mysqli_close($db_connection);
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="txtDM" class="form-label">Danh Mục SP</label>
                    <select class="form-control" name="txtDM">
                        <option disabled selected>Chọn kho</option>
                        <?php
                        $db_connection = mysqli_connect("localhost", "root", "210303", "baitap");
                        $query = "SELECT tenNSP FROM qlnhomsp";
                        $result = mysqli_query($db_connection, $query);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['tenNSP']}'>{$row['tenNSP']}</option>";
                            }
                        }
                        mysqli_close($db_connection);
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary" name="btnLuu">Tạo mới</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            var imagePreview = document.getElementById('imgPreview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
