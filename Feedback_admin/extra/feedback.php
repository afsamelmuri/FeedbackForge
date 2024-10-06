<?php
session_start();
if (isset($_SESSION['login_user_phone'])) 
{
include("profileheader.php");
?>


    <section id="about" class="section-padding">
      <div class="container">
        <div class="row text-center" style="    margin-top: 19px;">
          
		  <div class="col-md-12">
            <div class="section-head">
              
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
							<h2 class="head-title">RECENT NEWS </h2>
								<ul>
							
									<li>test</li>
								
								</ul>
			            </div>
			        </div>
			    </div>
				
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
 							<h2 class="head-title"> NOTICES</h2>
				 				<ul>
 
 									<li>test</li>
 
 								</ul>
			            </div>
			        </div>
			    </div>

            </div>
          </div>
        </div>
      </div>
    </section>

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

      </script>
      <script>
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