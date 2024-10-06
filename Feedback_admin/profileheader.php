<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Feedback</title>
<link href="css/jquery.bxslider.css" rel="stylesheet" />
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="css/jquery.min.js"></script>
<script src="css/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="/jquery.min.js"></script>
<script src="jquery-1.12.4.min.js"></script>
<script src="js/bootstrap-notify.js"></script>
<script src="js/bootstrap-notify-min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/snap.svg/0.1.0/snap.svg-min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="js/jquery.bxslider.min.js"></script>
      <script>
         $(document).ready(function(){
        $('.bxslider').bxSlider();
      });

$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(" footer a[href='#myPage']").on('click', function(event) {

  // Prevent default anchor click behavior
  event.preventDefault();

  // Store hash
  var hash = this.hash;

  // Using jQuery's animate() method to add smooth page scroll
  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
  $('html, body').animate({
    scrollTop: $(hash).offset().top
  }, 900, function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
    window.location.hash = hash;
    });
  });
})
</script>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<header id="main-header">
  <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse"> <span class="sr-only">Menu</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="h3" href="profile.php" style="color:#FFFFFF;"><img src="" width="40" height="50" >Feedback System</a> </div><br/><br/>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbarCollapse"> <?php if(isset($_SESSION['login_user_name'])) echo "<div style='color:white;' class='nav navbar-nav navbar-right'> Logged In User :  ".$_SESSION['login_user_name'].""; ?>     
</div>
        <ul class="nav navbar-nav">
          <li><a href="profile.php">Dashboard</a></li>
		  <li><a href="studentfeedback.php">Students</a></li>
      <li><a href="addfaculty.php">Faculty</a></li>
      <li><a href="addsubject.php">Subjects</a></li>
      <li><a href="assignsubjects.php">Assign Subjects</a></li>
		  <li><a href="staffwise.php">Feedback Analysis</a></li>
		<li><a href="logout.php">Signout</a></li>
        </ul>
			  
      </div>
    </div>
  </nav>
</header>
