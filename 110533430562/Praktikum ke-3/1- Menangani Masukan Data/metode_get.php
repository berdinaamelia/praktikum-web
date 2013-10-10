<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml : lang="en" lang="en">
<head>
	<title>Metode GET</title>
</head>

<body>
<form action="<?php $_SERVER ['PHP_SELF'];?>" method="get">
Nama <input type="text" name="nama"/> <br/>

<input type="submit" value="OK"/>
</form>

<?php
if(isset($_GET['nama'])){
	echo 'Halo, ' .$_GET['nama'];
}
?>
</body>
</html>