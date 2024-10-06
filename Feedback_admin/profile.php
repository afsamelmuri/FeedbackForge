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
</head><body>
<br/>
<br/>
<br/>
<br/>
<br/>
<h3 align="center" style="background-color:#000000;color:#FFFFFF; font-size:18px; padding: 5px;">Dashboard </h3>
<TABLE border="1" class="responsive" style="margin:10px;">
  <thead>
    <TR style="background-color:#FF9933; color:#FFFFFF;">
      <Td>TOTAL FEEDBACKS
        </TH>
      <Td>TOTAL STAFF
        </TH>
      <Td>TOTAL REGISTERED STUDENT
        </TH>
    </TR>
  </thead>
  <tbody>
    <?php 
	 $row=getdash();
?>
    <TR>
      <TH><?php echo $row[2];?></TH>
      <TH><?php echo $row[1];?></TH>
      <TH><?php echo $row[0]; ?></TH>
  </tbody>
</TABLE>
<footer style="bottom:0; position:fixed; width:100%; height:50px; padding:0;">
  <div class="container">
    <div class="row" align="center">
      <p class="white"></p>
    </div>
  </div>
</footer>
</body>
</html><?php
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
