<?php
    require "config.php";
    ob_start();
    session_start();
    ob_end_clean();
    if(isset($_SESSION["username"])){
        echo header("location:tampil.php");
    }else{

  if(isset($_POST['submit'])){     

  $user = $_POST['user'];
  $password = $_POST['password'];
  $query = mysqli_query($db,"SELECT * FROM users WHERE username = '$user' OR email ='$user'");
  $result = mysqli_fetch_assoc($query);
  $username = $result['username'];
  if(password_verify($password,$result['password'])){
    $_SESSION['username']=$username;
    echo " <script>
        alert('selamat datang $username');
        document.location.href='tampil.php';
    </script>";
} else {  
    echo " <script>
       alert('username dan password salah');
       document.location.href='login.php';
       </script>";
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
    <title>Login</title>
</head>
<body>
    <div class="container login">
        <div class="form-login">
            <h3>Login</h3>
            <form action="" method="post">
                <input type="text" name="user" placeholder="email atau username" class="input">
                <input type="password" name="password" placeholder="password" class="input">
                <input type="submit" name="submit" value="Login" class="submit"><br><br>
            </form>

            <p>Belum punya akun?
                <a href="register.php">Register</a>
            </p>
        </div>
    </div>
</body>
</html>