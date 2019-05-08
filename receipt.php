<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="utf-8"> 
<title>Welcome</title> 
</head> 
<body background="image.jpg"> 
<h1 style="text-align: center;">University Admission Portal</h1> 

<?php 
session_start(); 
$re=$_SESSION['rec']; 
$regno=$_SESSION['regno']; 
$pdo = new PDO('mysql:host=localhost;dbname=student_admission', 'root',''); 
$sql="select * from student_details where regno  = '$regno'"; 
$result = $pdo->query($sql); 
$row = $result->fetch(); 
$name = $row['name']; 
$allot = $row['allot']; 
$pdo1 = new PDO('mysql:host=localhost;dbname=student_admission', 'root',''); 
$sql1="select * from course where id= '$allot'"; 
$result1=$pdo1->query($sql1); 
$row1=$result1->fetch(); 
$cname=$row1['cname']; 
$fee=$row1['fee']; 
$total_fee=($fee*112)/100; 
$sql2 = "insert into receipt(no,name,alloted_code,alloted_name,fee,total_fee) values ('$re','$name','$allot','$cname','$fee','$total_fee')"; 
$result2=$pdo->query($sql2); 
 
?> 
<br> 
<h1 style="text-align: center;"><?php echo "$name"."    "."$regno" ?></h1> 
<font size="6" color="blue"> 
<br> 
<br> 
<br> 
<h3 style="text-align: left;"><?php echo "Receipt no:"."    "."$re" ?></h3> 
<h3 style="text-align: left;" ><?php echo "Name :"."    "."$name" ?></h3> 
<h3 style="text-align: left;"><?php echo "code:"."    "."$allot" ?></h3> 
<h3 style="text-align: left;"><?php echo "course name: "."$cname" ?></h3> 
<h3 style="text-align: left;"><?php echo "fee : "."$fee" ?></h3> 
<h3 style="text-align: left;"><?php echo "tax : 12%" ?></h3> 
<h3 style="text-align: left;"><?php echo "total fee"."    "."$total_fee" ?></h3> 
> 
<br> 
<br> 
<br> 
<br> 
</body> 
</html> 