<?php
session_start();
if (!isset($_SESSION['login_user_email'])) 
{
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>FEEDBACK</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="./css/styles.css" rel="stylesheet">
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>FEEDBACK</title>
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Passion+One|Raleway:400,300,500italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="assets/ie/html5.js"></script>
      <script src="assets/ie/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
</style>
</head>
  <body>
  
       <header id="main-header">
      <nav class="navbar navbar-default navbar-fixed-top">
	          <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="white"  href="#"><div><img src="" width="50" height="40" style="vertical-align:middle;">ONLINE FEEDBACK SYSTEM</div></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="index.php">Home</a></li>
<li><a href="signin.php">Login</a></li>
              <li><a href="signup.php">Register</a></li>
			  
            </ul>
          </div>
        </div>
      </nav>
    </header>
	<?php
	if(!isset($_GET['error']))
	{
	?>
	<div class="col-md-4 animated bounce" style=" right:0; margin-top: 30px; position:fixed; z-index:99;" >
<div class="alert alert-success alert-dismissable"><strong>Sign up to give feedback </strong>
</div>
</div>
<?php
	}
	else
	{
	?>
		<div class="col-md-4 animated bounce" style=" right:0; margin-top: 30px; position:fixed; z-index:99;" >
<div class="alert alert-success alert-dismissable"><strong><?php echo $_GET['error'];?></strong>
</div>
</div>
	
	<?php
	}
	?>
	<div style="margin-top:50px;">
	<!-- Login Form Start -->
	<form method="post" action="process.php" name="f1" >
	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
				<h3>
<a href="#">STUDENT REGISTRATION</a></h3>
			        <div class="box">
			            <div class="content-wrap">
			                
<input class="form-control" name="NAME" id="username" value="" type="text" placeholder="Full Name?" required="required">
<br/>
<input class="form-control" name="REGISTERNUMBER" id="registernumber" type="text" value="" placeholder="USN?" required="">

<br/>
<select class="form-control" name="SEMESTER" id="semester"  placeholder="Semester" required="">
<option value="">Select Semester</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
<br/>
<select class="form-control" name="DIVISION" id="Division"  placeholder="Division" required="">
<option value="">Select Division</option>
<option value="1">A</option>
<option value="2">B</option>
<option value="3">C</option>
<option value="4">D</option>
</select>
<br/>
<select class="form-control" name="DEPARTMENT" id="department"  placeholder="Department?" required="">
<option value="CSE">COMPUTER SCIENCE</option>
<option value="ECE">ELECTRONICS AND COMMUNICATION</option>
<option value="AT">AUTOMOBILE</option>
<option value="ME">MECHANICAL</option>
<option value="CE">CIVIL</option>
<option value="TX">TEXTILES</option>
</select>
<br/>
<input class="form-control" name="DATEOFBIRTH" id="dateofbirth" type="date" value="" placeholder="Date of Birth?" required="">
<br/>
<input class="form-control" name="EMAIL" id="email" type="text" value="" placeholder="Email?" required="">
<br/>
<input class="form-control" name="PASSWORD" id="password" type="password" value="" placeholder="Password?" required="">

		               	<div class="action">
<button type="submit" name="btn-login" class="btn btn-primary signup" href="index.html">Register</button>
			                </div>                
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	</form>
</div>
<br/>
<br/>

<br/>
<br/>


	<!-- Login Form Ends -->
 

	<!-- Login Error -->
		
	<!-- 2 Step Verification -->
		
	<!-- Footer Starts -->
	<footer style="bottom:0; position:fixed; width:100%; height:50px; padding:0;">
         <div class="container">
            <div class="row" align="center">
          <p class="white"></p>
      </div>
         </div>
      </footer>
	  <!-- Footer Ends -->
	  
	 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./css/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./css/bootstrap.min.js"></script>
	 <!-- Include cutom js -->
    <script src="./css/custom.js"></script>
</body></html>
<?php
}
else
{
?>

<script language="javascript" type="text/javascript">
document.location="profile.php";
</script>

<?php
}
?>