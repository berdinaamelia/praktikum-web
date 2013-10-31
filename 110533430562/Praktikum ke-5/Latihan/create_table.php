<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Menciptakan Tabel</title>
</head>
<body>
<?php
	require_once './koneksi.php';
	$sql = 'CREATE TABLE mahasiswa (
			nim VARCHAR(12) NOT NULL,
			nama VARCHAR(40) NOT NULL,
			alamat VARCHAR(100),
			PRIMARY KEY (nim)
			) ENGINE=MyISAM;';
	$res = mysql_query($sql);
	if ($res) 
	{
		echo 'Tabel Created';
		mysql_close($res);
	} 
	else 
	{
		echo mysql_error();
	}
?>
</body>
</html>