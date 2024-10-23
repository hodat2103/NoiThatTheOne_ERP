<?php

class qlkhachhang extends connectDB{
    //Thêm
    function khachhang_ins($mkh, $tenkh, $sdt, $gt)
    {
        $sql = "INSERT INTO qlkhachhang VALUES ('$mkh', '$tenkh', '$sdt', '$gt')";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra trùng id
    function checksameid($mkh){
        $sql = "SELECT * FROM qlkhachhang WHERE maKH = '$mkh'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false; //Không trùng mã loại
        if(mysqli_num_rows($dt) > 0){
            $kq = true;
        }
        return $kq; //Trùng mã loại
    }

    //Danh sách và tìm kiếm
    function khachhang_find($mkh, $tenkh){
        $sql = "SELECT * FROM qlkhachhang WHERE maKH like '%$mkh%' AND tenKH like '%$tenkh%'";
        return mysqli_query($this->con, $sql);
    }

     //Kiểm tra khóa ngoại
     function checkForeignKey($mkh)
     {
         $sql = "SELECT * FROM hoadon WHERE maKH = '$mkh'";
         $result = mysqli_query($this->con, $sql);
         return mysqli_num_rows($result) > 0;
     }

    //Xóa
    function khachhang_del($mkh){
        $sql = "DELETE FROM qlkhachhang WHERE maKH = '$mkh'";
        return mysqli_query($this->con, $sql);
    }

    //Sửa
    function khachhang_sel_upd($mkh){
        $sql = "SELECT * FROM qlkhachhang WHERE maKH = '$mkh'";
        return mysqli_query($this->con, $sql);
    }

    function khachhang_upd($mkh, $tenkh, $sdt, $gt){
        $sql = "UPDATE qlkhachhang SET tenKH ='$tenkh', sdtKH ='$sdt', gioiTinhKH ='$gt' WHERE maKH = '$mkh'";
        return mysqli_query($this->con, $sql);
    }
}
