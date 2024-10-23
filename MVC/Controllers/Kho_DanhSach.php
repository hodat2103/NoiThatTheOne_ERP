<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    class kho_DanhSach extends controller{
        protected $dsk;

        //Hàm mở danh sách
        function __construct(){
            $this->dsk=$this->model('qlkho');
        }


        //Hàm hiển thị giao diện
        function Get_data(){
            $this->view('MasterLayout',[
                'page'=>'DanhSach_Kho',
                'dulieu'=>$this->dsk->kho_find('', '')
            ]);
        }

        //Xóa
        function xoa($mk){
            // $kq = $this->dsk->kho_del($mk);
            // if($kq){
            //     echo "<script> alert('Xóa thành công!')</script>";
            // }
            // else{
            //     echo "<script> alert('Xóa thất bại!')</script>";
            // }
            // $this->view('MasterLayout',[
            //     'page'=>'DanhSach_kho',
            //     'dulieu'=>$this->dsk->kho_find('', '')   
            // ]);


            $hasForeignKey = $this->dsk->checkForeignKey($mk);

            if(!$hasForeignKey){
                $kq = $this->dsk->kho_del($mk);
            if($kq){
                echo "<script> alert('Xóa thành công!')</script>";
            }
            else{
                echo "<script> alert('Xóa thất bại!')</script>";
            }
            $this->view('MasterLayout',[
                'page'=>'DanhSach_Kho',
                'dulieu'=>$this->dsk->kho_find('', '')   
            ]);
            }
            else{
                echo "<script> alert('Không thể xóa')</script>";
            }

            $this->view('MasterLayout',[
                'page'=>'DanhSach_Kho',
                'dulieu'=>$this->dsk->kho_find('', '')   
            ]);

        }

        //Sửa
        function sua($mk){
            $this->view('MasterLayout',[
                'page'=>'Sua_Kho',
                // 'dulieu'=>$this->dsncc->nhacungcap_find($mncc, '')
                'dulieu'=>$this->dsk-> kho_sel_upd($mk)
            ]);
        }

        function suadl(){
            if(isset($_POST['btnSua'])){
                $mk = $_POST['txtMaKho'] ;
                $tenkho = $_POST['txtTenKho'];
                $nv = $_POST['txtTenNV'];
            
            $kq = $this->dsk->kho_upd($mk, $tenkho, $nv);
            if ($kq) {
                echo "<script> alert('Sửa thành công!')</script>";

            } else {
                echo "<script> alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout',[
                'page'=>'DanhSach_Kho',
                'dulieu'=>$this->dsk->kho_find('', '') 
            ]);

            }


            if(isset($_POST['btnHuy'])){
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_Kho',
                    'dulieu'=>$this->dsk->kho_find('', '') 
                ]);
            }
        }

        function timkiem(){
            if(isset($_POST['btnSearch'])){
                $mk = $_POST['txtMaKho'] ;
                $tenkho = $_POST['txtTenKho'];
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_Kho',
                    'dulieu'=>$this->dsk->kho_find($mk, $tenkho),
                    'mk'=>$mk,
                    'tenkho'=>$tenkho
                ]);
            }
        }


    }

?>