<?php
 session_start();
 if(!isset($_SESSION['mail']))
 {
	 header("location:log.php");
 }
 include 'connection.php';

 $s="select SUBSTRING(fid,1,1) from register where mail='$_SESSION[mail]' "; 
$result=mysqli_query($con,$s);
$row = mysqli_fetch_assoc($result);


 echo $row[$result];
 mysqli_close($con);

?>