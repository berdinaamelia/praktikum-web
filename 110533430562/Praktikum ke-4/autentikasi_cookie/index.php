<html>
<head><title>Halaman Utama</title>
<style type="text/css">
.inner{
margin: 150px auto;
padding: 20px;
width: 250px;
border: 1px solid #333;
}
</style>
</head>
<body>
<?php
ini_set("display errors", 1);
define('VALID', 1);
require_once('./tugasrumah.php');
init_login();
validate();
?>
<h3>Percobaan Halaman Login</h3>
<p>
<a href="?m=logout">Logout</a>
<p>
Menu-menu admin ada disini
</body>
</html>