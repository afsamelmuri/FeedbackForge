<?php
session_start();
include("connect.php");
if($_REQUEST)
{
	$id 	= $_REQUEST['qid'];
	$USN=$_SESSION['login_user_reg'];
	
	$query = "select sub_name,sub_id from subject_master where f_id='".$id."' AND sub_id NOT IN(select SUBJECTID from feedback where REGISTERNUMBER='".$USN."')";
	
	$results = mysqli_query($connect,$query);
	$count = mysqli_num_rows($results);
	if($count>0)
	{
	?>
	<select name="SUBJECTNAME"  id="sub_category_id" required>
	<option value="">-------Select Subject------</option>
	<?php
	
	while ($rows = mysqli_fetch_array($results))
	{
	?>
		<option value="<?php echo $rows['sub_id'];?>"><?php echo $rows['sub_name'];?></option>
	<?php
	}
	?>
	</select>	
	
<?php
}
else
{
echo "You have submitted all feedback for this staff";
}


	
}?>