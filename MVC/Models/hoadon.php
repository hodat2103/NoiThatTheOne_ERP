<?php

class hoadon extends connectDB
{
    //Thêm
    function hoadon_ins($mkh, $msp, $tien)
    {
        $sql = "INSERT INTO hoadon (maKH, maSP, tien) VALUES ('$mkh', '$msp', '$tien')";
        return mysqli_query($this->con, $sql);
    }

    //Danh sách và tìm kiếm
    function hoadon_find($mhd)
    {
        $sql = "SELECT * FROM hoadon WHERE maHD like '%$mhd%'";
        return mysqli_query($this->con, $sql);
    }
    //Xóa
    function hoadon_del($mhd)
    {
        $sql = "DELETE FROM hoadon WHERE maHD = '$mhd'";
        return mysqli_query($this->con, $sql);
    }
    //Sửa
    // function hoadon_sel_upd($mhd)
    // {
    //     $sql = "SELECT * FROM hoadon WHERE maHD = '$mhd'";
    //     return mysqli_query($this->con, $sql);
    // }

    // function hoadon_upd($mhd, $mkh, $msp, $tien)
    // {
    //     $sql = "UPDATE hoadon SET maKH ='$mkh', maSP ='$msp', tien = '$tien' WHERE maHD = '$mhd'";
    //     return mysqli_query($this->con, $sql);
    // }
}
