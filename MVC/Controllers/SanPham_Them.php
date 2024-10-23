<?php

class SanPham_Them extends controller
{
    protected $sp;

    function __construct()
    {
        $this->sp = $this->model('qlsanpham');
    }

    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'Them_SanPham',
            'msp'=>'',
            'tensp' => '',
            'ha' => '',
            'gsp' => '',
            'nsx' => '',
            'sl' => '',
            'mncc' => '',
            'mk' => '',
            'dm' => ''

        ]);
    }

    function themmoi()
    {
        if (isset($_POST['btnLuu'])) {
            //Lấy dữ liệu trên các control của form
            $msp = $_POST['txtMaSP'];
            $tensp = $_POST['txtTenSP'];
            $gsp = $_POST['txtGSP'];
            $nsx = $_POST['txtNSX'];
            $sl = $_POST['txtSL'];
            $mncc = $_POST['txtNCC'];
            $mk = $_POST['txtKho'];
            $dm = $_POST['txtDM'];
            //Xử lý ảnh
            $ha = $_FILES['txtHA']['name'];
            $ha_tmp = $_FILES['txtHA']['tmp_name'];
            $ha = time() . '_' . $ha;
            $path = __DIR__ . '/uploads/';
           
            //Kiểm tra nhập đầy đủ thông tin
            if ($msp == '' || $tensp == '' || $ha == '' || $gsp == '' || $mncc == '' || $mk == '' || $dm == '') {
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            } else {

                $chkid = $this->sp->checksameid($tensp);
                if ($chkid) {
                    echo "<script> alert('Trùng mã nhà cung cấp!')</script>";
                } else {
                    $kq = $this->sp->sanpham_ins($msp, $tensp, $ha, $gsp, $nsx, $sl, $mncc, $mk, $dm);

                    if ($kq) {
                        move_uploaded_file($ha_tmp, $path . $ha);
                        echo "<script> alert('Thêm mới thành công'); </script>";
                        echo "<script> window.location.href= 'http://localhost/BHSTHI/SanPham_DanhSach'</script>";
                    } else {
                        echo "<script> alert('Thêm mới thất bại'); </script>";
                    }
                }
            }
        }
        $this->view('MasterLayout', [
            'page' => 'Them_SanPham',
            'msp' => $msp,
            'tensp' => $tensp,
            'ha' => $ha,
            'gsp' => $gsp,
            'nsx' => $nsx,
            'sl' => $sl,
            'mncc' => $mncc,
            'mk' => $mk,
            'dm' => $dm
        ]);
    }
}
