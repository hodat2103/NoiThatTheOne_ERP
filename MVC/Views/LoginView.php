<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('http://localhost/BHSTHI/Public/Images/background.jpg') no-repeat center center fixed; /* Add your background image URL here */
            background-size: cover; /* Ensures the image covers the entire background */
            margin: 0;
            padding: 0;
            height: 100vh; /* Full viewport height */
        }

        .main {
            background-color: rgba(255, 255, 255, 0.9); /* Slight transparency for the background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 50px auto;
            max-width: 400px;
        }

        .main h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333; /* Dark text color for better contrast */
        }

        .login-button {
            text-align: center;
        }

        .login-button button {
            width: 100%;
            padding: 10px;
            background-color: pink;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition */
        }

        .login-button button:hover {
            background-color: #ff6b6b;
        }

        .error-message {
            text-align: center;
            color: red;
            margin-top: 10px;
        }

        .social-icons img {
            width: 50px;
            margin: 0 5px;
        }

        .footer-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        @media (max-width: 576px) {
            .main {
                margin: 20px; /* Reduce margin on small screens */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main">
            <h1>Đăng nhập</h1>
            <form method="post" action="http://localhost/BHSTHI/Login/checkdangnhap">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tên đăng nhập" name="txtDN" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="txtPW" required>
                </div>
                <div class="login-button">
                    <button class="btn btn-primary" name="btnDangnhap" type="submit">Đăng nhập</button>
                </div>
                <div class="error-message">
                    <?php if (isset($data['thongbao'])) echo $data['thongbao']; ?>
                </div>
            </form>
            <div class="text-center mt-2">
                <a href="/backend/site/forgot">Quên mật khẩu?</a>
            </div>
            <div class="text-center mt-3 social-icons">
                <img src="http://localhost/BHSTHI/Public/Images/facebook.png" alt="FACEBOOK">
                <img src="http://localhost/BHSTHI/Public/Images/instagram.jfif" alt="INSTAGRAM">
                <img src="http://localhost/BHSTHI/Public/Images/twitter.jfif" alt="TWITTER">
            </div>
            <div class="footer-message">
                *Vui lòng liên hệ Hotline: 0387586203 để sử dụng tính năng chuỗi cửa hàng
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
