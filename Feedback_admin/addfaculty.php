<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php
session_start();
if (isset($_SESSION['login_user_email'])) 
{
include("profileheader.php");
include("process.php");
?>	

<script>$(document).ready(function(){ $('[data-toggle="tooltip"]').tooltip();});</script>
<br/><br/><br/><br/><br/><br/>
<div class="container" id="tab2default">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">
                Add Faculty
            </h3>
			       <h3 class="text-center">
			      <form action="process.php" method="post">
              <input id="searchinput" name="facultyfname" value="" type="text" placeholder="Enter Faculty First Name" class="form-control input-md" required>
              <input id="searchinput" name="facultylname" value="" type="text" placeholder="Enter Faculty Last Name" class="form-control input-md" required>
              </select>
              <button type="submit"  name="singlebutton" class="btn btn-primary">Add Faculty</button>
              <br/>
              <br/>
            </form>
    </div>
    
    <div class="col-md-6">
      <p class="alert-success alert-dismissible show" style="padding:10px;margin-top:20px"><small><?php if(!isset($_GET['msg'])) { echo "Cross check all details before final save."; }else{ echo $_GET['msg']; }  ?></small></p>
    </div>
		</div>
        <div id="no-more-tables">
            <table class="col-md-6 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr style="background-color:black;color:white;">
        				<th>ID</th>
        				<th>FACULTY NAME</th>
        				<!-- <th >UPDATE</th> -->
        				
       			  </tr>
        		</thead>
        		<tbody>
        		<?php 
    $row=getallstaffnamesonly();
    $id=0;
	  while($r=mysqli_fetch_array($row))
	  {
      $id++;
      $name=$r[0]." ".$r[1];
      $f_id=$r[2];
	  
?>
    <TR> 
	<TH><?php  echo $f_id;?></TH>
	<TH><?php  echo $name;?></TH>
  <!-- <TH><?php //$res=getsubjects($id); 	echo $res; ?></TH> -->
	<!-- <TH>
  <a href="updatefaculty.php?id=<?php //echo $f_id;?>" style="color:black;">U R</a>
  </TH> -->
  </TR>
<?php
		}
?>


</tbody></TABLE>
        </div>
    </div>

</div>
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
