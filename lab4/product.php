<?php 

session_start();

if (isset($_SESSION['uname'])) {
	echo "<h1> Welcome ".$_SESSION['uname']."</h1>";
	echo "<h2>Welcome to Sports Club</h2>";
	echo "<br><a href='welcome.php'>back to welcome</a>";
}

else{
	header("location:login.php");
}

 ?>