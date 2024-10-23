<?php
    class NhanVien_Them extends controller{
        protected $nv;
        function __construct()
        {
            $this->nv = $this->model('qlnhanvien');
        }

        function Get_data(){
            $this->view('MasterLayout', [
                'page' => 'Them_NhanVien',
                'mnv' => '',
                'tennv' => '',
                'ns' => '',
                'gt' => '',
                'dc' => '',
                'cv' => '',
                'lnv' => '',
                'sdt' => ''
            ]);
        }

        function themmoi(){
            if(isset($_POST['btnLuu'])){
                //Lấy dữ liệu trên các control của form
                $mnv = $_POST['txtMaNV'];
                $tennv = $_POST['txtTenNV'];
                $ns = $_POST['txtNgaySinh'];
                $gt = isset($_POST['chkGioiTinh']) ? $_POST['chkGioiTinh'] : array();
                $dc = $_POST['txtDiaChi'];
                $cv = isset($_POST['txtChucVu']) ? $_POST['txtChucVu'] : array();
                $lnv = $_POST['txtLuongNV'];
                $sdt = $_POST['txtsdtNV'];

                if ($mnv == '' || $tennv == '' || $ns == '' || $gt == '' || $dc == '' || $cv == '' || $lnv == '' || $sdt  == '') {
                    echo "<script> alert('Vui lòng nhập thông tin!')</script>";
                }else{
                    //Kiểm tra trùng mã
                    $cktm = $this->nv->checktrungmanv($mnv);
                    if ($cktm) {
                        echo "<script> alert('Trùng mã nhân viên!')</script>";
                    } else {
                        $kq = $this->nv->qlnhanvien_ins($mnv, $tennv, $ns, $gt, $dc, $cv, $lnv, $sdt);
                        if ($kq) {
                            echo "<script> alert('Thêm thành công!')</script>";
                            echo "<script> window.location.href= ' http://localhost/BHSTHI/NhanVien_DanhSach'</script>";
                        } else {
                            echo "<script> alert('Thêm thất bại!')</script>";
                        }
                    }
                }
            }

                // $this->view('MasterLayout',[
                //     'page'=>'Them_Nhanvien',
                //     'dulieu'=>$this->nhanvien->nhanvien_find('', '')
                // ]);
            //Gọi lại giao diện
            $this->view('MasterLayout', [
                'page' => 'Them_NhanVien',
                'mnv' => $mnv,
                'tennv' => $tennv,
                'ns' => $ns,
                'gt' => $gt,
                'dc' => $dc,
                'cv' => $cv,
                'lnv' => $lnv,
                'sdt' => $sdt
            ]);
        }
    }
?>