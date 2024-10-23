<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhóm sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .container {
            max-width: 1400px;
            margin: 50px auto;
        }

        .form-section {
            border: 1px solid #17a2b8;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
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

        .table th, .table td {
            vertical-align: middle; /* Center the text vertically */
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="http://localhost/BHSTHI/NhomSanPham_Them">
            <div class="text-right">
                <input class="btn btn-outline-info" type="submit" name="btnTaoMoi" value="Tạo mới" style="width: 85px; font-weight: bold">
            </div>
        </form>

        <form class="form-section" method="post" action="http://localhost/BHSTHI/NhomSanPham_DanhSach/timkiem">
            <div class="form-header">Tìm kiếm nhóm sản phẩm</div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtMaNSP">Mã nhóm sản phẩm</label>
                    <input type="text" class="form-control" name="txtMaNSP" placeholder="Mã nhóm sản phẩm" value="<?php if (isset($data['mnsp'])) echo $data['mnsp'] ?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="txtTenNSP">Tên nhóm sản phẩm</label>
                    <input type="text" class="form-control" name="txtTenNSP" placeholder="Tên nhóm sản phẩm" value="<?php if (isset($data['tennsp'])) echo $data['tennsp'] ?>">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-outline-info" name="btnSearch">Tìm kiếm</button>
            </div>
        </form>

        <form class="form-section" method="post" action="">
            <div class="form-header">Danh sách nhóm sản phẩm</div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Mã nhóm sản phẩm</th>
                        <th>Tên nhóm sản phẩm</th>
                        <th>Thứ tự</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($data['dulieu']) && $data['dulieu'] != null) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($data['dulieu'])) {
                    ?>
                            <tr>
                                <td><?php echo ++$i ?></td>
                                <td><?php echo $row['maNSP'] ?></td>
                                <td><?php echo $row['tenNSP'] ?></td>
                                <td><?php echo $row['thuTu'] ?></td>
                                <td>
                                    <a href="http://localhost/BHSTHI/NhomSanPham_DanhSach/sua/<?php echo $row['maNSP'] ?>">
                                        <i class="fas fa-edit fa-lg" style="color: black;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="http://localhost/BHSTHI/NhomSanPham_DanhSach/xoa/<?php echo $row['maNSP'] ?>">
                                        <i class="fas fa-archive fa-lg" style="color: black;"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Không có dữ liệu</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>
