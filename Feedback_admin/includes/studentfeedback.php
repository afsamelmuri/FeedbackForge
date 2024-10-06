<?php
session_start();
if (isset($_SESSION['login_user_email'])) 
{
include("profileheader.php");
include("process.php");
$default = 1;
?>
<title>Feedback System</title>
<link rel="stylesheet" type="text/css" href="includes/style.css" />
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link href="css/line.css" rel="stylesheet">
<script type="text/javascript">

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


</script>
<style>
.both{ float:left; margin:0 15px 0 0; padding:0px;}
.slidecontainer 
{
    width: 100%;
}

.slider 
{
    -webkit-appearance: none;
    width: 100%;
    height: 10px;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover 
{
    opacity: 1;
}

.slider::-webkit-slider-thumb 
{
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #FF6633;
    cursor: pointer;
}

.slider::-moz-range-thumb 
{
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background:#FF6633;
    cursor: pointer;
}
td{padding-left:5px; }
tR{padding-left:5px; }
</style>
<style>
label
{
border: 0px solid #5a5151;
    padding: 0px;
}
</style>
</head><body class="login2background">
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<table class="table-responsive"  border="1" align="center"  style="margin-left:100px; padding:20px;" >
  <tr>
    <td valign="bottom" align="center"> STUDENT FEEDBACK SYSTEM </td>
  </tr>
  <tr>
    <td  valign=top><form action="submit_feedback.php" method="post" id="regiration_form" name="feedback_form" onSubmit="return chkForm();">
        <div class="container">
          <table class="table-responsive" border="0"  align="center" >
            <tr >
              <td valign="bottom" align="center" style="background-color:#CCCCCC">
			   <label> USN:
                <input type="text" name="USN" value="<?php $REG=$_SESSION['login_user_reg']; echo $_SESSION['login_user_reg'];?>" size="10" readonly/></label>
                 
				 
				 </td>
				 <td style="background-color:#CCCCCC">
				 <label>SEMESTER:
                <input type="text" name="SEM" value="<?php echo getsem($REG); ?>" size="1" readonly/></label>
                
				</td>
				 <td style="background-color:#CCCCCC">
				
				
				<label> BRANCH:
                <input name="BRANCH" type="text" tabindex="1" align="left"  readonly value="<?php echo getdepartment($REG); ?>"></label><br/>
				<br/>
				
				</td>
				</tr>
				<tr>
				 <td style="background-color:#FF9966">
				
				
				
                 <label>FACULTY:
                <select name="STAFF"  id="search_faculty" placeholder="SUBJECT CODE" required>
                  <option value="">----SELECT FACULTY-------</option>
                  <?php
 $res=getstaff($REG);

while($r=mysql_fetch_array($res))
{
?>
                  <option value="<?php echo $r[0];?>"><?php echo $r[1]." ".$r[2];?></option>
                  <?php
}
?>
                </select></label>
				
				</td>
				 <td style="background-color:#FF9966">
				
				
				
				
                
                <label>
                <div class="both">
                  SUBJECT:<div id="show_sub_categories" align="center"> <img src="images/loader.gif" style="margin-top:8px; float:left" id="loader" alt="" /> </div>
                </div>
				</label>
                
              </td>
				 
     <td style="background-color:#FF9966">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5" align="center">Note: Enter Rating from 0 to 5.</td>
            </tr>
            <tr>
              <td colspan="5"><div class="container">
                  <table  id="rounded-corner" cellpadding="10" cellspacing="0" border="0" align="center" class="table table-striped">
                    <thead class="thead-dark">
                      <tr >
                        <th  class="rounded-company" align="center">ID</th>
                        <th  class="rounded-q1" align="center">Questions</th>
                        <th class="rounded-q4">&nbsp;</th>
                      </tr>
                    </thead>
                    <?php
		  	$sql_que="select * from feedback_ques_master";
			$res_que=mysql_query($sql_que) or die(mysql_error());
			$i=1;
			$tab_ind=7;
			$edit=0;
			while($row_que=mysql_fetch_array($res_que))
			{
				echo "<tr>";
				echo "<td align=\"center\">".$i."</td>";
				echo "<td>".$row_que['ques']."</td>";
				
				echo "<td><input type='range' min='0' max='5' value='3' class='slider' id='myRange_$i' name=\"ans_$i\" tabindex=\"$tab_ind\" >
  Value: <span id='demo_$i' style='font-size:24px;' ></span></td>";
				echo "</tr>";
				?>
                    <script>
var slider = document.getElementById("<?php echo "myRange_$i"; ?>");
var output = document.getElementById("<?php echo "demo_$i"; ?>");
output.innerHTML = slider.value;

document.getElementById("<?php echo "myRange_$i"; ?>").oninput = function() 
{
  document.getElementById("<?php echo "demo_$i"; ?>").innerHTML = document.getElementById("<?php echo "myRange_$i"; ?>").value;
}

</script>
                    <?php
				$tab_ind++;
				$i++;
}
?>
                    <tr>
                      <td colspan="2"  class="rounded-foot-left" align="center"><input class="button" type="submit" name="submit" value="Submit" onKeyUp="return check();" tabindex="17"/>
                        &nbsp;
                        <input type="reset" name="reset" value="Reset" tabindex="18" class="button"/>
                      </td>
                      <td align="center" class="rounded-foot-right"></td>
                    </tr>
                  </table>
                </div></td>
            </tr>
          </table>
        </div>
      </form></td>
  </tr>
  <tr>
    <td width="697"  height="1"><?php ?></td>
  </tr>
</table>
</body>
</html><script>
function check()
{
alert();
return true;
}

var mikExp = /[$\\@\\!\\\#%\^\&\*\(\)\[\]\+\_\{\}\`\~\=\|]/;
function dodacheck(val) {
var strPass = val.value;
var strLength = strPass.length;
var lchar = val.value.charAt((strLength) - 1);
if(lchar.search(mikExp) != -1) {
var tst = val.value.substring(0, (strLength) - 1);
val.value = tst;
   }
}

//  End -->
</script>
<script language="javascript" type="text/javascript">
function isCharOnly(e)
{
	var unicode=e.charCode? e.charCode : e.keyCode
	//if (unicode!=8 && unicode!=9)
	//{ //if the key isn't the backspace key (which we should allow)
		 //disable key press
		if (unicode==45)
			return true;
		if (unicode>48 && unicode<54) //if not a number
			return false
	//}
}
function isNumberOnly(e)
{
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8 && unicode!=9)
	{ //if the key isn't the backspace key (which we should allow)
		 //disable key press
		//if (unicode==45)
		//	return true;
		if (unicode<48||unicode>54) //if not a number
			return false
	}
}
function chkForm(form)
{

		var RefForm = document.feedback_form;
		for(i=1;i<=10;i++)
		{ 
		
			if(eval("document.feedback_form.ans_"+i).value == '')
			{
				alert("Enter rating.");
				eval("document.feedback_form.ans_"+i).focus();	
				return false;
			}
			if(eval("document.feedback_form.ans_"+i).value > 5)
			{
				alert("Enter rating from 0 to 5.");
				eval("document.feedback_form.ans_"+i).focus();	
				return false;
			}
				
		}
		/*if (RefForm.roll_no.value.length != 11 )
		{
			alert("Enter Roll Number");	
			RefForm.roll_no.focus();				
			return false;
		}*/
		
		/*if (RefForm.date.value == '' )
		{
			alert("Enter Date");
			RefForm.date.focus();			
			return false;
		}
		if (RefForm.batch_name.value == 0 )
		{
			alert("Select Batch");
			RefForm.batch_name.focus();			
			return false;
		}
		if (RefForm.b_name.value == 0 )
		{
			alert("Select Branch");
			RefForm.b_name.focus();			
			return false;
		}
		if (RefForm.sem_name.value  == 0 )
		{
			alert("Select Semester");			
			RefForm.sem_name.focus();
			return false;
		}*/
		if (RefForm.fac_name.value == 0 )
		{
			alert("Select Faculty Name.");			
			RefForm.fac_name.focus();
			return false;
		}
		if (RefForm.sub_name.value == 0 )
		{
			alert("Select Subject");
			RefForm.sub_name.focus();			
			return false;
		}
		alert("Test");
		
		
}
</script>
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
