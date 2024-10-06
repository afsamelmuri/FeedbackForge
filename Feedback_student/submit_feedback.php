<?php
session_start();
if (isset($_SESSION['login_user_email'])) 
{

include("connect.php");
$default = 1;
?>

<div align="center" style=" background-color:#FFCC33; color:#0066FF; padding:100px;">
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php
if(isset($_POST['submit']))
{



$REGISTERNUMBER=$_POST['USN'];
$SUBJECTID=$_POST['SUBJECTNAME'];
$DATE=date("d/m/Y");
$Q1=$_POST['ans_1'];
$Q2=$_POST['ans_2'];
$Q3=$_POST['ans_3'];
$Q4=$_POST['ans_4'];
$Q5=$_POST['ans_5'];
$Q6=$_POST['ans_6'];
$Q7=$_POST['ans_7'];
$Q8=$_POST['ans_8'];
$Q9=$_POST['ans_9'];
$Q10=$_POST['ans_10'];
$STATUS='ACTIVE';
$semester=$_POST['SEM'];
	

$sql_insert="insert into feedback values (NULL,'".$REGISTERNUMBER."','".$SUBJECTID."',now(),'".$Q1."','".$Q2."','".$Q3."','".$Q4."','".$Q5."','".$Q6."','".$Q7."','".$Q8."','".$Q9."','".$Q10."','".$STATUS."','".$semester."')";


$res=mysqli_query($connect,$sql_insert);
if($res>0)
{
echo "<p align=\"center\"><h1>$REGISTERNUMBER - Feedback is submited successfully!</h1><br>You'll be redirected to Home Page after (10) Seconds</p>";
echo "OR <a href='studentfeedback.php'>Click Here</a>";
echo "<meta http-equiv=Refresh content=5;url=studentfeedback.php>";
exit;
}
else
{
echo "<p align=\"center\"><h1>Feedback submision failed!</h1><br>You'll be redirected to Home Page after (10) Seconds</p>";
echo "OR <a href='studentfeedback.php'>Click Here</a>";
echo "<meta http-equiv=Refresh content=5;url=studentfeedback.php>";

exit;
}


	}



?>
</div>
  </body>
</html>
<?php
}
else
{
?>
<script language="javascript" type="text/javascript">
alert ('Session has expired Please, login..');
document.location="signin.php";
</script>

<?php
}
?>