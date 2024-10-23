<?php

class qlnhacungcap extends connectDB{
    //Thêm
    function nhacungcap_ins($mncc, $tenncc, $dc, $sdt, $email)
    {
        $sql = "INSERT INTO qlnhacungcap VALUES ('$mncc', '$tenncc', '$dc', '$sdt', '$email')";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra trùng id
    function checksameid($mncc){
        $sql = "SELECT * FROM qlnhacungcap WHERE maNCC = '$mncc'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false; //Không trùng mã loại
        if(mysqli_num_rows($dt) > 0){
            $kq = true;
        }
        return $kq; //Trùng mã loại
    }

    //Danh sách và tìm kiếm
    function nhacungcap_find($mncc, $tenncc){
        $sql = "SELECT * FROM qlnhacungcap WHERE maNCC like '%$mncc%' AND tenNCC like '%$tenncc%'";
        return mysqli_query($this->con, $sql);
    }

    //Kiểm tra khóa ngoại
    function checkForeignKey($mncc){
        $sql = "SELECT * FROM qlsanpham WHERE maNCC = '$mncc'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_num_rows($result) > 0;
    }

    //Xóa
    function nhacungcap_del($mncc){
        $sql = "DELETE FROM qlnhacungcap WHERE maNCC = '$mncc'";
        return mysqli_query($this->con, $sql);
    }

    //Sửa
    function nhacungcap_sel_upd($mncc){
        $sql = "SELECT * FROM qlnhacungcap WHERE maNCC = '$mncc'";
        return mysqli_query($this->con, $sql);
    }

    function nhacungcap_upd($mncc, $tenncc, $dc, $sdt, $email){
        $sql = "UPDATE qlnhacungcap SET tenNCC ='$tenncc', diachiNCC ='$dc', sdtNCC ='$sdt', emailNCC ='$email' WHERE maNCC = '$mncc'";
        return mysqli_query($this->con, $sql);
    }
}

?>