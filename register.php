<html>
<head>
	<title>Register
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
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$mobile=$_POST['mobile'];
	
	$name  = mysql_escape_string($_POST['name']);
	$email  = mysql_escape_string($email);
	$password  = mysql_escape_string($password);
	
	
	$sql = "SELECT * from login_php where email = '$email'";
	// Perform Query
	$res = mysql_query($sql);
	if (!$res) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $sql;
		die($message);
	}
	if(mysql_num_rows($res)>0){
		echo "<h1 align=center>Sorry, Email already exists!</h1>";
		exit();
	}
	 $query = mysql_query("INSERT INTO login_php (name,email,password,mobile) VALUES ('$name','$email','$password','$mobile')");
	if($query){
		echo "<h1 align=center>You have successfully registered.<br/>Thank you.</h1>";
	}
       
	
}else{?>
<body>
<h1 align=center>Register Here</h1>
	<form action="register.php" method="POST">
	<table align=center><tr><td>
	Name:</td><td><input type="text" name="name" required /></td></tr>
	<tr><td>Email:</td><td><input type="email" name="email" required /></td></tr>
	<tr><td>Password:</td><td><input type="password" name="password" required /></td></tr>
	<tr><td>Mobile:</td><td><input type="text" name="mobile" required /></td></tr><br />
	<tr><td><button type="submit" name="submit">Register</button></td> </table>        
	</form>
</body>
<?php }
?>