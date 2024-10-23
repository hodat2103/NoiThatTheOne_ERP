<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Hóa Đơn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 1000px;
            margin: auto;
        }

        .form-section {
            border: 1px solid #17a2b8;
            margin-bottom: 20px;
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

        .btn-custom {
            width: 120px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-5 pt-5">
       
        <h2 class="text-center mb-4">Danh sách Hóa Đơn</h2>

        <!-- Form tìm kiếm -->
        <form class="form-section mb-4" method="POST" action="/HoaDon_DanhSach/timkiem">
            <div class="form-header">Tìm kiếm hóa đơn</div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="txtMaHD">Mã hóa đơn</label>
                    <input type="text" id="txtMaHD" name="txtMaHD" class="form-control" placeholder="Nhập mã hóa đơn">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="txtKhachHang">Khách hàng</label>
                    <input type="text" id="txtKhachHang" name="txtKhachHang" class="form-control" placeholder="Nhập tên khách hàng">
                </div>
            </div>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-outline-info" name="btnSearch">Tìm kiếm</button>
            </div>
        </form>

        <!-- Bảng danh sách hóa đơn -->
        <div class="form-section">
            <div class="form-header">Danh sách hóa đơn</div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Mã Hóa Đơn</th>
                        <th scope="col">Ngày</th>
                        <th scope="col">Khách Hàng</th>
                        <th scope="col">Tổng Tiền</th>
                        <th scope="col">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($dulieu) && !empty($dulieu)): ?>
                        <?php foreach ($dulieu as $hoaDon): ?>
                            <tr>
                                <td><?php echo $hoaDon['maHD']; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($hoaDon['ngay'])); ?></td>
                                <td><?php echo $hoaDon['khachHang']; ?></td>
                                <td><?php echo number_format($hoaDon['tongTien'], 0, ',', '.') . ' VNĐ'; ?></td>
                                <td>
                                    <a href="/HoaDon_DanhSach/xoa/<?php echo $hoaDon['maHD']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này không?');">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Không có hóa đơn nào được tìm thấy.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
