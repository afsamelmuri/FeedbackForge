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
<!-- <script type="text/javascript">

$(document).ready(function() {

	$('#loader').hide();
	$('#show_heading').hide();
	
	$('#search_faculty').change(function(){
		$('#show_sub_categories').fadeOut();
		$('#loader').show();
		$.post("includes/getsubject.php", {
			qid: $('#search_faculty').val(),
		}, function(response){
			
			setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
		});
		return false;
	});
});

function finishAjax(id, response){
  $('#loader').hide();
  $('#show_heading').show();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
} 


</script> -->
<br/><br/><br/><br/><br/><br/>
<div class="container" id="tab2default">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">
                Assign Subjects To Faculty
            </h3> 
			       <h3 class="text-center">
			      <form action="process.php" method="post">

            
                <select name="subjectid"  id="search_faculty" class="form-control" placeholder="SUBJECT NAME" required>
                  <option value="">SELECT SUBJECT</option>
                  <?php
                          $res=getallsubjectnamesonly();
                          while($r=mysqli_fetch_array($res))
                          {
                  ?>
                  <option value="<?php echo $r[1];?>"> <?php echo $r[0];?></option>
                  <?php
                            }
                  ?>
                </select>

                <select name="fid"  id="search_faculty" class="form-control" placeholder="SUBJECT CODE" required>
                  <option value="">SELECT FACULTY</option>
                  <?php
 $res=getallstaffnamesonly();

while($r=mysqli_fetch_array($res))
{
?>
                  <option value="<?php echo $r[2];?>"><?php echo $r[0]." ".$r[1]." ( id - ".$r[2].")";?></option>
<?php
}
?>
                </select>

              <select class="form-control" name="division" id="division"  placeholder="Division" required>
              <option value="">Select Division</option>
              <option value="1">A</option>
              <option value="2">B</option>
              <option value="3">C</option>
              <option value="4">D</option>
              </select>
              <button type="submit"  name="singlebutton" class="btn btn-primary">Assign Subject</button>
              <br/>
              <br/>
            </form>
    </div>
    
    <div class="col-md-6">
      <p class="alert-success alert-dismissible show" style="padding:10px;margin-top:20px"><small><?php if(!isset($_GET['msg'])) { echo "Cross check all details before final save."; }else{ echo $_GET['msg']; }  ?></small></p>
    </div>
		</div>
        <div id="no-more-tables">
            <table class="col-md-8 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr style="background-color:black;color:white;">
        				<th>ID</th>
        				<th>SUBJECT NAME</th>
        				<th >SEMESTER</th>
                <th >STAFF HANDLING</th>
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
    $f_id=$r[3];
?>
    <TR> 
	<TH><?php  echo $id;?></TH>
	<TH><?php  echo $sub_name;?></TH>
  <TH><?php  echo $sem;?></TH>
  <TH><?php if($f_id!=0) echo $f_id." - ".getallstaffname($f_id); else echo '<h3>VACANT</h3>';?></TH>

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
