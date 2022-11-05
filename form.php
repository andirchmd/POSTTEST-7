<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Joki</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
<div class="containerform black-back">  
  <form id="daftar" action="tambah.php" method="post" enctype="multipart/form-data">
    <h3>Form Pendaftaran Joki</h3>
    <fieldset>
      <input placeholder="Nama" type="text" tabindex="1" name="nama" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Email" type="email" tabindex="2" name="email" required>
    </fieldset>
    <fieldset>
      <input placeholder="Nomor Telepon" type="tel" name="nomor_hp" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Masukkan Nama Game" type="text" name="nama_game" tabindex="4" required>
    </fieldset>
    <fieldset>
      <input placeholder="Masukkan File" type="file" name="file_game" tabindex="5" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Keterangan Joki..." type="text" name="keterangan" tabindex="6" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="daftar-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>
<footer class="footer">&copy; Copyright 2022 Omori Project - by Andi</footer>
</body>

</html>