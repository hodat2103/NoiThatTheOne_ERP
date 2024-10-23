<?php

class NhaCungCap_Them extends controller{
    protected $ncc;

    function __construct(){
        $this->ncc=$this->model('qlnhacungcap');
    }

    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'Them_NhaCungCap',
            'mncc'=>'',
            'tenncc'=>'',
            'dc'=>'',
            'sdt'=>'',
            'email'=>''
        ]);
    }

    function themmoi(){
        if(isset($_POST['btnLuu'])){
            //Lấy dữ liệu trên các control của form
            $mncc = $_POST['txtMaNCC'];
            $tenncc = $_POST['txtTenNCC'];
            $dc = $_POST['txtDCNCC'];
            $sdt = $_POST['txtSDT'];
            $email = $_POST['txtEmail'];

            //Kiểm tra nhập đầy đủ thông tin
            if($mncc == '' || $tenncc == '' || $dc == '' || $sdt == '' || $email == ''){
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
            
            //Kiểm tra trùng id
           else{
            $chkid = $this->ncc->checksameid($mncc);
            if($chkid){
                echo "<script> alert('Trùng mã nhà cung cấp!')</script>";
            }
            else{
                $kq = $this->ncc->nhacungcap_ins($mncc, $tenncc, $dc, $sdt, $email);

                if($kq){
                    echo "<script> alert('Thêm mới thành công'); </script>"; 
                    echo "<script> window.location.href= ' http://localhost/BHSTHI/NhaCungCap_DanhSach'</script>";              
                }

                else{
                    echo "<script> alert('Thêm mới thất bại'); </script>";
                }

            }
           }
        }

        $this->view('MasterLayout', [
            'page' => 'Them_NhaCungCap',
            'mncc'=> $mncc,
            'tenncc'=>$tenncc,
            'dc'=>$dc,
            'sdt'=>$sdt,
            'email'=>$email
        ]);


    }
}
