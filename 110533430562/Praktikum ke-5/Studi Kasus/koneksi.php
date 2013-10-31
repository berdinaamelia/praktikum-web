<?php
	// Catatan:
	// Jika perlu, sesuaikan nama user dan password
	$host = 'localhost';
	$user = 'root';
	$pass = '071292';
	$db = 'test';
	$cnn = mysql_connect($host, $user, $pass);
	if (!$cnn) 
	{
		exit('Koneksi Gagal');
	}
	$db = mysql_select_db($db);
	if (!$db) 
	{
		exit('Gagal Memilih Database');
	}
?>