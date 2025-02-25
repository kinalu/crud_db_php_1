<?php
    include_once("config.php");
    if(isset($_POST['register'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $data = mysqli_query($mysqli, "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN WEBSITE</title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <div class="wrapper">
            <form action="register.php" method="POST" name="form-register">
            <h2>Register</h2>
                <div class="input-field">
                    <input type="text" name="nama" required>
                    <label>Enter your name</label>
                </div>
                <div class="input-field">
                    <input type="text" name="email" required>
                    <label>Enter your email</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Enter your password</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Confirm your password</label>
                </div>
                <div class="forget">
                    <label for="remember">
                    <input type="checkbox" id="remember">
                    <p>Remember me</p>
                    </label>
                </div>
                <input type="submit" name="register" value="Register" onCLick="alert('akun berhasil dibuat')"
                style = 
                " background: #fff;
                color: #000;
                font-weight: 600;
                border: none;
                padding: 12px 20px;
                cursor: pointer;
                border-radius: 3px;
                font-size: 16px;
                border: 2px solid transparent;
                transition: 0.3s ease;"
                >
                <div class="register">
                    <p><a href="login.php">I Have Account</a></p>
                </div>
            </form>
        </div>
    </body>
</html>