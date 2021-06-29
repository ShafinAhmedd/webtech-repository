<?php
session_start();
$time = time();
if(!empty($_POST["remember"])) {
	setcookie ("uname",$_POST["uname"],time()+ 10);
	setcookie ("psw",$_POST["psw"],time()+ 10);
	echo "Cookies Set Successfuly <br>";
	echo "Welcome ". $_POST["uname"]."<br>";
} else {
	setcookie("uname","");
	setcookie("psw","");
	echo "Cookies Not Set."."<br>";
}if (isset($_SESSION['uname'])) {
	echo "<h1> Welcome ".$_SESSION['uname']."</h1>";
	echo "<a href='product.php'>Product</a><br>";
	

}
else{
	    //  <!-- echo "Invalid Session <br>"; -->
		 header("location:login.php");
		// echo "<script>location.href='login.php'</script>";
	}

	
?>
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:rgb(204, 255, 204);">  


<h1>Account</h1>
<div class="menu">
<?php include 'promenu.php';?>
</div>


</body>
</html>

<!-- <p><a href="login.php"> Go to Login Page </a> </p> -->