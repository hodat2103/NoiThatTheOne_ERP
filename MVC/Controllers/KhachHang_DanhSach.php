<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    class KhachHang_DanhSach extends controller{
        protected $dskh;

        //Hàm mở danh sách
        function __construct(){
            $this->dskh=$this->model('qlkhachhang');
        }


        //Hàm hiển thị giao diện
        function Get_data(){
            $this->view('MasterLayout',[
                'page'=>'DanhSach_KhachHang',
                'dulieu'=>$this->dskh->khachhang_find('', '')
            ]);
        }

        //Xóa
        function xoa($mkh){
            // $kq = $this->dskh->khachhang_del($mkh);
            // if($kq){
            //     echo "<script> alert('Xóa thành công!')</script>";
            // }
            // else{
            //     echo "<script> alert('Xóa thất bại!')</script>";
            // }
            // $this->view('MasterLayout',[
            //     'page'=>'DanhSach_KhachHang',
            //     'dulieu'=>$this->dskh->khachhang_find('', '')   
            // ]);

            $hasForeignKey = $this->dskh->checkForeignKey($mkh);
            if(!$hasForeignKey){
                $kq = $this->dskh->khachhang_del($mkh);
                if($kq){
                    echo "<script> alert('Xóa thành công!')</script>";
                }
                else{
                    echo "<script> alert('Xóa thất bại!')</script>";
                }
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_KhachHang',
                    'dulieu'=>$this->dskh->khachhang_find('', '')   
                ]);
            }
            else{
                echo "<script> alert('Không thể xóa')</script>";
            }

            $this->view('MasterLayout',[
                'page'=>'DanhSach_KhachHang',
                'dulieu'=>$this->dskh->khachhang_find('', '')   
            ]);

        }

        //Sửa
        function sua($mkh){
            $this->view('MasterLayout',[
                'page'=>'Sua_KhachHang',
                // 'dulieu'=>$this->dsncc->nhacungcap_find($mncc, '')
                'dulieu'=>$this->dskh-> khachhang_sel_upd($mkh)
            ]);
        }

        function suadl(){
            if(isset($_POST['btnSua'])){
                $mkh = $_POST['txtMaKH'] ;
                $tenkh = $_POST['txtTenKH'];
                $sdt = $_POST['txtSDT'];
                $gt = $_POST['txtGioiTinh'];
            
            $kq = $this->dskh->khachhang_upd($mkh, $tenkh, $sdt, $gt);
            if ($kq) {
                echo "<script> alert('Sửa thành công!')</script>";

            } else {
                echo "<script> alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout',[
                'page'=>'DanhSach_KhachHang',
                'dulieu'=>$this->dskh->khachhang_find('', '') 
            ]);

            }


            if(isset($_POST['btnHuy'])){
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_KhachHang',
                    'dulieu'=>$this->dskh->khachhang_find('', '') 
                ]);
            }
        }

        function timkiem(){
            if(isset($_POST['btnSearch'])){
                $mkh = $_POST['txtMaKH'] ;
                $tenkh = $_POST['txtTenKH'];
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_KhachHang',
                    'dulieu'=>$this->dskh->khachhang_find($mkh, $tenkh),
                    'mkh'=>$mkh,
                    'tenkh'=>$tenkh
                ]);
            }
        }


    }

?>