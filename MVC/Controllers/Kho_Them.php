<?php

class Kho_Them extends controller{
    protected $km;

    function __construct(){
        $this->km=$this->model('qlkho');
    }

    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'Them_Kho',
            'mk'=>'',
            'tenkho'=>'',
            'maNV'=>''
        ]);
    }

    function themmoi(){
        if(isset($_POST['btnLuu'])){
            //Lấy dữ liệu trên các control của form
            $mk = $_POST['txtMaKho'];
            $tenkho = $_POST['txtTenKho'];
            $maNV = $_POST['txtMaNV'];

            //Kiểm tra nhập đầy đủ thông tin
            if($mk == '' || $tenkho == '' || $maNV == ''){
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
            
            //Kiểm tra trùng id
           else{
            $chkid = $this->km->checksameid($mk);
            if($chkid){
                echo "<script> alert('Trùng mã kho!')</script>";
            }
            else{
                $kq = $this->km->Kho_ins($mk, $tenkho, $maNV);

                if($kq){
                    echo "<script> alert('Thêm mới thành công'); </script>"; 
                    echo "<script> window.location.href= ' http://localhost/BHSTHI/Kho_DanhSach'</script>";              
                }

                else{
                    echo "<script> alert('Thêm mới thất bại'); </script>";
                }

            }
           }
        }

        $this->view('MasterLayout', [
            'page' => 'Them_Kho',
            'mk'=>$mk,
            'tenkho'=>$tenkho,
            'maNV'=>$maNV
        ]);


    }
}
