<?php
$cpsw=$npsw=$cnfpsw=$msg="";
$cpswErr=$npswErr=$cnfpswErr="";
$data = file_get_contents('data.json');
$arr = json_decode($data, true);

$ps = $arr["password"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cpsw"])) {
    $cpswErr = "Current Password is required";
  } else {
    $cpsw = test_input($_POST["cpsw"]);
    
    if (isset($_POST['cpsw'])) {
      if ($_POST['cpsw']==$ps) {
        $_SESSION['cpsw'] = $ps;
        header("location:chgpass.php");
        
      }
      else{
        $msg="Invalid PASSWORD";
        // echo "<script>alert('Password is incorrect!')</script>";
      }
    
    }
  }
  if (empty($_POST["npsw"])) {
    $npswErr = "New Password is required";
  } else {
    $npsw = test_input($_POST["npsw"]);
    
    if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$cpsw)) {
      $cpswErr = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
      $cpsw="";
    }if (strchr($npsw,$cpsw)) {
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
    } else{
      $ps=$_POST["cnfpsw"];
      $newJsonString = json_encode($arr);
      file_put_contents('data.json', $newJsonString);
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
<body style="background-color:rgb(204, 255, 204);">
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
<?php  
  if(isset($msg))  
   {  
     echo $msg;
    }  
?> 
</form>
</div>  
<br />  
</body>
</html>