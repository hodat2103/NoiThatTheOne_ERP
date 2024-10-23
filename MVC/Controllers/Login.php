<?php
class Login extends controller {
    public $dn;

    function __construct() {
        // Initialize the model
        $this->dn = $this->model('LoginModel');
    }

    function Get_data() {
        // Render the login view
        $this->view('LoginView', []);
    }

    function checkdangnhap() {
        if (isset($_POST['btnDangnhap'])) {
            // Sanitize user input
            $user = trim($_POST['txtDN']);
            $pass = trim($_POST['txtPW']);

            // Check login credentials
            $kq = $this->dn->Check_dangnhap($user, $pass);
            
            if (!$kq) {
                // Invalid login, show error message
                $this->view('LoginView', [
                    'thongbao' => 'Tên đăng nhập hoặc mật khẩu không đúng!'
                ]);
            } else {
                // Credentials are correct, now check user role
                $role = $this->dn->Check_role($user);
                
                if ($role === 'user') {
                    // Redirect to customer homepage
                    $_SESSION['user'] = $user;
                    echo '<script>alert("Chào mừng bạn đến với trang Website The One"); window.location.href = "http://localhost/BHSTHI/TrangChu_KhachHang";</script>';
                } elseif ($role === 'admin'){
                    $_SESSION['admin'] = $user;
                    echo '<script>alert("Chào mừng bạn đến với trang Admin"); window.location.href = "http://localhost/BHSTHI/SanPham_DanhSach";</script>';                }
            }
        }
    }
}
?>
