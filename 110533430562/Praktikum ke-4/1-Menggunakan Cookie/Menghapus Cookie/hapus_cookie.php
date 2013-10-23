<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
 
<head> 
	<title>Hapus Cookie</title>
</head>

<body>

<?php

	setcookie('joyer', 'aku seorang joyer');
	
	if(isset($_COOKIE['joyer'])){
		echo 'cookie di-set <br/>';
		
		//Menghapus cookie, dengan masa berlaku 3 jam yang lalu
		setcookie('joyer', '', time() - 3 * 3600);
		echo'cookie dihapus';
	} else {
		echo 'unset';
	}
?>

<p>
Tekan Refresh (F5);

</body>
</html>