<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật kho</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .form-container {
      margin: 50px auto;
      /* Căn giữa và thêm khoảng cách ở trên */
      border: 1px solid #17a2b8;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 80%;
      /* Điều chỉnh chiều rộng của form */
    }

    .header {
      background-color: #17a2b8;
      color: white;
      height: 45px;
      padding: 7.5px 0;
      text-align: center;
      border-radius: 5px 5px 0 0;
    }

    .form-row {
      margin: 10px;
    }

    .btn-submit {
      margin-top: 20px;
      /* Khoảng cách trên nút lưu */
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <form class="form-container" method="post" action="http://localhost/BHSTHI/Kho_Them/themmoi">
      <div class="header">
        <span style="font-size: 20px; font-weight: bold;">Cập nhật kho</span>
      </div>

      <div class="form-row p-3">
        <div class="form-group col-md-6">
          <label for="txtMaKM">Mã kho</label>
          <input type="text" class="form-control" name="txtMaKho" placeholder="Mã kho" value="<?php if (isset($data['mk'])) echo $data['mk']; ?>">
        </div>

        <div class="form-group col-md-6">
          <label for="txtTenKM">Tên kho</label>
          <input type="text" class="form-control" name="txtTenKho" placeholder="Tên kho" value="<?php if (isset($data['tenkho'])) echo $data['tenkho']; ?>">
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

      <div class="btn-submit">
        <button type="submit" class="btn btn-outline-info" name="btnLuu">Lưu</button>
      </div>
    </form>
  </div>
</body>

</html>