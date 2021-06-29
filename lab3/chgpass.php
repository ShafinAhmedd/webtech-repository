<?php
$cpsw=$npsw=$cnfpsw="";
$cpswErr=$npswErr=$cnfpswErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cpsw"])) {
    $cpswErr = "Current Password is required";
  } else {
    $cpsw = test_input($_POST["cpsw"]);
    
    if (!preg_match("/^[_a-z0-9-]+([_a-z0-9-]+)*@[a-z0-9-]+([a-z0-9-]+)*([a-z]{2,3})/",$cpsw)) {
      $cpswErr = "alpha numeric characters, period,dash or underscore only";
      $cpsw="";
    }
  }
  if (empty($_POST["npsw"])) {
    $npswErr = "New Password is required";
  } else {
    $npsw = test_input($_POST["npsw"]);
    
    if (strchr($npsw,$cpsw)) {
      $npswErr = "New Password should not be same as the Current Password";
      $npsw="";
    }
  }
  if (empty($_POST["cnfpsw"])) {
    $cnfpswErr = "New Password is required";
  } else {
    $cnfpsw = test_input($_POST["cnfpsw"]);
   
    if (!strchr($npsw,$cnfpsw)) {
      $cnfpswErr = "New Password must match with the Retyped Password";
      $cnfpsw="";
    }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <meta charset="utf-8">
<title>Password Change</title>

</head>
<body style="background-color:rgb(167, 195, 247);">
<br />
<div class="container" style="width:500px;">  
<p><span class="error"></span></p>
<h2 align="center">CHANGE PASSWORD</h2><br />
<div><?php if(isset($message)) { echo $message; } ?></div><br />
<form method="post" action="" align="center <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br />
Current Password:<br>
<input type="password" name="cpsw" value="<?php echo $cpsw;?>"><span class="error">* <?php echo $cpswErr;?></span><br />
New Password:<br>
<input type="password" name="npsw" value="<?php echo $npsw;?>"><span class="error">* <?php echo $npswErr;?></span>
<br />
Confirm Password:<br>
<input type="password" name="cnfpsw" value="<?php echo $cnfpsw;?>"><span class="error">* <?php echo $cnfpswErr;?></span>
<br />
<input type="submit" value="Submit" name="submit"><br />
</form>
</div>  
<br />  
</body>
</html>