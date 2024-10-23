<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    class NhanVien_DanhSach extends controller{
        protected $dsnv;
        function __construct()
        {
            $this->dsnv=$this->model('qlnhanvien');
        }
        function Get_data(){
            $this->view('MasterLayout', [
                'page'=>'DanhSach_NhanVien',
                'dulieu'=>$this->dsnv->nhanvien_find('', '')
            ]);
        }
        function timkiem(){
            if(isset($_POST['btnTimkiem'])){
                $mnv = $_POST['txtMaNV'];
                $tennv = $_POST['txtTenNV'];
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_NhanVien',
                    'dulieu'=>$this->dsnv->nhanvien_find($mnv, $tennv),
                    'mnv'=>$mnv,
                    'tennv'=>$tennv
                ]);
            }
        }
        function xoa($mnv){
            $kq = $this->dsnv->nhanvien_del($mnv);
            if($kq){
                echo "<script> alert('Xóa thành công!')</script>";
            }else{
                echo "<script> alert('Xóa thất bại!')</script>";
            }
            //gọi lại giao diện
            $this->view('MasterLayout',[
                'page'=>'DanhSach_NhanVien',
                'dulieu'=>$this->dsnv->nhanvien_find('', '')
            ]);


            // $hasForeignKey = $this->dsnv->checkForeignKey($mnv);
            // $hasForeignKey1 = $this->dsnv->checkForeignKey1($mnv);

            // if(!$hasForeignKey && !$hasForeignKey1){
            //     $kq = $this->dsnv->nhanvien_del($mnv);
            //     if($kq){
            //         echo "<script> alert('Xóa thành công!')</script>";
            //     }
            //     else{
            //         echo "<script> alert('Xóa thất bại!')</script>";
            //     }
            //     $this->view('MasterLayout',[
            //         'page'=>'DanhSach_NhanVien',
            //         'dulieu'=>$this->dsnv->nhanvien_find('', '')   
            //     ]);
            // }
            // else{
            //     echo "<script> alert('Không thể xóa')</script>";
            // }

            // $this->view('MasterLayout',[
            //     'page'=>'DanhSach_NhanVien',
            //     'dulieu'=>$this->dsnv->nhanvien_find('', '')   
            // ]);
        }
        function sua($mnv){
            $this->view('MasterLayout',[
                'page'=>'Sua_NhanVien',
                'dulieu'=>$this->dsnv-> nhanvien_sel_del($mnv),
                'mnv' =>$mnv
            ]);
        }

        function suadl(){
            if(isset($_POST['btnLuu'])){
                $mnv = $_POST['txtMaNV'];
                $tennv = $_POST['txtTenNV'];
                $ns = $_POST['txtNgaySinh'];
                $gt = $_POST['chkGioiTinh'];
                $dc = $_POST['txtDiaChi'];
                $cv = $_POST['txtChucVu'];
                $lnv = $_POST['txtLuongNV'];
                $sdt = $_POST['txtsdtNV'];

                $kq = $this->dsnv->nhanvien_upd($mnv, $tennv, $ns, $gt, $dc, $cv, $lnv, $sdt);
                if($kq){
                    echo "<script> alert('Sửa thành công!')</script>";
                }else{
                    echo "<script> alert('Sửa thất bại!')</script>";
                }
                 //gọi lại giao diện
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_NhanVien',
                    'dulieu'=>$this->dsnv->nhanvien_find('', '')
                ]);
            }
            if(isset($_POST['btnHuy'])){
                $this->view('MasterLayout',[
                    'page'=>'DanhSach_NhanVien',
                    'dulieu'=>$this->dsnv->nhanvien_find('', '')
                ]);
            }
        }
    }
?>