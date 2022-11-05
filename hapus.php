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
$id = $_GET["id"];
$query = mysqli_query($db, "SELECT * FROM file_member WHERE id=$id");
$hasil = mysqli_fetch_array($query);
$filename = $hasil['nama_file']; 
unlink("img/".$filename); 

$result = mysqli_query($db, "DELETE FROM member WHERE id = $id");
$resultfile = mysqli_query($db, "DELETE FROM file_member WHERE id = $id");

if($result && $resultfile){
  echo "<script>
  alert('Berhasil Dihapus');
  document.location.href = 'tampil.php';
</script>";
} else{
  echo "<script>
  alert('Data Gagal Dihapus');
  document.location.href = 'tampil.php';
</script>";
}