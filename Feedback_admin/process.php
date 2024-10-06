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
<?php
if(!isset($_SESSION)) 
session_start(); 

date_default_timezone_set('Asia/Kolkata');
include("connect.php");

if(isset( $_POST['facultyfname']) && isset( $_POST['facultylname']))
{
	$fname=$_POST['facultyfname'];
	$lname=$_POST['facultylname'];
	addfaculty($_POST['facultyfname'],$_POST['facultylname']);
}

function addfaculty($fname,$lname)
{
	include("connect.php");
	$sql="INSERT INTO `faculty_master` (`f_id`, `f_name`, `l_name`, `b_id`, `password`, `branch`) VALUES (NULL, '$fname', '$lname', '1', '0', 'CSE')";
	$res=mysqli_query($connect,$sql);
	if($res)
	echo "<script type='text/javascript'> window.location = 'addfaculty.php?msg=Faculty  Added Successfully' </script>";
	else
	echo '<script type="text/javascript"> window.location = "addfaculty.php?msg=Failed To Add." </script>';
}



if(isset( $_POST['subjectname']) && isset( $_POST['sem']))
{
	$subjectname=$_POST['subjectname'];
	$sem=$_POST['sem'];
	addsubject($_POST['subjectname'],$_POST['sem']);
}
function addsubject($subjectname,$sem)
{
	//	sub_id sub_name sem_id f_id batch_id division_id
	include("connect.php");
	$sql="INSERT INTO `subject_master` VALUES (NULL, '$subjectname', $sem, 0, 1,0)";
	$res=mysqli_query($connect,$sql);
	if($res)
	echo "<script type='text/javascript'> window.location = 'addsubject.php?msg=Subject  Added Successfully' </script>";
	else
	echo '<script type="text/javascript"> window.location = "addsubject.php?msg=Failed To Add." </script>';
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


function getstaffname($subid)
{
include("connect.php");

$sql_ret="select distinct F.f_id, F.f_name, F.l_name from faculty_master AS F,subject_master AS S WHERE F.f_id=(select f_id from subject_master where sub_id='$subid')";
$res_set=mysqli_query($connect,$sql_ret);
$n=mysqli_fetch_array($res_set);
$str=$n[1]." ".$n[2];
return $str;
}




function getallstaffname($fid)
{
include("connect.php");

$sql_ret="select  f_name, l_name,f_id from faculty_master where f_id=".$fid;
$res_set=mysqli_query($connect,$sql_ret);
$n=mysqli_fetch_array($res_set);
$str=$n[0]." ".$n[1];
return $str;
}




function getallstaffnamesonly()
{
include("connect.php");

$sql_ret="select  f_name, l_name,f_id from faculty_master GROUP BY f_name ORDER BY f_id";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}



function getdepartment($subid)
{
include("connect.php");

$sql_ret1="select distinct F.branch from faculty_master AS F,subject_master AS S WHERE F.f_id=(select f_id from subject_master where sub_id='$subid')";
$res_set1=mysqli_query($connect,$sql_ret1);
$rs1=mysqli_fetch_array($res_set1);
echo $rs1[0];
}

function getbranch($REG)
{
include("connect.php");
$sql_ret="select DEPARTMENT from registration WHERE USN='$REG'";
$res_set=mysqli_query($connect,$sql_ret);
$r=mysqli_fetch_array($res_set);
return $r['DEPARTMENT'];
}


function getdash()
{
include("connect.php");
$st=mysqli_fetch_array(mysqli_query($connect,"select count(*) from registration"));
$fa=mysqli_fetch_array(mysqli_query($connect,"select count(*) from  faculty_master "));
$fe=mysqli_fetch_array(mysqli_query($connect,"select count(*) from feedback "));

$dash = array($st[0],$fa[0],$fe[0]);
return $dash;
}



function getfeedbacks($REG)
{
include("connect.php");

$sql_ret="select * from feedback WHERE REGISTERNUMBER='$REG'";
$r=mysqli_query($connect,$sql_ret);

return $r;
}


function getfdbk()
{
include("connect.php");
$sql_ret="select * from feedback";
$r=mysqli_query($connect,$sql_ret);

return $r;
}


function getallfeedbacks()
{
include("connect.php");

$sql_ret="select FEEDBACKID,REGISTERNUMBER,SUBJECTID,DATE,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,STATUS,semester from feedback group by SUBJECTID order by FEEDBACKID asc";
$r=mysqli_query($connect,$sql_ret);

return $r;
}

function getstafffeedbacks()
{
include("connect.php");

$sql_ret="select COUNT(REGISTERNUMBER),SUBJECTID,SUM(Q1),SUM(Q2),SUM(Q3),SUM(Q4),SUM(Q5),SUM(Q6),SUM(Q7),SUM(Q8),SUM(Q9),SUM(Q10) from feedback group by SUBJECTID";
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



function getallsubjectnamesonly()
{
include("connect.php");
$sql_ret="select sub_name,sub_id from subject_master ORDER BY sem_id";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}


function getsubjectsonly()
{
include("connect.php");
$sql_ret="select sub_name,sem_id,sub_id,f_id from subject_master ORDER BY sem_id asc";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}


if(isset( $_POST['subjectid']) && isset( $_POST['fid']) && isset( $_POST['division']))
{
	$subjectid=$_POST['subjectid'];
	$fid=$_POST['fid'];
	$division=$_POST['division'];

	assignsubjects($subjectid,$fid,$division);
}
function assignsubjects($subjectid,$fid,$division)
{
	//	sub_id sub_name sem_id f_id batch_id division_id
	include("connect.php");
	$sql="UPDATE `subject_master` SET f_id=$fid, division_id='$division' where sub_id=$subjectid";
	$res=mysqli_query($connect,$sql);
	if($res)
	echo "<script type='text/javascript'> window.location = 'assignsubjects.php?msg=Subject Assigned Successfully' </script>";
	else
	echo '<script type="text/javascript"> window.location = "assignsubjects.php?msg=Subject Assignment Failed." </script>';
}



function getStudents()
{
include("connect.php");
$sql_ret="SELECT * FROM registration  ORDER BY DEPARTMENT";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
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

$sql_ret="select distinct(branch) from subject  ";
$res_set=mysqli_query($connect,$sql_ret);
return $res_set;
}




function getPendingStudentFollowUps()
{
include("connect.php");
$sql_ret="select distinct(branch) from subject  ";
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
$P	=md5($P);

if(isset($connect))
{
$sql ="insert into registration values(NULL,'".$N."','".$R."','".$S."','".$D."','".$DOB."','".$E."','".$P."','ACTIVE')";
$status= mysqli_query($connect,$sql);
		
		if($status>0)
		{
		
		$_SESSION['USN']=$_POST['REGISTERNUMBER'];
		$_SESSION['login_user_email']=$_POST['EMAIL'];
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




















if(isset($_POST['username']) && isset($_POST['pass']))
{
	login();
}

function login()
{
if(isset($_POST['username']) && isset($_POST['pass']) )
{
$username  = $_POST['username']; 
$P	= $_POST['pass'];

include("connect.php");
	if(isset($connect))
	{
		$pass=md5($P);
		$sql = "select * from admin where uname='".$username."' AND password='".$pass."' ";
		$sqlres = mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($sqlres);
		
		if($c=mysqli_num_rows($sqlres)>0)
		{
		
			$_SESSION['login_user_reg']= $username;
			$_SESSION['login_user_name']= $row[0];
			$_SESSION['login_user_email']= $row[0];
			?>
			<div class="loader"></div>
			Loading Please wait..
			<?php
		  	
			echo '<script type="text/javascript"> 
		
		window.location = "profile.php" </script>';
		} 
		else
		{
			echo '<script type="text/javascript"> window.location = "signin.php?error=Login Failed1" </script>';
		}


}
 else
{
	echo '<script type="text/javascript"> window.location = "signin.php?error=Login Failed2" </script>';
}



} else
{

	echo '<script type="text/javascript">  window.location = "signin.php?error=Login Failed3" </script>';
}
$connect.close();
}




?>
