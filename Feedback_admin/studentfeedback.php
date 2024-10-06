<?php
if(!isset($_SESSION)) 
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
<link  rel="stylesheet" type="text/css" href="css/style.css" />


      <script src="js/fusioncharts.js"></script>
</head>
<body>
<br/><br/><br/><br/>
<TABLE border="1" class="responsive" style="margin:05px;">
  <caption>Subject Wise Analysis</caption>
	<thead>
  <TR style="background-color:#FF9933; color:#FFFFFF;"> 
     <TH scope="col">DEPARTMENT</TH>
	  <TH>USN</TH>
	  <Td>UNAME</TH>
   
   <TH scope="col">SEMESTER</TH>
   
    <TH scope="col">DATEOFBIRTH</TH>
    <TH scope="col">EMAIL</TH>


  </TR></thead><tbody>
<?php 
	  $row=getstudents();
	  while($r=mysqli_fetch_array($row))
	  {
?>
    <TR> 
 	<TH><?php echo $r[4];?></TH>
	<TH><?php echo $r[2];?></TH>
    <TH><?php echo $r[1];?></TH>
    <TH><?php echo $r[3];?></TH>
    <TH><?php echo $r[5];?></TH>
    <TH><?php echo $r[6];?></TH>


  </TR>
<?php
		}
?>


</tbody></TABLE>

	
<footer style="bottom:0; position:fixed; width:100%; height:50px; padding:0;">
  <div class="container">
    <div class="row" align="center">
      <p class="white"></p>
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
