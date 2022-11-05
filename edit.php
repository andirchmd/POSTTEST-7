<?php
require "config.php";

ob_start();
session_start();
ob_end_clean();
if(isset($_SESSION["username"])){
}else{
    echo header("location:index.php");
}
$username = $_SESSION["username"];

if(isset($_GET['id'])){
    $query = mysqli_query($db, "SELECT * FROM member WHERE id=$_GET[id]");
    $queryfile = mysqli_query($db, "SELECT * FROM file_member WHERE id=$_GET[id]");
    $result = mysqli_fetch_array($query);
    $resultfile = mysqli_fetch_array($queryfile);
    $nama = $result['nama'];
    $email = $result['email'];
    $nohp = $result['no_telp'];
    $game = $result['game'];
    $ket = $result['keter'];
    $namafile = $resultfile['nama_file'];
}

if(isset($_POST['submit'])){
  $file_game = $_FILES['file_game']['name'];
  $x = explode('.',$file_game);
  $ekstensi = strtolower(end($x));
  $file_baru = "$nama.$ekstensi";
  $tmp = $_FILES['file_game']['tmp_name'];
  if(move_uploaded_file($tmp, 'img/'.$file_baru)){
    date_default_timezone_set("Asia/Makassar");
    $tanggal = date("Y-m-d H:i:s");
    $result = mysqli_query($db, "UPDATE file_member SET nama_file='$file_baru', waktu_up ='$tanggal' WHERE id='$_GET[id]'");
      $query = mysqli_query($db, "UPDATE member SET nama='$_POST[nama]', email ='$_POST[email]', no_telp ='$_POST[nomor_hp]', game ='$_POST[nama_game]', keter = '$_POST[keterangan]' WHERE id='$_GET[id]'");
      if($query){
          echo "<script>
          alert('Berhasil Diubah');
          document.location.href = 'tampil.php';
        </script>";
      } else {
          echo "<script>
          alert('Gagal Diubah');
          document.location.href = 'tampil.php';
        </script>";
      }
  } else {
    echo error_log ("tambah data error");
  }
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Joki</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
<div class="containerform black-back">  
  <form id="daftar" action="" method="post" enctype="multipart/form-data">
    <h3>Form Pendaftaran Joki</h3>
    <fieldset>
      <input placeholder="Nama" type="text" tabindex="1" name="nama" value='<?=$nama ?>' required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Email" type="email" tabindex="2" name="email" value='<?=$email?>' required>
    </fieldset>
    <fieldset>
      <input placeholder="Nomor Telepon" type="tel" name="nomor_hp" value='<?=$nohp?>' required>
    </fieldset>
    <fieldset>
      <input placeholder="Masukkan Nama Game" type="text" name="nama_game" value='<?=$game?>' required>
    </fieldset>
    <fieldset>
      <input placeholder="Masukkan File" type="file" name="file_game" value='<?=$namafile?>' required>
    </fieldset>
    <fieldset>
      <textarea placeholder="<?=$ket?>" type="text" name="keterangan" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="daftar-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>
<footer class="footer">&copy; Copyright 2022 Omori Project - by Andi</footer>
</body>

</html>