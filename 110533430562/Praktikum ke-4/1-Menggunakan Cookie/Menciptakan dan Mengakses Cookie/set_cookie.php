<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml : lang="en" lang="en">
<head>
	<title>Set Cookie</title>
</head>

<body>

<?php

//Men-set nilai cookie
setcookie('joyer', '7');

//Mendapatkan nilai cookie
echo $_COOKIE['joyer'];

?>

<p>
Tekan Refresh (F5);

</body>
</html>