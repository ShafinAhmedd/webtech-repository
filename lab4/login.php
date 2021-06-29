<?php
session_start();
$message = '';  
$error = ''; 
$uname=$psw="";
$unameErr=$pswErr="";

$data = file_get_contents("data.json");
$arr = json_decode($data, true);

$un = $arr['username'];
$ps = $arr['password'];

if (isset($_POST['uname'])) {
	if ($_POST['uname']==$un && $_POST['psw']==$ps) {
		$_SESSION['uname'] = $un;
		header("location:profile.php");
	}
	else{
		$msg="username or password invalid";
		// echo "<script>alert('uname or pass incorrect!')</script>";
	}

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
    <head>
    <style>
    .error {color: #FF0000;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <meta charset="utf-8">
        <title>LOGIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body style="background-color:rgb(204, 255, 204);">
<div class="menu">
      <?php include 'menu.php';?>
      </div>
<br />
<div class="container" style="width:500px;"> 
<p><span class="error">* required field</span></p>
<form method="post" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<br />
<fieldset>
<legend>Login</legend>
  <label for="uname">User Name:</label><br>
  <input type="text" id="uname" name="uname" value="<?php if(isset($_COOKIE["uname"])) { echo $_COOKIE["uname"]; } ?>"><br />
  <span class="error">* <?php echo $unameErr;?></span><br>
  <label for="psw">Password:</label><br>
  <input type="password" id="psw" name="psw" value="<?php if(isset($_COOKIE["psw"])) { echo $_COOKIE["psw"]; } ?>"><br />
  <span class="error">* <?php echo $pswErr;?></span><br>
  <label>
    <input type="checkbox" checked="checked" name="remember"> Remember me<br />
  </label><br>
  <button type="submit" name="login" value="login">Submit</button>
  <span class="psw"><a href="fpass.php">Forgot password?</a></span><br />
   
</fieldset>
<?php  
  if(isset($msg))  
   {  
     echo $msg;
    }  
?> 
</form>
</div> <br />  
</body>
</html>