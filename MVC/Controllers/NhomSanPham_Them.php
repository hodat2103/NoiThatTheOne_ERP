<?php

class NhomSanPham_Them extends controller{
    protected $nsp;

    function __construct(){
        $this->nsp=$this->model('qlnhomsp');
    }

    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'Them_NhomSanPham',
            'mnsp'=>'',
            'tennsp'=>'',
            'tt'=>'', 
        ]);
    }

    function themmoi(){
        if(isset($_POST['btnLuu'])){
            //Lấy dữ liệu trên các control của form
            $mnsp = $_POST['txtMaNSP'];
            $tennsp = $_POST['txtTenNSP'];
            $tt = $_POST['txtTT'];

            //Kiểm tra nhập đầy đủ thông tin
            if($mnsp == '' || $tennsp == '' || $tt == ''){
                echo "<script> alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
            
            //Kiểm tra trùng id
           else{
            $chkid = $this->nsp->checksameid($mnsp);
            if($chkid){
                echo "<script> alert('Trùng mã nhà cung cấp!')</script>";
            }
            else{
                $kq = $this->nsp->nhomsanpham_ins($mnsp, $tennsp, $tt);

                if($kq){
                    echo "<script> alert('Thêm mới thành công'); </script>"; 
                    echo "<script> window.location.href= ' http://localhost/BHSTHI/NhomSanPham_DanhSach'</script>";              
                }

                else{
                    echo "<script> alert('Thêm mới thất bại'); </script>";
                }

            }
           }

        }

        $this->view('MasterLayout', [
            'page' => 'Them_NhomSanPham',
            'mnsp'=>$mnsp,
            'tennsp'=>$tennsp,
            'tt'=>$tt
        ]);


    }
}
