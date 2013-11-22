<?php

require_once 'conn.php';

$username=$_GET("kata");
$sql= mysql_query("select * from anggota where username='$username'");
$jumlah=mysql_num_rows($sql);
if ($jumlah=="0") {
	echo "username tersedia, boleh digunakan";
}else{
	echo "Username: $username telah dipakai, gunakan yang lain. ";
}
?>