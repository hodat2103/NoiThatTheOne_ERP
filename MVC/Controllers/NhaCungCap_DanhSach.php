<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    class NhaCungCap_DanhSach extends controller{
        protected $dsncc;

        //Hàm mở danh sách
        function __construct(){
            $this->dsncc=$this->model('qlnhacungcap');
        }


        //Hàm hiển thị giao diện
        function Get_data(){
            $this->view('MasterLayout',[
                'page'=>'DanhSach_NhaCungCap',
                'dulieu'=>$this->dsncc->nhacungcap_find('', '')
            ]);
        }

        //Xóa
        function xoa($mncc){
            $kq = $this->dsncc->nhacungcap_del($mncc);
            if($kq){
                echo "<script> alert('Xóa thành công!')</script>";
            }
            else{
                echo "<script> alert('Xóa thất bại!')</script>";
            }
            $this->view('MasterLayout',[
                'page'=>'DanhSach_NhaCungCap',
                'dulieu'=>$this->dsncc->nhacungcap_find('', '')   
            ]);


            // $hasForeignKey = $this->dsncc->checkForeignKey($mncc);

            // if(!$hasForeignKey){
            //     $kq = $this->dsncc->nhacungcap_del($mncc);
            // if($kq){
            //     echo "<script> alert('Xóa thành công!')</script>";
            // }
            // else{
            //     echo "<script> alert('Xóa thất bại!')</script>";
            // }
            // $this->view('MasterLayout',[
            //     'page'=>'DanhSach_NhaCungCap',
            //     'dulieu'=>$this->dsncc->nhacungcap_find('', '')   
            // ]);
            // }
            // else{
            //     echo "<script> alert('Không thể xóa')</script>";
            // }

            // $this->view('MasterLayout',[
            //     'page'=>'DanhSach_NhaCungCap',
            //     'dulieu'=>$this->dsncc->nhacungcap_find('', '')   
            // ]);

        }

        //Sửa
        function sua($mncc){
            $this->view('MasterLayout',[
                'page'=>'Sua_NhaCungCap',
                // 'dulieu'=>$this->dsncc->nhacungcap_find($mncc, '')
                'dulieu'=>$this->dsncc-> nhacungcap_sel_upd($mncc)
            ]);
        }

        function suadl(){
            if(isset($_POST['btnSua'])){
                $mncc = $_POST['txtMaNCC'] ;
                $tenncc = $_POST['txtTenNCC'];
                $dc = $_POST['txtDCNCC'];
                $sdt = $_POST['txtSDT'];
                $email = $_POST['txtEmail'];
            
            $kq = $this->dsncc->nhacungcap_upd($mncc, $tenncc, $dc, $sdt, $email);
            if ($kq) {
                echo "<script> alert('Sửa thành công!')</script>";

            } else {
                echo "<script> alert('Sửa thất bại!')</script>";
            }

            $this->view('MasterLayout',[
                'page'=>'DanhSach_NhaCungCap',
                'dulieu'=>$this->dsncc->nhacungcap_find('', '') 
            ]);

            }


            if(isset($_POST['btnHuy'])){
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_NhaCungCap',
                    'dulieu'=>$this->dsncc->nhacungcap_find('', '') 
                ]);
            }
        }

        function timkiem(){
            if(isset($_POST['btnSearch'])){
                $mncc=$_POST['txtMaNCC'];
                $tenncc = $_POST['txtTenNCC'];
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_NhaCungCap',
                    'dulieu'=>$this->dsncc->nhacungcap_find($mncc, $tenncc),
                    'maNCC'=>$mncc,
                    'tenNCC'=>$tenncc
                ]);
            }
        }


    }

?>