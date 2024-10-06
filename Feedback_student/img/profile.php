<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Accounts</title>
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Passion+One|Raleway:400,300,500italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <header id="main-header">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">My<span>Accounts</span></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="banner">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#service">Services</a></li>
              <li><a href="#portfolio">Portfolio</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
<div ><a href="#">My Accounts Ver 1.0</a>
<?php session_start(); echo "Welcome, ".$_SESSION['login_user_name']; ?>
<button type="submit" style="padding: 0px 0px; margin-top: -10px;" name="btn-login" class="btn btn-primary signup" href="logout.php">Logout</button>
</div>




<!-- Login Form Start -->
	

		<footer style="bottom:0; position:fixed; width:100%; height:50px; padding:0;">
         <div class="container">
            <div class="copy text-center">
               Copyright 2016. <a href="#" target="_blank">My Accounts Ver 1.0</a>
            </div>
         </div>
      </footer>
	  <!-- Footer Ends -->
	  
	 

  
</body></html>