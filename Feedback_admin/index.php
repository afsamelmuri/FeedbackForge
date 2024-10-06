<?php
session_start();
if (!isset($_SESSION['login_user_email'])) 
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>FEEDBACK</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="./css/styles.css" rel="stylesheet">
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
            <a class="white" href="#"><div><img src="images/ .jpg" width="50" height="40" style="vertical-align:middle;">FEEDBACK SYSTEM CONTROL PANEL</div></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="index.php">Home</a></li>
<li><a href="signin.php">Login</a></li>

			  
            </ul>
          </div>
        </div>
      </nav>
    </header>

<br/><br/>
    <section id="about" class="section-padding">
      <div class="container">
        <div class="row text-center">
		 <div class="col-md-6">
            <div class="wrap-item">
              <div class="item-img">
                <img src="img/ser01.png">
              </div>
              <h3 class="pad-bt15">Creative Concept</h3>
              <p>Creativenss in saving papers and trees</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="wrap-item">
              <div class="item-img">
                <img src="img/ser02.png">
              </div>
              <h3 class="pad-bt15">Amazing Design</h3>
              <p>Easyness in giving appropriate feedback</p>
            </div>
          </div>
          <div class="col-md-12" id="#signin">
            <div class="section-head" style="padding-top:100px;">
             
              <img src="images/1713-360-degree-feedback1.jpg" class="img-responsive">
              <hr>
            </div>
          </div>
         
         </div>
		 </div>
    </section>

   
   
    <footer id="main-footer" style="bottom:0; position:fixed; width:100%; height:50px; padding:0;">
      <div class="container">
        <div class="row">
          <p class="white"></p>
        </div>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./css/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./css/bootstrap.min.js"></script>
	 <!-- Include cutom js -->
    <script src="./css/custom.js"></script>
  </body>
</html>
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