<?php

class qlnhomsp extends connectDB
{
    //Thêm
    function nhomsanpham_ins($mnsp, $tennsp, $tt)
    {
        $sql = "INSERT INTO qlnhomsp VALUES ('$mnsp','$tennsp', '$tt')";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra trùng id
    function checksameid($mnsp)
    {
        $sql = "SELECT * FROM qlnhomsp WHERE maNSP = '$mnsp'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false; //Không trùng mã loại
        if (mysqli_num_rows($dt) > 0) {
            $kq = true;
        }
        return $kq; //Trùng mã loại
    }

    //Danh sách và tìm kiếm
    function nhomsanpham_find($mnsp, $tennsp)
    {
        $sql = "SELECT * FROM qlnhomsp WHERE maNSP like '%$mnsp%' AND tenNSP like '%$tennsp%'";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra khóa ngoại
    function checkForeignKey($mnsp)
    {
        $sql = "SELECT * FROM qlsanpham WHERE maNSP = '$mnsp'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_num_rows($result) > 0;
    }

    //Xóa
    function nhomsanpham_del($mnsp)
    {
        $sql = "DELETE FROM qlnhomsp WHERE maNSP = '$mnsp'";
        return mysqli_query($this->con, $sql);
    }

    //Sửa
    function nhomsanpham_sel_upd($mnsp)
    {
        $sql = "SELECT * FROM qlnhomsp WHERE maNSP = '$mnsp'";
        return mysqli_query($this->con, $sql);
    }

    function nhomsanpham_upd($mnsp, $tennsp, $tt)
    {
        $sql = "UPDATE qlnhomsp SET tenNSP = '$tennsp', thuTu = '$tt' WHERE maNSP = '$mnsp'";
        return mysqli_query($this->con, $sql);
    }
}
