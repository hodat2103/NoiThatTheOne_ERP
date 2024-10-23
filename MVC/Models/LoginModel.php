<?php
class LoginModel extends connectDB {
    // Check username and password
    public function Check_dangnhap($user, $pass) {
        // Use prepared statement to prevent SQL injection
        $stmt = $this->con->prepare("SELECT * FROM dangnhap WHERE user=? AND pass=?");
        $stmt->bind_param('ss', $user, $pass);  // 'ss' means both parameters are strings
        $stmt->execute();
        $result = $stmt->get_result();
        $kq = false;
        
        // Check if any result exists
        if ($result->num_rows > 0) {
            $kq = true;
        }

        // Free result and close statement
        $stmt->close();
        return $kq;
    }

    // Check the role of the user
    public function Check_role($user) {
        // Use prepared statement to prevent SQL injection
        $stmt = $this->con->prepare("SELECT role FROM dangnhap WHERE user=?");
        $stmt->bind_param('s', $user);  // 's' means it's a string
        $stmt->execute();
        $result = $stmt->get_result();
        $role = null;

        // Fetch the role from the result
        if ($row = $result->fetch_assoc()) {
            $role = $row['role'];  // Fetch 'role' field
        }

        // Free result and close statement
        $stmt->close();
        return $role;
    }
}
?>
