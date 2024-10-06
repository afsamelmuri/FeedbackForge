<?php
session_start();
if (isset($_SESSION['login_user_phone'])) 
{
$count=0;
if(isset($_POST['submit']))
{
$conect = mysql_connect("localhost","root","");
$db=mysql_select_db("construct");

if(isset($db))
{
$p=$_SESSION['login_user_phone'];
$key=$_POST['key'];
//$sql = "INSERT INTO  `construct`.`attendance` VALUES (NULL ,  '',  '',  '',  '',  '',  '0');
$sql="select a.eid,r.ename,a.sitename  from attendance a,register r where  r.role='EMPLOYEE'";
$sql = mysql_query($sql);
$count=mysql_num_rows($sql);
}
echo "<h1>".$_POST['key']."</h1>";
}

include("profileheader.php");
?>


<br/>
<br/>
<br/>
<br/>
<br/>

<form method="post" action="attendance.php" name="f1" >

<input class="form-control" name="key" id="key" type="text" value="" size="10" required="">

<button type="submit" name="submit" class="btn btn-primary signup">Search</button>
			                                
	</form>
	<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">

<table border="1" cellpadding="10" cellspacing="10" width="100%" align="center" >				
<tr style=" background-color:#D5D5D5;"><td>EMPLOYEE-ID</td><td>EMP-NAME</td><td>SITE</td> <td>ATTENDENCE: Y-YES, N-NO</td></tr>
<?php
   if($count>0)
	while($row=mysql_fetch_array($sql))
	{	
			
echo("<tr><td>".$row[0]."</td><td>".$row[1]."[".$row[2]."]</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>");
				
	}
	?>
	</table>
 							 </ul>
			            </div>
			        </div>
			    </div>
	<?php

				
?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
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