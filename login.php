<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="utf-8"> 
<title>Welcome</title>  // displays the main page
</head> 
<body background="image.jpg"> 
<?php 
session_start(); 
if (!isset($_REQUEST['regno'])) 
{ 
echo' 
<font size=5> 
<center> 
<form action="login.php" method="post"> 
<br><br><br><br><br><br><br><br><br><br><br><br><br>reg no:  <input type="text" name="regno" id="regno" required> 
<br><br>Password:  <input type="password" name="password" id="password" required> 
 
<br><br><input type="submit" value="GO"> 
</form> 
</font> 
</center> 
'; 
} 
else 
{ 
 
$regno = $_REQUEST['regno']; 
$password = $_REQUEST['password']; 
$pdo = new PDO('mysql:host=localhost;dbname=student_admission', 'root',''); 
$sql = "SELECT `Password` FROM `login` WHERE Regno = '$regno'"; 
$result = $pdo->query($sql);
$output = $result->fetch();
$_SESSION['regno'] = "$regno"; 
if($output['Password']== $password)
{
header('Location:database.php'); 
}
else 
{
	header('Location:login.php'); 
} 
}
?> 
</body> 
</html>

