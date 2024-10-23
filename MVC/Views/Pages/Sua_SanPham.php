<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Sửa Sản Phẩm</title>
    <style>
        .Them_SP {
            margin: 50px auto;
            border: 1px solid #17a2b8;
            border-radius: 5px;
            padding: 20px;
            max-width: 800px;
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

        .img-preview {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        #imagePreview {
            width: 150px;
            height: auto;
            display: block;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .footer-buttons {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <form class="Them_SP" method="post" action="http://localhost/BHSTHI/SanPham_DanhSach/suadl" enctype="multipart/form-data">
        <div class="tieude">
            <h5>Sửa Sản Phẩm</h5>
        </div>

        <?php
        if (isset($data['dulieu']) && $data['dulieu']) {
            while ($row = mysqli_fetch_array($data['dulieu'])) {
                $ham = $row['hinhAnh'];
                $maNCC = $row['maNCC'];
                $maKho = $row['maKho'];
        ?>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="txtMaSP">Mã sản phẩm</label>
                        <input type="text" name="txtMaSP" class="form-control" placeholder="Mã sản phẩm" value="<?php echo $row['maSP'] ?>" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="txtTenSP">Tên sản phẩm</label>
                        <input type="text" name="txtTenSP" class="form-control" placeholder="Tên sản phẩm" value="<?php echo $row['tenSP'] ?>" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="txtGSP">Giá bán sản phẩm</label>
                        <input type="number" name="txtGSP" class="form-control" placeholder="Giá sản phẩm" value="<?php echo $row['giaSP'] ?>" required>
                    </div>
                </div>

                <div class="img-preview">
                    <img id="imagePreview" src="<?php echo 'http://localhost/BHST/MVC/Controllers/uploads/'.$row['hinhAnh'] ?>" alt="Hình ảnh sản phẩm">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="txtHA">Hình ảnh</label>
                        <input type="file" name="txtHA" accept="image/*" class="form-control" onchange="previewImage(this)">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="txtNSX">Ngày sản xuất</label>
                        <input type="date" name="txtNSX" class="form-control" value="<?php echo $row['NSX'] ?>" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="txtHSD">Số lượng</label>
                        <input type="number" name="txtSL" class="form-control" value="<?php echo $row['soLuong'] ?>" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="txtNCC">Nhà cung cấp</label>
                        <select class="form-control" name="txtNCC" id="txtNCC">
                            <option disabled selected>Chọn nhà cung cấp</option>
                            <?php
                            $db_connection = mysqli_connect("localhost", "root", "210303", "baitap");
                            if (!$db_connection) {
                                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                            }

                            $query = "SELECT maNCC, tenNCC FROM qlnhacungcap";
                            $result = mysqli_query($db_connection, $query);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $mncc = $row['maNCC'];
                                    $tenncc = $row['tenNCC'];
                                    echo "<option value='$mncc'>$tenncc</option>";
                                }
                            } else {
                                echo "<script> alert('Không thành công'); </script>";
                            }

                            mysqli_close($db_connection);
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtKho">Kho</label>
                        <select class="form-control" name="txtKho" id="txtKho">
                            <option disabled selected>Chọn nhà cung cấp</option>
                            <?php
                            $db_connection = mysqli_connect("localhost", "root", "210303", "baitap");
                            if (!$db_connection) {
                                die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
                            }

                            $query = "SELECT maKho, tenKho FROM qlkho";
                            $result = mysqli_query($db_connection, $query);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $mk = $row['maKho'];
                                    $tenkho = $row['tenKho'];
                                    echo "<option value='$mk'>$tenkho</option>";
                                }
                            } else {
                                echo "<script> alert('Không thành công'); </script>";
                            }

                            mysqli_close($db_connection);
                            ?>
                        </select>
                    </div>
                    
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="txtTenNSP">Mã nhóm sản phẩm</label>
                        <select class="form-control" name="txtDM">
                            <option disabled selected>Chọn tên nhóm sản phẩm</option>
                            <?php
                            $db_connection = mysqli_connect("localhost", "root", "210303", "baitap");
                            $sql_dm = "SELECT * FROM qlnhomsp ORDER BY maNSP DESC";
                            $dt_dm = mysqli_query($db_connection, $sql_dm);
                            while ($row = mysqli_fetch_array($dt_dm)) {
                            ?>
                                <option value="<?php echo $row['maNSP'] ?>"><?php echo $row['tenNSP'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
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

    <script>
        function previewImage(input) {
            var imagePreview = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('txtNCC').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var giaBan = selectedOption.getAttribute('data-uudai');
            document.getElementById('txtUD').value = giaBan;
        });
    </script>
</body>

</html>
