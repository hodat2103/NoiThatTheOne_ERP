<?php

class KhachHang_Them extends controller{
    protected $kh;

    function __construct(){
        $this->kh=$this->model('qlkhachhang');
    }

    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'Them_KhachHang',
            'mkh'=>'',
            'tenkh'=>'',
            'sdt'=>'',
            'gt'=>''
        ]);
    }

    function themmoi(){
        if(isset($_POST['btnLuu'])){
            //Lấy dữ liệu trên các control của form
            $mkh = $_POST['txtMaKH'];
            $tenkh = $_POST['txtTenKH'];
            $sdt = $_POST['txtSDT'];
            $gt = $_POST['txtGioiTinh'];

            //Kiểm tra nhập đầy đủ thông tin
            if($mkh == '' || $tenkh == '' || $sdt == '' || $gt == ''){
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
            
            //Kiểm tra trùng id
           else{
            $chkid = $this->kh->checksameid($mkh);
            if($chkid){
                echo "<script> alert('Trùng mã nhà cung cấp!')</script>";
            }
            else{
                $kq = $this->kh->khachhang_ins($mkh, $tenkh, $sdt, $gt);

                if($kq){
                    echo "<script> alert('Thêm mới thành công'); </script>"; 
                    echo "<script> window.location.href= ' http://localhost/BHSTHI/KhachHang_DanhSach'</script>";              
                }

                else{
                    echo "<script> alert('Thêm mới thất bại'); </script>";
                }

            }
           }
        }

        $this->view('MasterLayout', [
            'page' => 'Them_KhachHang',
            'mkh'=>$mkh,
            'tenkh'=>$tenkh,
            'sdt'=>$sdt,
            'gt'=>$gt
        ]);


    }
}
