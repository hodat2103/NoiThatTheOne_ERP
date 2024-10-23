<?php
    class qlnhanvien extends connectDB{
        function qlnhanvien_ins($mnv, $tennv, $ns, $gt, $dc, $cv, $lnv, $sdt){
        $sql = "INSERT INTO qlnhanvien VALUES ('$mnv', '$tennv', '$ns', '$gt', '$dc', '$cv', '$lnv', '$sdt')";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra trùng mã
    function checktrungmanv($mnv){
        $sql = "SELECT * FROM qlnhanvien WHERE maNV='$mnv'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false;//không trùng mã nhân viên
        if(mysqli_num_rows($dt)>0){
            $kq=true; //Trùng mã nhân viên
        }
        return $kq;
    }

    //Tìm kiếm
    function nhanvien_find($mnv, $tennv){
        $sql = "SELECT * FROM qlnhanvien WHERE maNV like '%$mnv%' and tenNV like '%$tennv%'";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra khóa ngoại
    // function checkForeignKey($mnv){
    //     $sql = "SELECT * FROM qlbanhang WHERE maNV = '$mnv'";
    //     $result = mysqli_query($this->con, $sql);
    //     return mysqli_num_rows($result) > 0;
    // }

    //Kiểm tra khóa ngoại
    // function checkForeignKey1($mnv){
    //     $sql = "SELECT * FROM qlsanpham WHERE maNV = '$mnv'";
    //     $result = mysqli_query($this->con, $sql);
    //     return mysqli_num_rows($result) > 0;
    // }



    //Xóa
    function nhanvien_del($mnv){
        $sql = "DELETE FROM qlnhanvien WHERE maNV='$mnv'";
        return mysqli_query($this->con, $sql);
    }

    //Sửa
    function nhanvien_sel_del($mnv){
        $sql = "SELECT * FROM qlnhanvien WHERE maNV='$mnv'";
        return mysqli_query($this->con, $sql);
    }

    function nhanvien_upd($mnv, $tennv, $ns, $gt, $dc, $cv, $lnv, $sdt){
        $sql = "UPDATE qlnhanvien SET tenNV='$tennv', ngaySinh='$ns', gioiTinh='$gt', diaChi='$dc', chucVu='$cv', luongNV='$lnv', sdtNV='$sdt' WHERE maNV='$mnv'";
        return mysqli_query($this->con, $sql);
    }
}

?>