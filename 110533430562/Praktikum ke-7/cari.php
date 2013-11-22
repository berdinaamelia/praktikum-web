<!-- 
script untuk pencarian
-->
<!DOCTYPE HTML>
<html>
<head>
	<title> Hasil Pencarian Data</title>
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
        height: auto; n
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" href="">
</head>
<?php

if(isset($_GET['nama']))

{
	require_once 'koneksi.php';

	// Kata kunci pencarian
	$key=$_GET['nama'];



	// Variabel $sql berisi pernyataan SQL pencarian
	$sql="SELECT * FROM mahasiswa WHERE nama like '%". $key . "%'";

	$res =mysql_query($sql);
	
	if ($res) {
		$num=mysql_num_rows($res);
	if ($num) {
		?>

	<div class="container"> 
		<div class="alert alert-success">
			<?php
			echo 'Berhasil Ditemukan' . $num . 'rows(s)'; ?>
		</div>	
	<table class="table table-striped" cellspacing=1 cellpadding=5>
	<tr>
	   <th> No</th>
      <th> NIM </th>
      <th> Nama </th>
      <th> Alamat </th>
	</tr>

<?php
	$i=1;
	while ( $row =mysql_fetch_row($res)) {?>
		<tr>
			<td>
				<?php echo $row[0];?>
			</td>
			<td>
				<?php echo $row[1];?>
			</td>
			<td>
				<?php echo $row[2];?>
			</td>
			<td>
				<?php echo $row[3];?>
			</td>
		</tr>
		<?php
		$i++;
	}
		?>
	</table>
	</div>
	<?php
	}
		else{
			echo "Data Tidak Ditemukan";
		}
	}
}
else{
	echo "Masukkan kata kunci pencarian";
}

?>

