<?php
    require "config.php";
    ob_start();
    session_start();
    ob_end_clean();
    if(isset($_SESSION["username"])){
        echo header("location:tampil.php");
    }else{
    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        $query = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
        if(mysqli_fetch_assoc($query)) {
            echo "
            <script>
                alert('Username Sudah digunakan!');
            </script>";
        } else {
            if($password == $konfirmasi) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = mysqli_query($db, "INSERT INTO users (nama,email,username,password) VALUES('$nama','$email', '$username', '$password')"); 
                if($query) {
                    echo "
                        <script>
                            alert('Register berhasil!');
                            document.location.href='tampil.php';
                    </script>";

                } else {
                    echo "
                        <script>
                            alert('Register gagal!');
                    </script>";
                }
            } else {
                echo "
                <script>
                    alert('Password dan Konfirmasi password anda berbeda!');
                </script>";
            }
        }
    }
    }
?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/log.css">
    <title>Register</title>
</head>
<body>
    <div class="container regis" style="width: 50%">

        <div class="judul">
            <h2>Registrasi</h2>
        </div>
        
        <div class="form">
            <form action="" method="post">
                <label for="nama">Nama</label><br>
                <input type="text" name="nama" class="input" placeholder="Masukkan nama"><br>

                <label for="email">Email</label><br>
                <input type="email" name="email" class="input" placeholder="Masukkan email"><br>

                <label for="username">Username</label><br>
                <input type="text" name="username" class="input" placeholder="Masukkan username"><br>

                <label for="password">Password</label><br>
                <input type="password" name="password" class="input" placeholder="Password"><br>

                <label for="konfirmasi">Konfirmasi Password</label><br>
                <input type="password" name="konfirmasi" class="input" placeholder="Konfirmasi password"><br>

                <input type="submit" style="width: 98%" name="submit" class="submit" value="Registrasi"><br><br>
            </form>

            <p>Sudah punya akun?
                <a href="login.php">Login</a>
            </p>
        
        </div>
    </div>
</body>
</html>