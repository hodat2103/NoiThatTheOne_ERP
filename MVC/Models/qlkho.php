<?php

class qlkho extends connectDB{
    //Thêm
    function kho_ins($mk, $tenkho, $maNV)
    {
        $sql = "INSERT INTO qlkho VALUES ('$mk', '$tenkho', '$maNV')";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra trùng id
    function checksameid($mk){
        $sql = "SELECT * FROM qlkho WHERE maKho = '$mk'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false; //Không trùng mã loại
        if(mysqli_num_rows($dt) > 0){
            $kq = true;
        }
        return $kq; //Trùng mã loại
    }

    //Danh sách và tìm kiếm
    function kho_find($mk, $tenkho){
        $sql = "SELECT * FROM qlkho WHERE maKho like '%$mk%' AND tenkho like '%$tenkho%'";
        return mysqli_query($this->con, $sql);
    }


    //Kiểm tra khóa ngoại
    function checkForeignKey($mk){
        $sql = "SELECT * FROM qlsanpham WHERE maKho = '$mk'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_num_rows($result) > 0;
    }

    //Xóa
    function kho_del($mk){
        $sql = "DELETE FROM qlkho WHERE maKho = '$mk'";
        return mysqli_query($this->con, $sql);
    }

    //Sửa
    function kho_sel_upd($mk){
        $sql = "SELECT * FROM qlkho WHERE maKho = '$mk'";
        return mysqli_query($this->con, $sql);
    }

    function kho_upd($mk, $tenkho, $maNV){
        $sql = "UPDATE qlkho SET tenkho ='$tenkho', mamaNV ='$maNV' WHERE maKho = '$mk'";
        return mysqli_query($this->con, $sql);
    }
}

?>