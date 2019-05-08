<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="utf-8"> 
<title>Welcome</title> 
</head> 
<body background="image.jpg"> 
<h1 style="text-align: center;">University Admission Portal</h1> 
<?php 
$answer=0; 
session_start(); 
$regno=$_SESSION['regno']; 
$score=0; 
$pdo = new PDO('mysql:host=localhost;dbname=student_admission', 'root',''); 
$sql="select q_id from student_details where regno= '$regno'"; 
$result=$pdo->query($sql); 
$output = $result->fetch(); 
$qid=$output['q_id']; 
$sql1 ="SELECT * FROM question WHERE q_id = '$qid'"; 
$result1=$pdo->query($sql1); 
$i=0; 
$n=$result1->rowCount(); 
if(!isset($_REQUEST['answer'])) 
{ 
while($row=$result1->fetch() ) 
{   $i++; 
    echo '<br>'; 
    echo '<br>'; 
    echo $row['question']; 
    echo '<br>'; 
    echo '<br>'; 
    echo "1  :".$row['option1']; 
    echo '<br>'; 
    echo '<br>'; 
    echo "2  :".$row['option2']; 
    echo '<br>'; 
    echo '<br>'; 
    echo "3  :".$row['option3']; 
    echo '<br>'; 
    echo '<br>'; 
    echo "4  :".$row['option4']; 
    echo '<br>'; 
    echo '<br>'; 
    echo '<form name="testForm" id="testForm"  method="POST"  >
    Answer :<input type="text" name="answer" id="answer" required>
    <input type="submit" name="btn" value="submit" autofocus  onclick="return ;"/> 
 </form> '; 
    $_SESSION['answer'] = $row['correct']; 
} 
} 
else  
   { 
            if(intval($_SESSION['answer'])==intval($_REQUEST['answer']))
              { 
                  $score++; 
                   echo "Your answer is correct.";
               } 
               else
                    {
                        echo "Your answer is wrong.";
                    }
    $sql2="UPDATE student_details SET score ='$score'"; 
    $sql3="UPDATE student_details SET atte='YES'"; 
    $result2=$pdo->query($sql2); 
} 
?>  
</body> 
</html> 