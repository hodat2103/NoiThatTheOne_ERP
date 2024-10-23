<?php

class qlsanpham extends connectDB
{
    //Thêm
    function sanpham_ins($msp, $tensp, $ha, $gsp, $nsx, $sl, $mncc, $mk, $dm)
{
    // Sửa câu lệnh SQL
    $sql = "INSERT INTO qlsanpham (maSP, tenSP, hinhAnh, giaSP, NSX, soLuong, maNCC, maKho, maNSP)
            VALUES ('$msp', '$tensp', '$ha', '$gsp', '$nsx', '$sl', '$mncc', '$mk', '$dm')";
    
    // Thực thi câu lệnh SQL
    return mysqli_query($this->con, $sql);
}

    //Kiểm tra trùng id
    function checksameid($msp)
    {
        $sql = "SELECT * FROM qlsanpham WHERE maSP = '$msp'";
        $dt = mysqli_query($this->con, $sql);
        $kq = false; //Không trùng mã loại
        if (mysqli_num_rows($dt) > 0) {
            $kq = true;
        }
        return $kq; //Trùng mã loại
    }


    //Danh Sách
    // function sanpham_list()
    // {
    //     $sql = "SELECT qlsanpham.*, qlnhomsp.tenNSP 
    //         FROM qlsanpham 
    //         INNER JOIN qlnhomsp ON qlsanpham.maNSP = qlnhomsp.maNSP 
    //         ORDER BY qlsanpham.maSP DESC";

    //     return mysqli_query($this->con, $sql);
    // }
    function sanpham_list()
    {
        $sql = "SELECT * FROM qlsanpham ";
           

        return mysqli_query($this->con, $sql);
    }



    //Danh sách và tìm kiếm
    function sanpham_find($msp, $tensp)
    {
        // $sql = "SELECT * FROM qlsanpham WHERE maSP like '%$msp%' AND tenSP like '%$tensp%'";
        // return mysqli_query($this->con, $sql);

        $sql = "SELECT * FROM qlsanpham 
        WHERE maSP LIKE '%$msp%' AND tenSP LIKE '%$tensp%'
        ORDER BY maSP DESC";
        return mysqli_query($this->con, $sql);
    }

    //Xóa
    function sanpham_del($msp)
    {
        $path = __DIR__ . '/uploads/';

        $sql = "SELECT * FROM qlsanpham WHERE maSP = '$msp' LIMIT 1";
        $dt = mysqli_query($this->con, $sql);

        while ($row = mysqli_fetch_array($dt)) {
            unlink($path . $row['hinhAnh']);
        }

        $sql = "DELETE FROM qlsanpham WHERE maSP = '$msp'";
        return mysqli_query($this->con, $sql);
    }

    //Sửa
    function sanpham_sel_upd($msp)
    {
        $sql = "SELECT * FROM qlsanpham WHERE maSP = '$msp'";
        return mysqli_query($this->con, $sql);
    }

    function sanpham_upd($msp, $tensp, $ha, $gsp, $nsx, $sl, $mncc, $mk, $dm)
    {
        $sql = "UPDATE qlsanpham SET tenSP = '$tensp', hinhAnh = '$ha', giaSP = '$gsp', NSX = '$nsx', soLuong = '$sl', maNCC = '$mncc', maKho = '$mk' , maNSP = '$dm' WHERE maSP = '$msp'";
        return mysqli_query($this->con, $sql);
    }
}
