<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class HoaDon_DanhSach extends controller
{
    protected $dshd;

    //Hàm mở danh sách
    function __construct()
    {
        $this->dshd = $this->model('hoadon');
    }


    //Hàm hiển thị giao diện
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'DanhSach_HoaDon',
            'dulieu' => $this->dshd->hoadon_find('')
        ]);
    }

    //Xóa
    function xoa($mhd)
    {
        $kq = $this->dshd->hoadon_del($mhd);
        if ($kq) {
            echo "<script> alert('Xóa thành công!')</script>";
        } else {
            echo "<script> alert('Xóa thất bại!')</script>";
        }
        $this->view('MasterLayout', [
            'page' => 'DanhSach_HoaDon',
            'dulieu' => $this->dshd->hoadon_find('')
        ]);
    }

    //Sửa
    // function sua($mhd)
    // {
    //     $this->view('MasterLayout', [
    //         'page' => 'Sua_HoaDon',
    //         // 'dulieu'=>$this->dsncc->nhacungcap_find($mncc, '')
    //         'dulieu' => $this->dshd->hoadon_sel_upd($mhd)
    //     ]);
    // }

    // function suadl()
    // {
    //     if (isset($_POST['btnSua'])) {
    //         $mhd = $_POST['txtMaHD'];
    //         $mkh = $_POST['txtMaKH'];
    //         $msp = $_POST['txtMaSP'];
    //         $tien = $_POST['txtTien'];

    //         $kq = $this->dshd->hoadon_upd($mhd, $mkh, $msp, $tien);
    //         if ($kq) {
    //             echo "<script> alert('Sửa thành công!')</script>";
    //         } else {
    //             echo "<script> alert('Sửa thất bại!')</script>";
    //         }

    //         $this->view('MasterLayout', [
    //             'page' => 'DanhSach_HoaDon',
    //             'dulieu' => $this->dshd->hoadon_find('')
    //         ]);
    //     }


    //     if (isset($_POST['btnHuy'])) {
    //         $this->view('MasterLayout', [
    //             'page' => 'DanhSach_HoaDon',
    //             'dulieu' => $this->dshd->hoadon_find('')
    //         ]);
    //     }
    // }

    function timkiem()
    {
        if (isset($_POST['btnSearch'])) {
            $mhd = $_POST['txtMaHD'];

            $this->view('MasterLayout', [
                'page' => 'DanhSach_HoaDon',
                'dulieu' => $this->dshd->hoadon_find($mhd),
                'mhd' => $mhd
            ]);
        }
    }
}
