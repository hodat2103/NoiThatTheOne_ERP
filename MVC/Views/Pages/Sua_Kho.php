<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Sửa kho</title>

    <style>
        .Them_KM {
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

    <form class="Them_KM" method="post" action="http://localhost/BHSTHI/Kho_DanhSach/suadl">
        <div class="tieude">
            <h5>Sửa kho</h5>
        </div>

        <div class="form-row">
            <?php
            if (isset($data['dulieu']) && $data['dulieu']) {
                while ($row = mysqli_fetch_array($data['dulieu'])) {
            ?>
                    <div class="form-group col-md-6">
                        <label for="txtMaKho">Mã kho</label>
                        <input type="text" class="form-control" name="txtMaKho" placeholder="Mã kho" value="<?php echo $row['maKho'] ?>" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="txtTenKho">Tên kho</label>
                        <input type="text" class="form-control" name="txtTenKho" placeholder="Tên kho" value="<?php echo $row['tenKho'] ?>">
                    </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-6">
                <label for="txtMaNV" class="form-label">Nhân viên</label>
                <select class="form-control" name="txtMaNV" id="txtMaNV">
                    <option disabled selected>Chọn nhân viên</option>
                    <?php
                    $db_connection = mysqli_connect("localhost", "root", "210303", "baitap");
                    $query = "SELECT maNV, tenNV FROM qlnhanvien";
                    $result = mysqli_query($db_connection, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $mnv = $row['maNV'];
                            $tennv = $row['tenNV'];
                            echo "<option value='$tennv'>$tennv</option>";
                        }
                    }
                    mysqli_close($db_connection);
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>