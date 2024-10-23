<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    class NhomSanPham_DanhSach extends controller{
        protected $dsnsp;

        //Hàm mở danh sách
        function __construct(){
            $this->dsnsp=$this->model('qlnhomsp');
        }


        //Hàm hiển thị giao diện
        function Get_data(){
            $this->view('MasterLayout',[
                'page'=>'DanhSach_NhomSanPham',
                'dulieu'=>$this->dsnsp->nhomsanpham_find('', '')
            ]);
        }

        //Xóa
        function xoa($mnsp){
            // $kq = $this->dsnsp->nhomsanpham_del($mnsp);
            // if($kq){
            //     echo "<script> alert('Xóa thành công!')</script>";
            // }
            // else{
            //     echo "<script> alert('Xóa thất bại!')</script>";
            // }
            // $this->view('MasterLayout',[
            //     'page'=>'DanhSach_NhomSanPham',
            //     'dulieu'=>$this->dsnsp->nhomsanpham_find('', '')   
            // ]);

            $hasForeignKey = $this->dsnsp->checkForeignKey($mnsp);
            if(!$hasForeignKey){
                $kq = $this->dsnsp->nhomsanpham_del($mnsp);
                if($kq){
                    echo "<script> alert('Xóa thành công!')</script>";
                }
                else{
                    echo "<script> alert('Xóa thất bại!')</script>";
                }
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_NhomSanPham',
                    'dulieu'=>$this->dsnsp->nhomsanpham_find('', '')   
                ]);
            }
            else{
                echo "<script> alert('Không thể xóa')</script>";
            }

            $this->view('MasterLayout',[
                'page'=>'DanhSach_NhomSanPham',
                'dulieu'=>$this->dsnsp->nhomsanpham_find('', '')   
            ]);



        }

        //Sửa
        function sua($mnsp){
            $this->view('MasterLayout',[
                'page'=>'Sua_NhomSanPham',
                // 'dulieu'=>$this->dsncc->nhacungcap_find($mncc, '')
                'dulieu'=>$this->dsnsp-> nhomsanpham_sel_upd($mnsp)
            ]);
        }

        function suadl(){
            if(isset($_POST['btnSua'])){
                $mnsp = $_POST['txtMaNSP'];
                $tennsp = $_POST['txtTenNSP'];
                $tt = $_POST['txtTT'];
            $kq = $this->dsnsp->nhomsanpham_upd($mnsp, $tennsp, $tt);
            if ($kq) {
                echo "<script> alert('Sửa thành công!')</script>";

            } else {
                echo "<script> alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout',[
                'page'=>'DanhSach_NhomSanPham',
                'dulieu'=>$this->dsnsp->nhomsanpham_find('', '') 
            ]);

            }


            if(isset($_POST['btnHuy'])){
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_NhomSanPham',
                    'dulieu'=>$this->dsnsp->nhomsanpham_find('', '') 
                ]);
            }
        }

        function timkiem(){
            if(isset($_POST['btnSearch'])){
                $mnsp = $_POST['txtMaNSP'];
                $tennsp = $_POST['txtTenNSP'];
                $tt = $_POST['txtTT'];
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_NhomSanPham',
                    'dulieu'=>$this->dsnsp->nhomsanpham_find($mnsp, $tennsp),
                    'mnsp'=>$mnsp,
                    'tennsp'=>$tennsp,
                    'tt'=>$tt
                ]);
            }
        }


    }

?>