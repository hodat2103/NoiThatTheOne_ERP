<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm Kho</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .form-container,
        .formdskm {
            margin: 50px auto; 
            border: 1px solid #17a2b8;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%; 
        }

        .header {
            background-color: #17a2b8;
            color: white;
            height: 45px;
            padding: 7.5px 0;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Nút tạo mới -->
        <div class="btn-create mb-3 text-right">
            <form action="http://localhost/BHSTHI/Kho_Them">
                <input class="btn btn-outline-info" type="submit" name="btnTaoMoi" value="Tạo mới" style="width: 85px; font-weight: bold">
            </form>
        </div>

        <!-- Form tìm kiếm Kho -->
        <form class="form-container" method="post" action="http://localhost/BHSTHI/Kho_DanhSach/timkiem">
            <div class="header">Tìm kiếm kho</div>
            <div class="form-row p-3">
                <div class="form-group col-md-6">
                    <label for="txtMaKM">Mã kho</label>
                    <input type="text" class="form-control" name="txtMaKM" placeholder="Mã Kho" value="<?php if (isset($data['mkm'])) echo $data['mkm'] ?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="txtTenKM">Tên kho</label>
                    <input type="text" class="form-control" name="txtTenKM" placeholder="Tên Kho" value="<?php if (isset($data['tenkm'])) echo $data['tenkm'] ?>">
                </div>
            </div>

            <div class="text-center mb-3">
                <button type="submit" class="btn btn-outline-info" name="btnSearch">Tìm kiếm</button>
            </div>
        </form>

        <!-- Danh sách Kho -->
        <form class="formdskm">
            <div class="header">Danh sách Kho</div>
            <table class="table mt-2">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Mã Kho</th>
                        <th>Tên Kho</th>
                        <th>Nhân viên</th>
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
                                <td><?php echo $row['maKho'] ?></td>
                                <td><?php echo $row['tenKho'] ?></td>
                                <td><?php echo $row['maNV'] ?></td>
                                <td>
                                    <a href="http://localhost/BHSTHI/Kho_DanhSach/sua/<?php echo $row['maKho'] ?>">
                                        <i class="fas fa-edit fa-lg" style="color: black;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="http://localhost/BHSTHI/Kho_DanhSach/xoa/<?php echo $row['maKho'] ?>">
                                        <i class="fas fa-archive fa-lg" style="color: black;"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
