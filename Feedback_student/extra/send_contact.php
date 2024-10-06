<?php 
date_default_timezone_set('Asia/Kolkata');
$name       =   $_REQUEST['name'];
$emailid	=	$_REQUEST['email'];
$phoneno	=	$_REQUEST['mobile'];
$comment	=	$_REQUEST['comment'];



$conect = mysql_connect("localhost", "USER", "PASSWORD");
mysql_select_db("DATABASE_NAME", $conect);

$sql = "insert into  TABLE_NAME set name='".$name."', email='".$emailid."', phone='".$phoneno."', message='".$comment."', source='Demo Enquiry Page'";

$sql = @mysql_query($sql);

mysql_close($conect);


echo '<p style="padding:8px; color:red; padding-left:10px; font:normal 12px arial; width:425px; margin: 10px auto 0;">Your enquiry has been submitted successfully. </p>';

?>