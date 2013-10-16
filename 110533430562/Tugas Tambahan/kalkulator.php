<!-- memudahkan browser untuk menampilkan suatu halam web dengan benar -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transiional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>kalkulator dengan php</title>
</head>
<body>
<form method = "post">
<input type = "number" name ="angka" value ="">
<select name="operator">
		<option>+</option>
		<option>-</option>
		<option>*</option>
		<option>/</option>
</select>
<input name="angka2" type="number" id="angka2" value="">

<?php
		
	if($_POST["angka"] && $_POST["angka2"]){
		if($_POST["operator"] =='+'){
			$hasil = $_POST["angka"]+$_POST["angka2"];
		}
		elseif($_POST["operator"]=='-'){
			$hasil = $_POST["angka"]-$_POST["angka2"];
		}
		elseif($_POST["operator"]=='*'){
			$hasil = $_POST["angka"]*$_POST["angka2"];
		}
		elseif($_POST["operator"]=='/'){
			$hasil=$_POST["angka"]/$_POST["angka2"];
		}
	}	

?>

<input type="submit"name="submit" value="=">
<input type="text" name="hasil" value="<?php echo $hasil;?>">
</form>
</body>
</html>