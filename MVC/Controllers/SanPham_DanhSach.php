<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class SanPham_DanhSach extends controller
{
    protected $dssp;

    //Hàm mở danh sách
    function __construct()
    {
        $this->dssp = $this->model('qlsanpham');
    }


    // Hàm hiển thị giao diện
    // function Get_data()
    // {
    //     $this->view('MasterLayout', [
    //         'page' => 'DanhSach_SanPham',
    //         'dulieu' => $this->dssp->sanpham_find('', '')
    //     ]);
    // }
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'DanhSach_SanPham',
            'dulieu' => $this->dssp->sanpham_list()
        ]);
    }




    function xoa($msp)
    {
        $kq = $this->dssp->sanpham_find($msp, ''); // Truyền thêm tham số rỗng
        if ($kq) {
            $row = mysqli_fetch_assoc($kq);
            $hinhAnh = $row['hinhAnh'];
            $path = __DIR__ . '/uploads/' . $hinhAnh;

            // Xóa tệp hình ảnh
            if (file_exists($path) && unlink($path)) {
                // Sau khi xóa hình ảnh thành công, tiếp tục xóa sản phẩm khỏi cơ sở dữ liệu
                $kq_xoa = $this->dssp->sanpham_del($msp);
                if ($kq_xoa) {
                    echo "<script> alert('Xóa thành công!')</script>";
                    // echo "<script> window.location.href= 'http://localhost/BHST/SanPham_DanhSach'</script>";
                } else {
                    echo "<script> alert('Xóa thất bại!')</script>";
                }
            } else {
                echo "<script> alert('Lỗi khi xóa hình ảnh!')</script>";
            }
        }

        // Sau khi xóa hoặc nếu không tìm thấy sản phẩm, điều hướng trở lại danh sách sản phẩm
        $this->view('MasterLayout', [
            'page' => 'DanhSach_SanPham',
            // 'dulieu' => $this->dssp->sanpham_find('', '')
            'dulieu' => $this->dssp->sanpham_list()
        ]);
    }

    //Sửa
    function sua($msp)
    {

        $this->view('MasterLayout', [
            'page' => 'Sua_SanPham',
            // 'dulieu'=>$this->dsncc->nhacungcap_find($mncc, '')
            'dulieu' => $this->dssp->sanpham_sel_upd($msp)
        ]);
    }

    function suadl()
    {
        if (isset($_POST['btnSua'])) {
            //Lấy dữ liệu trên các control của form
            $msp = $_POST['txtMaSP'];
            $tensp = $_POST['txtTenSP'];
            $gsp = $_POST['txtGSP'];
            $nsx = $_POST['txtNSX'];
            $sl = $_POST['txtSL'];
            $mncc = $_POST['txtNCC'];
            $mk= $_POST['txtKho'];
            $dm = $_POST['txtDM'];
            //Xử lý ảnh
            $ha = $_FILES['txtHA']['name'];
            $ha_tmp = $_FILES['txtHA']['tmp_name'];
            $ha = time() . '_' . $ha;
            $path = __DIR__ . '/uploads/';
            move_uploaded_file($ha_tmp, $path . $ha);
            $kq = $this->dssp->sanpham_upd($msp, $tensp, $ha, $gsp, $nsx, $sl,$mncc,$mk, $dm);
            if ($kq) {

                echo "<script> alert('Sửa thành công!')</script>";
            } else {
                echo "<script> alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout', [
                'page' => 'DanhSach_SanPham',
                // 'dulieu' => $this->dssp->sanpham_find('', '')
                'dulieu' => $this->dssp->sanpham_list()
            ]);
        }


        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'DanhSach_SanPham',
                // 'dulieu' => $this->dssp->sanpham_find('', '')
                'dulieu' => $this->dssp->sanpham_list()
            ]);
        }
    }

    function timkiem()
    {
        if (isset($_POST['btnSearch'])) {
            $msp = $_POST['txtMaSP'];
            $tensp = $_POST['txtTenSP'];
            $this->view('MasterLayout', [
                'page' => 'DanhSach_SanPham',
                'dulieu' => $this->dssp->sanpham_find($msp, $tensp),
                // 'dulieu' => $this->dssp->sanpham_list(),
                'msp' => $msp,
                'tensp' => $tensp
            ]);
        }
    }
    
}
