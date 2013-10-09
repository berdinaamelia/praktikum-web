<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml : lang="en" lang="en">
<head>
	<title>Identifikasi Metode</title>
</head>

<body>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
	Jenis Kelamin
	<input type= "radio" name="sex" value="Pria" checked
	<?php
		if($_POST['sex'] == 'Pria'){
			echo 'checked="checked" ';
		}
	?>
	/> Pria
	
	<input type="radio" name="sex" value="Wanita"
	<?php
		if($_POST['sex'] == 'Wanita'){
			echo 'checked="checked" ';
		}
	?>
	/> Wanita <br/>
	
	<input type="submit" value="ok"/>
</form>
<?php
if(isset($_POST['sex'])){
	echo $_POST['sex'];
}
?>

</body>
</html>