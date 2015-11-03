<html>
<head>
	<title>Login
	</title>
	<style>
	body{
		background-color:lightblue;
	}
	h1{
		color:brown;
		font-style:Verdana;
	}
	table{
		border:1px black dashed;
	}
	</style>
</head>

<?php
require('config.php');
?>
<?php
if(isset($_POST['submit'])){
	//perform the form verification
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$email  = mysql_escape_string($email);
	$password  = mysql_escape_string($password);
	
	$sql = "SELECT * from login_php where email = '$email' and password = '$password' ";
	// Perform Query
	$res = mysql_query($sql);
	
	if(mysql_num_rows($res)>0){
		echo "<h1 align=center>You are now logged in.<br/>Welcome</h1>";
		exit();
	}
	else{
		echo "<h1 align=center>Wrong user or password!</h1>";
	}
	
       
	
}else{?>
<body>
<h1 align=center>Login</h1>
	<form action="login.php" method="POST">
	<table align=center><tr><td>
	Email:</td><td><input type="email" name="email" /></td></tr>
	<tr><td>Password:</td><td><input type="password" name="password" /></td></tr><br />
	<tr><td><button type="submit" name="submit">Login</button></td></table>
            
	</form>

<?php }
?>