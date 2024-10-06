<?php
session_start();
if (isset($_SESSION['login_user_email'])) 
{
include("profileheader.php");
include("process.php");
if(isset($_POST['projectname']))
{
$pn=$_POST['projectname'];
	$r=getStudentlist($pn);
	$c=mysql_num_rows($r);
}

?>	
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<div class="container" id="tab2default">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">
                Students Search
            </h3>
			  <h3 class="text-center">
			  <form action="s_search.php" method="post">
<input id="searchinput" name="projectname" value="" size="40" type="search" placeholder="Enter Project Name" class="form-control input-md">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">submit</button>
        </form>    <div class="row">
        <p class="bg-success" style="padding:10px;margin-top:20px"><small><?php if(isset($_POST['projectname']))
{ echo $c." Result(s) found for  '  ".$pn."  '"; ?></small></p>
    </div>
		</div>
		
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th>G-ID</th>
        				<th>Project Name</th>
        				<th >College</th>
        				<th class="numeric">Registered Date</th>
        				<th class="numeric">Total Project Fees</th>
						<th >Update</th>
        				<th class="numeric">Disable/Enable</th>
        				
        			</tr>
        		</thead>
        		<tbody>
        		<?php
				while($row=mysql_fetch_array($r))
				{
				?>
					<tr>
        				<td data-toggle="<?php echo $row[0]; ?>" title="test"><?php echo $row[0]; ?></td>
        				<td data-toggle="<?php echo $row[1]; ?>"><?php echo $row[1]; ?>.</td>
        				<td data-toggle="<?php echo $row[2]; ?>" class="numeric"><?php echo $row[2]; ?></td>
        				<td data-toggle="<?php echo $row[3]; ?>" class="numeric"><?php echo $row[3]; ?></td>
        				<td data-toggle="<?php echo $row[4]; ?>" class="numeric"><?php echo $row[4]; ?></td>
						<td data-toggle="" class="numeric">
						<form action="s_search.php?id=<?php echo "";?>" method="post">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">submit</button>
        				</form> </td>
        				<td title="" class="numeric">
						<form action="s_search.php" method="post">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">submit</button>
        				</form> </td>
   
        			</tr>
        		<?php
				}
				}
				else
				{
				echo "No Records searched";
				}
				?>
        		</tbody>
        	</table>
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