<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml : lang="en" lang="en">
<head>
	<title>Data Seleksi</title>
</head>

<body>
	<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
	Pekerjaan
	<select name="job">
		<option value="Mahasiswa" 
		<?php
			if(isset($_POST['job'])=='Mahasiswa'){
				echo'selected="selected" ';
			}
		?>> Mahasiswa </option>
		<option value="ABRI"
		<?php
			if($_POST['job']=='ABRI'){
				echo'selected="selected" ';
			}
		?>> ABRI</option>
		<option value="PNS"
		<?php
			if($_POST['job']=='PNS'){
				echo'selected="selected" ';
			}
		?>> PNS</option>
		<option value="Swasta"
		<?php
			if($_POST['job']=='Swasta'){
				echo'selected="selected" ';
			}
		?>> Swasta </option>
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