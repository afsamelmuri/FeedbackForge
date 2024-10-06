<?php
 $connect = mysqli_connect("localhost","root","","feedbackproject") or die("Unable to Connect");
if(!$connect)
{

    echo '<script type="text/javascript"> alert("Not connected");
     window.location = "signin.php" </script>';
}
?>