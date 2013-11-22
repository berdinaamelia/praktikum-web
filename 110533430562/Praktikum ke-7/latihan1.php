<!DOCTYPE HTML>
<html>
<head>
	<title> Pencarian Data</title>
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
 <?php
      $conn=mysql_connect("localhost","root","") or die ("Gagal Menyambung ke server");
      mysql_select_db("prakweb") or die ("Gagal membuka database");
    ?>

  <!-- Script untuk membuat tabel dengan nama data-->
  <!-- Script tabel untuk menampilkan data siswa-->
  <div class="container">
  	
    <h2> Data Mahasiswa</h2>
    <form action="cari.php" method="get">
	 	<p align="right">
	  	<input type="text" name="nama" class="input-medium search-query" placeholder="Masukkan kata kunci" value="<?php echo isset ($_POST['nama']) ? $_POST ['nama']: '';?>"/>
			<button type="submit" class="btn">Cari</button>
      <!-- Latihan Kecil menambahkan pre filling text-->

	  </p>
    </form>
    <form action="tambah.php">
      <table class="table table-striped">
    <tr>
      <th> No</th>
      <th> NIM </th>
      <th> Nama </th>
      <th> Alamat </th>
      <th colspan="3"> Aksi </th>
    </tr>

    <?php
    $query="select * from mahasiswa";
    $result=mysql_query($query,$conn);
    while ($buff=mysql_fetch_array($result)){
    ?>
    
    <tr>
      <td> <?php echo $buff ['no']; ?> </td>
      <td> <?php echo $buff ['nim']; ?> </td>
      <td> <?php echo $buff ['nama']; ?> </td>
      <td> <?php echo $buff ['alamat']; ?> </td>
      <td> <a href="edit.php?nim=<?php echo $buff ['nim'];?>"> Edit </a></td>
      <td> <a href="hapus.php?nim=<?php echo $buff ['nim'];?>"> Hapus </a></td>
    </tr>
    <?php
    }
    mysql_close($conn);
    ?>
  </table>
  
 <div class="controls" align="right">
  <input class="btn btn-primary" type="submit" value="Tambah Data" >
 </div>
  </form>
  </div>
</body>
</html>