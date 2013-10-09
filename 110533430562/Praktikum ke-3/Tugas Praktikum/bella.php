<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title>Form Login</title>

<script>

function cekhuruf(huruf){
				cek = /^[A-Za-z]{1,}$/;
				return cek.test(huruf);
			}

function Form()
{
var username=document.forms["login"]["username"].value;
var pass=document.forms["login"]["pass"].value;

if ((username==null || username=="")||(pass==null|| pass==""))
  {
  alert("Username dan Password harus diisi");
   document.getElementById("username").focus();
  return false;
  }
  
  if(cekhuruf(username)=== false ||cekhuruf(pass)===false)
  {
  	alert("Username dan password harus berupa huruf");
  	 document.getElementById("username").focus();
  	return false;
  }

  return true;
}
</script>
</head>

<form  name="login" method="post" onsubmit="return Form()" action="<?php $_SERVER['PHP_SELF'];?>">
<p align="center"><? echo $status;?></p>

<table width="500" border="6" align="center" bgcolor="#b4edf7"

rules="groups" cellpadding="8" cellspacing="5">
<tr><td width="50">&nbsp;</td>
<td align="left"><font size="10" face="Verdana"

color="#000000">Login</font></td>
</tr>
<tbody >

<tr><td width="100">&nbsp;</td><td><font size="4"

face="verdana">Username :</font></td></tr>
<tr><td width="100">&nbsp;</td><td><input type="text" name="username"

size="50" id="username" /></td></tr>
<tr><td width="100">&nbsp;</td><td><font size="4"

face="verdana">Password :</font></td></tr>

<tr><td width="100">&nbsp;</td><td><input type="password"

name="pass" size="50" id="password" /></td></tr>
<tr><td width="100">&nbsp;</td><td><input name="submit" type="submit"

onClick="return validateForm()" value="LOGIN" /></td></tr>
<tr><td colspan="2"align="center"><font size="2" face="verdana">

</font></td></tr>
</table>
</form>

<?php
if (is_string($_POST['username']))
{
	if ($_POST['username']=='bella'){
		echo "<center>Selamat datang, ". $_POST['username']."</center>";
	}
	else{
		echo 'Username yang anda masukan tidak sesuai, silahkan masukan username!!!';
	}
}
?>

</body>
</html>