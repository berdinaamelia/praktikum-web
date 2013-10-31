<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Menciptakan Database</title>
</head>

<body>
<?php
	require_once './koneksi.php';
	$db = 'myweb';
	$res = mysql_query('CREATE DATABASE ' . $db);
	if ($res) 
	{
		echo 'Database ' .$db. ' Created';
		mysql_close($res);
	} 
	else 
	{
		echo mysql_error();
	}
?>
</body>
</html>