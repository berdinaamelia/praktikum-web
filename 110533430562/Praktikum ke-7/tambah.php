<?php
  error_reporting(0);
  $query=mysql_query("SELECT * FROM mahasiswa
  WHERE
  nim='$_SESSION[nim]'");
  $buff =mysql_fetch_array($query);
?>

<?php
session_start();
include "koneksi.php";

if(isset($_REQUEST["submit"])){
  $nim    = $_POST['nim'];
  $nama     = $_POST['nama'];
  $alamat    = $_POST['alamat'];
 
    if(!empty($nim))
    {
      if(!mysql_query("INSERT INTO mahasiswa (nim,nama,alamat) VALUES ('$nim','$nama','$alamat')"))
      {
        echo "Data Telah Disimpan";
      }
    }
    else
    {
      echo "Input salah";
    }
?>  
<!DOCTYPE HTML>
<head>
    <title>Tambah Data </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" href="">
</head>
<body>
   <div class="container">
      <form class="form-signin" action="">
        <legend>Tambah Data</legend>
          <label class="control-label" for="inputNim">NIM</label>
            <input type="text" name="nim" id="inputNim" class="input-block-level">
          <label class="control-group" for="nama"> Nama Lengkap</label>
          <input type="text" name="nama" id="nama" class="input-block-level">
          <label class="control-group" for="alamat"> Alamat Lengkap</label>
          <textarea rows="3" value="alamat" id="alamat" placeholder="Alamat Lengkap"> </textarea>
          <br> <br>
          <button class="btn btn-primary" name="submit" type="button">Submit</button>       
          <button class="btn btn-primary" type="button" onClick="self.history.back()">Cancel</button>       
      </form>
    </div>
</body>
</html>