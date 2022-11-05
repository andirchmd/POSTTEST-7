<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "omori";
$db = mysqli_connect($hostname,$username,$password,$database);
if(!$db){
  echo "koneksi tidak terhubung";
}
?>