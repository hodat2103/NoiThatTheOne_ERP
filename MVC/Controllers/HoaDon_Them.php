<?php

class HoaDon_Them extends controller{
    protected $hd;

    function __construct(){
        $this->hd = $this->model('hoadon');
    }

    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'DanhSach_SanPham',
            'mkh'=>'',
            'msp'=>'',
            'tien'=>''

        ]);
    }

    function themmoi(){
        if(isset($_POST['btnThanhToan'])){
            //Lấy dữ liệu trên các control của form
            $mkh = $_POST['txtMaKH'];
            $msp = $_POST['txtMaSP'];
            $tien = $_POST['txtTien'];
            

            //Kiểm tra nhập đầy đủ thông tin
            // if($mkm == '' || $tenkm == '' || $ud == ''){
            //     echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            // }
            
            //Kiểm tra trùng id
            // else{
            //     $chkid = $this->km->checksameid($mkm);
            //     if($chkid){
            //         echo "<script> alert('Trùng mã khuyến mãi!')</script>";
            //     }
            //     else{
                $kq = $this->hd->hoadon_ins($mkh,$msp, $tien);
                $_SESSION['cart'] = array();


                    if($kq){
                        // echo "<script> alert('Thanh toán thành công'); </script>"; 
                        // echo "<script> window.location.href= ' http://localhost/BHST/HoaDon_Them'</script>";
                        echo '<script>alert("Thanh toán thành công"); window.location.href = "http://localhost/BHSTHI/HoaDon_DanhSach";</script>';           
                    }

                    else{
                        echo "<script> alert('Thêm mới thất bại'); </script>";
                    }
                // }
            // }
        }
    }
}
