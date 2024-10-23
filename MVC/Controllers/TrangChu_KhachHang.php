<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class TrangChu_KhachHang extends controller
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
        $this->view('TrangChu_KhachHang_View',[
            'page' => 'TrangChu_KhachHang_View',
            'dulieu' => $this->dssp->sanpham_list()
        ]);
    }




    
    function timkiem()
    {
        if (isset($_POST['btnSearch'])) {
            $msp = $_POST['txtMaSP'];
            $tensp = $_POST['txtTenSP'];
            $this->view([
                'page' => 'DanhSach_SanPham',
                'dulieu' => $this->dssp->sanpham_find($msp, $tensp),
                // 'dulieu' => $this->dssp->sanpham_list(),
                'msp' => $msp,
                'tensp' => $tensp
            ]);
        }
    }
    
}
