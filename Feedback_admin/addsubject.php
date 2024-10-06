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
                Add Subject
            </h3> 
			       <h3 class="text-center">
			      <form action="process.php" method="post">
              <input id="searchinput" name="subjectname" value="" type="text" placeholder="Enter Subject Name" class="form-control input-md" required>
              <select class="form-control" name="sem" id="semester"  placeholder="Semester" required>
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
              <!-- <select class="form-control" name="division" id="division"  placeholder="Division" required>
              <option value="">Select Division</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              </select> -->
              <button type="submit"  name="singlebutton" class="btn btn-primary">Add Subject</button>
              <br/>
              <br/>
            </form>
    </div>
    
    <div class="col-md-6">
      <p class="alert-success alert-dismissible show" style="padding:10px;margin-top:20px"><small><?php if(!isset($_GET['msg'])) { echo "Cross check all details before final save."; }else{ echo $_GET['msg']; }  ?></small></p>
    </div>
		</div>
        <div id="no-more-tables">
            <table class="col-md-10 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr style="background-color:black;color:white;">
        				<th>ID</th>
        				<th>SUBJECT NAME</th>
        				<th >SEMESTER</th>
                
       			  </tr>
        		</thead>
        		<tbody>
        		<?php 
    $row=getsubjectsonly();
    $id=0;
	  while($r=mysqli_fetch_array($row))
	  {
      $id++;
	  $sub_name=$r[0];
    $sem=$r[1];
    $sub_id=$r[2];
?>
    <TR> 
	<TH><?php  echo $id;?></TH>
	<TH><?php  echo $sub_name;?></TH>
  <TH><?php  echo $sem;?></TH>
	<!-- <TH>
  <a href="updatesubject.php?id=<?php //echo $sub_id;?>" style="color:black;"><b><u>Update Record</u></b></a>
  </TH> -->
  </TR>
<?php
		}
?>


</tbody></TABLE>
<br/><hr/>
        </div>
    </div>

</div>
<br/><hr/><hr/>
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
