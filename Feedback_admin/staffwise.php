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
 $row=getfdbk();
 $st_count=getdash();
$count=mysqli_num_rows($row);

?>

</head>
<body>

<br/>
<br/><br/><br/><br/><br/>
<div align="center" style="background-color:#000000;color:#FFFFFF; font-size:18px; padding: 5px;">
<?php echo "Total ".$st_count[0]." Students given  ".$count." feedback(s).";?>
</div>

	<br/>
	
	
	<TABLE border="1" class="responsive" style="margin:10px;">

	<thead>
	<tr style=""><th colspan="3" style="text-align:center;background-color:#FFCC00; font-size:20px;">Staff Details</th><th colspan="1" style="background-color:#00CC00; font-size:20px;">Progress</th><th colspan="10" style="text-align:center;background-color:#000066; color:#FFFFFF; font-size:20px;">Teaching Quality Attributes Analysis</th></tr>
  <TR style="background-color:#FF9933; color:#FFFFFF;"> 
  <Td>BRANCH</TH>
<Td>STAFF NAME</TH>
    <Td>SUBJECT</TH>
	<TH>Total %</TH>
    <TH scope="col">Planning</TH>
    <TH scope="col">understanding</TH>
    <TH scope="col">Punctuality</TH>
    <TH scope="col">basics</TH>
    <TH scope="col">subject Effectiveness</TH>
    <TH scope="col">Coverage</TH>
    <TH scope="col">Encourage</TH>
    <TH scope="col">Availability</TH>
    <TH scope="col">knowledge</TH>
    <TH scope="col">Usefullness</TH>	
  </TR></thead><tbody>
<?php 
	  $row=getstafffeedbacks();
	  while($r=mysqli_fetch_array($row))
	  {
	  $sub_id=$r[1];
	  $reg=$r[1];
	  
	  
?>
    <TR> 
	<TH><?php  echo getdepartment($sub_id);?></TH>
	<TH><?php $staffname=getstaffname($sub_id); echo $staffname;?></TH>
    <TH><?php $res=getsubjects($sub_id); 	echo $res;?></TH>
	<TH ><?php echo ((($r[2]+$r[3]+$r[4]+$r[5]+$r[6]+$r[7]+$r[8]+$r[9]+$r[10]+$r[11])/100)*100)." %"; ?></TH>
    <TH><?php echo $r[2]."/".($r[0]*5)."=".(($r[2]/($r[0]*5))*100)." %";?></TH>
	<TH><?php echo $r[3]."/".($r[0]*5)."=".(($r[3]/($r[0]*5))*100)." %";?></TH>
    <TH><?php echo $r[4]."/".($r[0]*5)."=".(($r[4]/($r[0]*5))*100)." %";?></TH>
    <TH><?php echo $r[5]."/".($r[0]*5)."=".(($r[5]/($r[0]*5))*100)." %";?></TH>
    <TH ><?php echo $r[6]."/".($r[0]*5)."=".(($r[6]/($r[0]*5))*100)." %";?></TH>
    <TH ><?php echo $r[7]."/".($r[0]*5)."=".(($r[7]/($r[0]*5))*100)." %";?></TH>
    <TH ><?php echo $r[8]."/".($r[0]*5)."=".(($r[8]/($r[0]*5))*100)." %";?></TH>
    <TH><?php echo $r[9]."/".($r[0]*5)."=".(($r[9]/($r[0]*5))*100)." %";?></TH>
    <TH ><?php echo $r[10]."/".($r[0]*5)."=".(($r[10]/($r[0]*5))*100)." %";?></TH>
    <TH ><?php echo $r[11]."/".($r[0]*5)."=".(($r[11]/($r[0]*5))*100)." %";?></TH>
    

  </TR>
<?php
		}
?>


</tbody></TABLE><br/><br/><br/>
	

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
