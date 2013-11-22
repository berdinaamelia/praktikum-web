<!DOCTYPE HTML>
<html>
<head>
	<title> Sorting Data</title>
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

	<h1>Data Mahasiswa</h1>
	  <form action="cari.php" method="get">
	  		<p align="right">
	  	<input type="text" name="nama" class="input-medium search-query" placeholder="Masukkan kata kunci" value="<?php echo isset ($_POST['nama']) ? $_POST ['nama']: '';?>"/>
			<button type="submit" class="btn">Cari</button>
      <!-- Latihan Kecil menambahkan pre filling text-->

	  </p>
	</form>
	<table class="table table-striped" >
		<tr>
			<th><a href="<?php $_SERVER['PHP_SELF']?>?by=nim">NIM</a></th>
			<th><a href="<?php $_SERVER['PHP_SELF']?>?by=nama">Nama Mahasiswa</a></th>
			<th><a href="<?php $_SERVER['PHP_SELF']?>?by=alamat">Alamat</a></th>
	<?php
		error_reporting(0);
		// koneksi ke mysql
		mysql_connect("localhost", "root", "");
		mysql_select_db("prakweb");

		// jika yang diklik kolom NIM
		if ($_GET['by'] == "nim") $orderBy = "nim";
		// jika yang diklik kolom NAMA MHS
		else if ($_GET['by'] == "nama") $orderBy = "nama";
		// jika yang diklik kolom ALAMAT
		else if ($_GET['by'] == "alamat") $orderBy = "alamat";
		// jika yang diklik kolom JENIS KELAMIN
		else $orderBy = "nim";
		 
		// query untuk menampilkan data berdasarkan field yang terurut
		// sesuai pilihan di atas
		$query = "SELECT * FROM mahasiswa ORDER BY ".$orderBy;
		$hasil = mysql_query($query);
		while ($data = mysql_fetch_array($hasil))
		{
		// tampilkan data
		echo "<tr><td>".$data['nim']."</td><td>".$data['nama']."</td><td>".$data['alamat']."</td></tr>";
		}

	?>
</tr>
	</table>

</div>
</body>

</html>