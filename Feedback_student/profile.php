<?php
session_start();
if (isset($_SESSION['login_user_email'])) 
{
include("profileheader.php");
include("connect.php");
include("process.php");
$REG=$_SESSION['login_user_reg']; 
?>
<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
	
}

th, td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}
</style>
<?php


?>

</head>
<body>


<P style="margin: 128PX 10px 10px 10px;text-align:justify;" class="container"> <font size="+3" color="#3333CC">Importance of Feedback:</font><br/>
  <font color="#FF6633"> Feedback is an important function of education.It is a power in students to raise concerns about teaching quality. To ensure a good evolution of the learning process, it is necessary for the pupil to receive information about progress and results. How the educational function is best fulfilled depends on the learning material, the learner, and the learning situation. In the best case, a teacher or tutor is present during the learning process who with his knowledge of the material provides for periodic testing and feedback.</font> </P>
<TABLE border="1" class="responsive" style="margin:10px;">
  <caption>Subject Wise Analysis</caption>
	<thead>
  <TR style="background-color:#FF9933; color:#FFFFFF;"> 

    <Td>SUBJECT</TH>
    <TH>SEMESTER</TH>

    <TH scope="col">Q1</TH>
    <TH scope="col">Q2</TH>
    <TH scope="col">Q3</TH>
    <TH scope="col">Q4</TH>
    <TH scope="col">Q5</TH>
    <TH scope="col">Q6</TH>
    <TH scope="col">Q7</TH>
    <TH scope="col">Q8</TH>
    <TH scope="col">Q9</TH>
    <TH scope="col">Q10</TH>	<TH>FEEDBACK DATE-TIME</TH>
  </TR></thead><tbody>
<?php 
	  $row=getfeedbacks($REG);
	  while($r=mysqli_fetch_array($row))
	  {
	  $sub_id=$r[2];
?>
    <TR> 
    <TH><?php $res=getsubjects($sub_id); echo $res;?></TH>
    <TH><?php echo $r[15];?></TH>
    <TH><?php echo $r[4];?></TH>
    <TH><?php echo $r[5];?></TH>
    <TH><?php echo $r[6];?></TH>
    <TH><?php echo $r[7];?></TH>
    <TH><?php echo $r[8];?></TH>
    <TH><?php echo $r[9];?></TH>
    <TH><?php echo $r[10];?></TH>
    <TH><?php echo $r[11];?></TH>
    <TH><?php echo $r[12];?></TH>
    <TH><?php echo $r[13];?></TH>	
	<TH><?php echo $r[3];?></TH>

  </TR>
<?php
		}
?>


</tbody></TABLE>

	
<footer style="bottom:0; position:fixed; width:100%; height:50px; padding:0;">
  <div class="container">
    <div class="row" align="center">
      <p class="white">Help us save papers</p>
    </div>
  </div>
</footer>
</body></html><?php
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
