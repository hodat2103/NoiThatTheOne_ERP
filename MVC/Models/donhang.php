<?php

class donhang extends connectDB
{
    //Thêm
    function donhang_ins($mkh, $ptgh,$ttgh, $mnv, $pttt,$kh, $tongtien)
    {
        $sql = "INSERT INTO hoadon (maKH, phuongThucGiaoHang, trangThaiGiaoHang, maNV, phuongThucThanhToan, kichHoat, tongTien) VALUES ('$mkh', '$ptgh', '$ttgh',$mnv,$pttt,$kh,$tongtien)";
        return mysqli_query($this->con, $sql);
    }

    //Danh sách và tìm kiếm
    function donhang_find($mdh)
    {
        $sql = "SELECT * FROM donhang WHERE maDH like '%$mdh%'";
        return mysqli_query($this->con, $sql);
    }
    //Xóa
    function donhang_del($mdh)
    {
        $sql = "DELETE FROM donhang WHERE maDH = '$mdh'";
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
