<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<meta charset="utf-8"> 
	<title>Welcome</title> 
</head> 
<body background="image.jpg"> 
	<h1 style="text-align: center;">University Admission Portal</h1> 
	<?php session_start(); 
	$regno=$_SESSION['regno']; 
	$pdo = new PDO('mysql:host=localhost;dbname=student_admission', 'root',''); 
	$sql="select * from student_details where regno= '$regno'"; 
	$result=$pdo->query($sql); 
	$row=$result->fetch(); 
	$name=$row["name"]; 
	$sex=$row['sex']; 
	$pref1=$row['pref1']; 
	$pref2=$row['pref2']; 
	$reser=$row['reser']; 
	$atte=$row['atte']; 
	$rank=$row['rank']; 
	$allot=$row['allot']; 
	$re=$row['recp']; 
	$score=$row[8]; 
	$pdo1 = new PDO('mysql:host=localhost;dbname=student_admission', 'root',''); 
	$sql1="select * from course where id= '$pref1'"; 
	$result1=$pdo1->query($sql1); 
	$row1=$result1->fetch(); 
	$sql2="select * from course where id= '$pref2'"; 
	$result2=$pdo->query($sql2); 
	$row2=$result2->fetch(); 
	$pfname1=$row1['cname']; 
	$pfname2=$row2['cname']; 
	if (strcmp($atte,"YES")==0) {     
		$score=$output['score']; 
	} 
	else 
		{     
			$score="not yet calculated"; 
		} 
 if (strcmp($allot,NULL)==0) 
 {     
 	$allot="NOT YET ALLOTED"; 
 }  
 ?> 
 <br> 
 <h1 style="text-align: center;">
 	<?php echo "$name"."    "."$regno" ?>
 		
 	</h1> 
 	<font size="6" color="blue"> <br> 
 		<a href="LOGIN.php">Log Out</a> 
 	</font>  <br> <br> 

 <br> 
 <h3 style="text-align: left;" >
 	<?php echo "Name :"."    "."$name" ?></h3> 
 	<h3 style="text-align: left;">
 		<?php echo "sex :"."    "."$sex" ?></h3> 
 		<h3 style="text-align: left;">
 			<?php echo "preference no 1 : "."$pfname1" ?></h3> <h3 style="text-align: left;">
 				<?php echo "preference no 2 : "."$pfname2" ?></h3> <h3 style="text-align: left;">
 					<?php echo "Reservation:"."    "."$reser" ?></h3> <h3 style="text-align: left;">
 						<?php echo "Receipt no: "."    "."$re" ?></h3> <h3 style="text-align: left;">
 							<?php echo "score:"."    "."$score" ?></h3> <h3 style="text-align: left;">
 								<?php echo "rank:"."    "."$rank" ?></h3> <h3 style="text-align: left;">
 									<?php echo "Alloted :"."    "."$allot" ?></h3> <br> <br>     
 									<form name="testForm" id="testForm"  method="POST"  >      
 										<input type="submit" name="btn" value="test" onclick="return true;"/>  
 									</form>     <br>     <br>     <br> 
    <br>      
    <form name="testForm" id="testForm1"  method="POST"  >      
    	<input type="submit" name="rec" value="generate recepit" onclick="return true";/>  </form>     
    	<?php    
    	if(isset($_REQUEST['btn']))
    		{          
    			if (strcmp($atte,"no")==0)     
    				{            
    					header('location:question.php');    
    				}     
    			else         
    				header('location :login.php');     
    		}     
    		if(isset($_REQUEST['rec']))     
    			{             
    				if ($allot == NULL||strcmp( $allot,"NOT YET ALLOTED")==0)     
    					{             
    								header('Location:Admin_main.php');     
    					}     
    				else     
    				{         
    					$_SESSION['rec'] = "$re";        
    					header('location:receipt.php');     
    				}          
    			} 
 
  ?>      
  <br> 
 
 
</body> 
</html> 
 
 