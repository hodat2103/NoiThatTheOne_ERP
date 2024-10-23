<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật nhà cung cấp</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .form-container {
      max-width: 900px;
      margin: 50px auto;
      border: 1px solid #17a2b8;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-header {
      background-color: #17a2b8;
      color: white;
      padding: 10px;
      font-size: 20px;
      font-weight: bold;
      text-align: center;
      border-radius: 5px 5px 0 0;
    }

    .form-body {
      padding: 20px;
    }

    .form-row {
      margin-bottom: 15px;
    }

    .btn-custom {
      width: 120px;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <!-- Form for Updating Supplier -->
  <form class="form-container" method="post" action="http://localhost/BHSTHI/NhaCungCap_Them/themmoi">
    <!-- Form Header -->
    <div class="form-header">Cập nhật nhà cung cấp</div>

    <!-- Form Body -->
    <div class="form-body">
      <div class="form-row">
        <!-- Mã nhà cung cấp -->
        <div class="form-group col-md-6">
          <label for="txtMaNCC">Mã nhà cung cấp</label>
          <input type="text" class="form-control" name="txtMaNCC" placeholder="Mã nhà cung cấp" value="<?php if(isset($data['mncc'])) echo $data['mncc'] ?>">
        </div>

        <!-- Tên nhà cung cấp -->
        <div class="form-group col-md-6">
          <label for="txtTenNCC">Tên nhà cung cấp</label>
          <input type="text" class="form-control" name="txtTenNCC" placeholder="Tên nhà cung cấp" value="<?php if(isset($data['tenncc'])) echo $data['tenncc'] ?>">
        </div>
      </div>

      <div class="form-row">
        <!-- Địa chỉ -->
        <div class="form-group col-md-6">
          <label for="txtDCNCC">Địa chỉ</label>
          <input type="text" class="form-control" name="txtDCNCC" placeholder="Địa chỉ" value="<?php if(isset($data['dc'])) echo $data['dc'] ?>">
        </div>

        <!-- Số điện thoại -->
        <div class="form-group col-md-6">
          <label for="txtSDT">Số điện thoại</label>
          <input type="number" class="form-control" name="txtSDT" placeholder="Số điện thoại" value="<?php if(isset($data['sdt'])) echo $data['sdt'] ?>">
        </div>
      </div>

      <div class="form-row">
        <!-- Email -->
        <div class="form-group col-md-6">
          <label for="txtEmail">Email</label>
          <input type="email" class="form-control" name="txtEmail" placeholder="Email" value="<?php if(isset($data['email'])) echo $data['email'] ?>">
        </div>
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button type="submit" class="btn btn-outline-info btn-custom" name="btnLuu">Tạo mới</button>
      </div>
    </div>
  </form>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.
