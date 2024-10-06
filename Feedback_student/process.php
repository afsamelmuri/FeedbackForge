<?php 
if(!isset($_SESSION)) 
session_start(); 

date_default_timezone_set('Asia/Kolkata');
include("connect.php");

function getdepartment($REG)
{
include("connect.php");

$sql_ret="select DEPARTMENT from registration WHERE USN='$REG'";
$res_set=mysqli_query($connect,$sql_ret);
$r=mysqli_fetch_array($res_set);
return $r['DEPARTMENT'];
}

function getsem($REG)
{
include("connect.php");

$sql_ret="select SEMESTER from registration WHERE USN='$REG'";
$res_set=mysqli_query($connect,$sql_ret);
$r=mysqli_fetch_array($res_set);
return $r['SEMESTER'];
}

function getstaff($REG)
{
include("connect.php");
$SEM=getsem($REG);
$sql_ret="select distinct F.f_id, F.f_name, F.l_name from faculty_master AS F,subject_master AS S WHERE F.branch=(select DEPARTMENT from registration where USN='$REG') AND S.sem_id=$SEM";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}




function getfeedbacks($REG)
{
include("connect.php");

$sql_ret="select * from feedback WHERE REGISTERNUMBER='$REG'";
$r=mysqli_query($connect,$sql_ret);

return $r;
}




function getsubjects($sub_id)
{
include("connect.php");

$sql_ret="select sub_name from subject_master WHERE sub_id='$sub_id'";
$res_set=mysqli_query($connect,$sql_ret);
$r=mysqli_fetch_array($res_set);
return $r['sub_name'];
}



function getStudentlist($p)
{
include("connect.php");

$sql_ret="SELECT * FROM registration where USN='$USN' group by groupid";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}


function getStudentlistD()
{
include("connect.php");

$sql_ret="SELECT groupid,p_title,college,reg_date,total_fees FROM registration group by pid";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}


function getPendingPayments()
{
include("connect.php");
$sql_ret="select distinct(branch) from subject";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}




function getPendingStudentFollowUps()
{
include("connect.php");
$sql_ret="select distinct(branch) from subject";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}

function getTotalPayments()
{
include("connect.php");

$sql_ret="select distinct(branch) from subject  ";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}

function getTotal()
{
include("connect.php");
$sql_ret="select distinct(branch) from subject  ";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}

function getPairPending()
{
include("connect.php");
$sql_ret="select distinct(branch) from subject  ";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}

function getOfficeSearch()
{
include("connect.php");
$sql_ret="select distinct(branch) from subject  ";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}





if(isset( $_POST['NAME']) && isset( $_POST['REGISTERNUMBER']) && isset( $_POST['SEMESTER']) && isset( $_POST['DEPARTMENT']) && isset( $_POST['DATEOFBIRTH']) && isset( $_POST['EMAIL']) && isset( $_POST['PASSWORD']))
{
$res=mysqli_num_rows(mysqli_query($connect,"select * from registration where USN='".$_POST['REGISTERNUMBER']."'"));
echo "<script type='text/javascript'> Already:$res records </script>";
if($res==0)
{
	signup();
}
else
{
echo '<script type="text/javascript"> window.location = "signup.php?error=You are already Registered." </script>';
}

}

function signup()
{
include("connect.php");
$N  = $_POST['NAME']; 
$R	= $_POST['REGISTERNUMBER'];
$S	= $_POST['SEMESTER'];
$D	= $_POST['DEPARTMENT'];
$DOB= $_POST['DATEOFBIRTH'];
$E	= $_POST['EMAIL'];
$P	= $_POST['PASSWORD'];
$P	= md5($P);
$DIVISION	= $_POST['DIVISION'];

if(isset($connect))
{
$sql ="insert into registration values(NULL,'".$N."','".$R."','".$S."','".$D."','".$DOB."','".$E."','".$P."','ACTIVE','".$DIVISION."')";
$status= mysqli_query($connect,$sql);
		
		if($status>0)
		{
		$_SESSION['USN']=$_POST['REGISTERNUMBER'];
		$_SESSION['login_user_email']=$_POST['EMAIL'];
		$_SESSION['login_user_reg'] =$_POST['REGISTERNUMBER'];
?>
<div class="loader"></div>
Registration Successful, Please wait..
<?php
		  	
echo "<script type='text/javascript'> 
		alert('Congratulations!, $N you have registered successfully');
		window.location = 'signin.php' </script>";
		} 
		else
		{
		$res=mysqli_fetch_array(mysqli_query($connect,"select * from registration where USN='".$_POST['REGISTERNUMBER']."'"));
		$count=mysqli_num_rows(mysqli_query($connect,"select * from registration where USN='".$_POST['REGISTERNUMBER']."'"));
		if($count>0)
		{
			echo "<script type='text/javascript'> window.location = 'signup.php?error=Already User Exist with email:$res[EMAIL]' </script>";
		}
		else
		{
			echo "<script type='text/javascript'> window.location = 'signup.php?error=Registration Failed' </script>";
		}
			
			
			
		}


}
 else
{
	echo '<script type="text/javascript"> window.location = "signup.php" </script>';
}
$connect.close();
}


if(isset($_POST['email']) && isset($_POST['pass']))
{
	login();
}

function login()
{
if(isset($_POST['email']) && isset($_POST['pass']) )
{
$USN  = $_POST['email']; 
$P	= $_POST['pass'];

include("connect.php");
	if(isset($connect))
	{
		$pass=md5($P);
		
		$sql = "select * from registration where USN='".$USN."' AND PASSWORD='".$pass."' and STATUS='ACTIVE'";
		$sqlres = mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($sqlres);
		if($c=mysqli_num_rows($sqlres)>0)
		{
			$_SESSION['login_user_reg']= $USN;
			$_SESSION['login_user_name']= $row[1];
			$_SESSION['login_user_email']= $row[6];
			?>
<div class="loader"></div>
Loading Please wait..
<?php
		  	
echo '<script type="text/javascript"> 
		
		window.location = "profile.php" </script>';
		} 
		else
		{
			echo '<script type="text/javascript"> window.location = "signin.php" </script>';
		}


}
 else
{
	echo '<script type="text/javascript"> window.location = "signin.php" </script>';
}



} else
{

	echo '<script type="text/javascript">  window.location = "signin.php" </script>';
}
$connect.close();
}




?>
<style>
.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 10s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 10s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>