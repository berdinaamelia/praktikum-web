<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml : lang="en" lang="en">
<head>
	<title>Data Seleksi</title>
</head>

<body>
	<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
	Pekerjaan
	<select name="job">
		<option value="Mahasiswa"> Mahasiswa
		<option value="ABRI"> ABRI
		<option value="PNS"> PNS
		<option value="Swasta"> Swasta
	</select> <br/>
	
	<input type="submit" value="ok"/>
	</form>

	<?php
	if(isset($_POST['job'])){
		echo $_POST['job'];
	}
	?>
	
</body>
</html>