<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<meta charset="utf-8"> 
	<title>Welcome</title> 
</head> 
<body background="image.jpg"> 
	<?php 
	session_start(); 
	if (!isset($_REQUEST['username'])) 
	{ 
		echo' 
		<font size=5> 
			<center> 
				<form action="" method="post"> 
				<br><br><br><br><br><br><br><br><br><br><br><br><br>username:  <input type="text" name="username" id="username" required> 
				<br><br>Password:<input type="password" name="password" id="password" required><br><br>
				<input type="submit" value="LOGIN"> 
				</form>  
			</center> 
		</font>
		';
	} 
	else 
	{ 
		$username = $_REQUEST['username']; 
		$password = $_REQUEST['password']; 
		$pdo = new 
		PDO('mysql:host=localhost;dbname=student_admission', 'root', '');
		$sql = "SELECT `Password` FROM `adminlogin` WHERE username = '$username'"; 
		$result = $pdo->query($sql); 
		$output = $result->fetch(); 
		$_SESSION['username'] = "$username"; 	
		if($output['Password']== "$password") 
			header('Location:admin_main.php'); 
		else 
			header('Location:adminlogin.php'); 
 	} 
 	?> 
</body>
</html>
 
