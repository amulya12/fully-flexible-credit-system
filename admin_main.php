<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<meta charset="utf-8"> 
	<title>Welcome</title> 
</head> 
<body background="image.jpg"> 
	<h1 style="text-align: center;">University Admission  Admin Portal</h1> 
	<br><br><br><br> 
	<font size="6" color="blue"> 
		<a href="Admin_main.php">Log Out</a> 
	</font>  
	<br> <br>
	<?php 
	session_start(); 
	$compute_rank=0; 
	$pdo = new PDO('mysql:host=localhost;dbname=student_admission', 'root',''); 
	if(!isset($_REQUEST['password']))  
	{ 
		echo' 
		<font size=5> 
			<center> 
				<form action="" method="post"> 
					<br><br> 
					<br><br>Password:  <input type="password" name="password" id="password" required> 
					<br><br><input type="submit" value="Compute Rank"> 
				</form> 
			</center>
		</font>  
		';   
	} 
	else 
	{        
		$sql = "SELECT * FROM student_details ORDER BY score DESC,board_mark DESC";        
		$result = $pdo->query($sql);        
		$i=0;        
		echo "regno"."   "."name"."    "."Rank";        
		echo "<br><br><br>";      
		$i=0; 
		while($row = $result->fetch()) 
		{     
			$i++;     
			$regno=$row['regno'];     
			$name=$row['name'];     
			$rank=$row['rank']=$i;     
			echo "$regno"."  "."$name"."   "."$rank";     
			$sql1="UPDATE `student_details` SET `rank` = '$i' WHERE `regno` ='$regno'";     
			$result= $pdo->query($sql1);     
			echo "<br><br><br>"; 
		} 
		$compute_rank=0; 
	} 
 
	if(!isset($_REQUEST['password1']))  
	{ 
		echo' 
		<font size=5> 
			<center> 
				<form action="" method="post"> 
					<br><br><br><br> 
					<br><br>Password:  <input type="password" name="password1" id="password1" required> 
					<br><br><input type="submit" value="start allotment"> 
				</form>  
			</center>
		</font> 
		';   
	} 
	else 
	{      
		$pdo = new PDO('mysql:host=localhost;dbname=student_admission', 'root','');        
		$sql = "SELECT * FROM student_details ORDER BY rank ";        
		$result = $pdo->query($sql);        
		$i=0;        
		echo "regno"."   "."name"."    "."Rank"."    "."alloted";        
		echo "<br><br><br>";      
		$i=0;      
		while($row = $result->fetch())       
		{     
			$sqle="";     
			$regno=$row['regno'];     
			$name=$row['name'];     
			$pf1=$row['pref1'];     
			$pf2=$row['pref2'];     
			$rank=$row['rank'];     
			$alloted=0;      
			$sql1="select * from course where id= '$pf1'"; $result1=$pdo->query($sql1); 
			$row1=$result1->fetch(); 
			$sql2="select * from course where id= '$pf2'"; 
			$result2=$pdo->query($sql2); 
			$row2=$result2->fetch(); 
			$flag=0; 
			if(strcmp($row['reser'],"YES")==0)     
			{   
        		if($row1['reser']>0)         
        		{            
        			$alloted=$row1['id'];             $reser=$row1['reser']-1;             
        			$sqle="UPDATE course SET reser ='$reser' where id ='$pf1'";             
        			$flag=1;                  
        		}         
        		else if ($row1['avail']>0)         
        		{             
        			$alloted=$row1['id'];             
        			$avail=$row1['avail']-1;             
        			$sqle="UPDATE course SET avail ='$avail' where id ='$pf1'";             
        			$flag=1;         
        		}         
        		else if($row2['reser']>0)         
        		{            
        			$alloted=$row2['id'];            
        			 $reser=$row2['reser']-1;             
        			$sqle="UPDATE course SET reser ='$reser'where id ='$pf2'";             
        			$flag=2;         
        		}         
        		else if ($row2['avail']>0)         
        		{             
        			$alloted=$row2['id'];             
        			$avail=$row2['avail']-1; 
            		$sqle="UPDATE course SET avail ='$avail' where id ='$pf2'";             
            		$flag=2;         
            	}                                      
            } 
            else     
            {        
            	if ($row1['avail']>0)         
            	{             
            		$alloted=$row1['id'];            
            		 $avail=$row1['avail']-1;             
            		$sqle="UPDATE course SET avail ='$avail' where id ='$pf1'";            
            		$flag=1;         
            	}         
            	else if($row2['avail']>0)         
            	{              
            		$alloted=$row2['id'];             
            		$avail=$row2['avail']-1;             
            		$sqle="UPDATE course SET avail ='$avail' where id ='$pf2'";             
            		$flag=2;         
            	}     
            }     
            if($flag==1)     
            {     
            	$cname=$row1['cname']; 
    			$sqle1="UPDATE student_details SET allot='$pf1' where regno='$regno'";     
    			echo "$regno\t$name\t$rank\t$cname\t";          
    		}     
    		elseif ($flag==2)     
    		{         
    			$sqle1="UPDATE student_details SET allot='$pf2' where regno='$regno'";         
    			$cname=$row2['cname'];     
    			echo "$regno\t$name\t$rank\t$cname\t";     
    		}     
    		$result3 = $pdo->query($sqle);     
    		$result4 = $pdo->query($sqle1);    
    	} 
    }  
    ?> 
 
</body> 
</html>  