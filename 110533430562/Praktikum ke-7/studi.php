<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Paging Data</title>
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
</head>

<body>
	<div class="container">
		<p>
			<h2> Data Mahasiswa</h2>

		</p>

	<?php
	// Script untuk paging
	require_once 'koneksi.php';
	//***************** Setup paging

	// Variabel baris untuk limitasi data
	$row=$_POST ['row_page'];

	$sql = 'SELECT * FROM mahasiswa LIMIT 5';
	$res=mysql_query($sql);
	$self = $_SERVER['PHP_SELF'];
	$page = isset($_GET['page']) ? $_GET['page'] : 0;
	// Jumlah link counter, misal (prev 1 2 3 next) = 3
	$link_num = 5;
	// Jumlah record per halaman
	$record_num = 5;
	// Item pertama yang akan ditampilkan
	$offset = $page ? ($page - 1) * $record_num : 0;
	$total_rows = mysql_num_rows(mysql_query($sql));
	$query = $sql. ' LIMIT ' . $offset . ', ' . $record_num;
	$result = mysql_query($query);
	$max_page = ceil($total_rows/$record_num);
	// Reset jika page tidak sesuai
	if ($page > $max_page || $page <= 0) {
		$page = 1;
	}
	//***************** Generate paging
	$paging = '';
	if($max_page > 1) {
		//*** Render link previous
		if ($page > 1) {
		$paging .= ' <a href="'.$self.'?page='.($page-1).'">previous</a>
		';
		} else {
			$paging .= ' previous ';
	}
	

	//*** Render link counter halaman
	for ($counter = 1; $counter <= $max_page; $counter += $link_num) 
	{
		if ($page >= $counter) 
		{
			$start = $counter;
		}
	}

	if ($max_page > $link_num) 
	{
		$end = $start + $link_num;
		if ($end > $max_page) 
		{
			$end = $max_page + 1;
		}
	} else 
		{
			$end = $max_page;
		}

// Perulangan 		
	for ($counter = $start; $counter < $end; $counter++) 
	{
		if ($counter == $page) 
		{
			$paging .= $counter;
		} else 
		{
			$paging .= ' <a href="'.$self.'?page='.$counter.'">' .$counter.'</a> ';
		}
	}
	

	//*** Render link next
	if ($page < $max_page) 
	{
			$paging.= ' <a href="' .$self.'?page='.($page+1).'">next</a> ';
	} else 
		{
					$paging.= ' next ';
		}
	}
	$res= mysql_query($sql);
	if($res){
		if (mysql_num_rows($res)) {
			
			?>

		}
	}

	

	<!-- Menampilkan tabel -->

	<table cellspacing=1 cellpadding=5 class="table table-striped">
		<tr>
			<th>No</th>
			<th width=100>NIM</th>
			<th width=150>Nama</th>
			<th>Alamat</th>
		</tr>
		<?php
			$i = 1;
			while ($row = mysql_fetch_row($result)) { 

				?>
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
	<?php
	//***************** Tampilkan navigasi
		echo $paging;
	?>
	</div>
</body>
</html>