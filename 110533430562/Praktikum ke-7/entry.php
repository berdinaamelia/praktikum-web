<?php



  $nim  = $_POST['nim'];
  $nama  = $_POST['nama'];
  $alamat =$_POST['alamat'];

  $query=mysql_query("INSERT INTO mahasiswa VALUES ('$nim,'$nama','$alamat')");
  //echo "Data Telah Disimpan <br>  <a href="index.php"> Kembali </a>";
?>