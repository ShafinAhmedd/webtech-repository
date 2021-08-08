<?php  
session_start();
require_once('model/model.php');
$cpsw=$npsw=$cnfpsw="";
$cpswErr=$npswErr=$cnfpswErr="";
$error="";
function fetchPass($id){

	return showPass($id);

} 
$pass = fetchPass($_SESSION['id']);


if (isset($_POST['changePass'])) {

  if (empty($_POST["cpsw"])) {
    $error = "<label class='text-danger'>Enter Current Password</label>";
  } else {
    $cpsw = test_input($_POST["cpsw"]);
    // password_verify('rasmuslerdorf', $hash)
    if (password_verify($_POST['cpsw'], $pass['password'])) {
      echo "Valid PASSWORD";
        $cpsw="";
       
      }
    
    }
  
  if (empty($_POST["npsw"])) {
    $error = "<label class='text-danger'>Enter New Password</label>";
  } else {
    $npsw = test_input($_POST["npsw"]);
    
    if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$npsw)) {
      $npswErr = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
      $npsw="";
    }if (strcasecmp($npsw,$cpsw)== 0) {
      $npswErr = "New Password should not be same as the Current Password";
      $npsw="";
    }
  }
  if (empty($_POST["cnfpsw"])) {
    $error = "<label class='text-danger'>Enter Confirm Password</label>";
  } else {
    //$psw['cnfpsw'] = password_hash($_POST['cnfpsw'], PASSWORD_BCRYPT, ["cost" => 12]);
    $cnfpsw = test_input($_POST["cnfpsw"]);
   if (strcasecmp($npsw,$cnfpsw) != 0) {
      $cnfpswErr = "New Password must match with the Retyped Password";
      $cnfpsw="";
    }
  }
  if(empty($error) && empty($cpswErr) && empty($npswErr) && empty($cnfpswErr)){

    
  $psw['cnfpsw'] = password_hash($_POST['cnfpsw'], PASSWORD_BCRYPT, ["cost" => 12]);

  if (changePass($_POST['id'], $psw)) {
  	echo 'Successfully updated!!';
   
  }
}else {
  echo 'Password Not Changed!!';
  
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
<body style="background-color:rgb(97, 105, 116);">
<div class="menu">
      <?php include 'menu.php';?>
      </div>
<br />
<br />
<div class="menu">
	<?php include 'promenu.php';?>
</div>
<div class="container" style="width:350px;">  
<h2 align="center">CHANGE PASSWORD</h2><br />
 <form method="POST" enctype="multipart/form-data">
 <?php   
      if(isset($error))  
      {  
          echo $error;  
      }  
  ?> 

  <label for="password">Current Password:</label><br>
  <input type="password" name="cpsw" id="cpsw" value="<?php echo $cpsw;?>"><br />
  <span class="error">* <?php echo $cpswErr;?></span><br />

  <label for="password">New Password:</label><br>
  <input type="password" name="npsw" id="npsw" value="<?php echo $npsw;?>"><br />
  <span class="error">* <?php echo $npswErr;?></span><br />

  <label for="password">Confirm Password:</label><br>
  <input value="<?php echo $cnfpsw ?>" type="password" id="cnfpsw" name="cnfpsw"><br>
  <span class="error">* <?php echo $cnfpswErr;?></span><br />

  <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">
  <input type="submit" name = "changePass" value="Update">
  <input type="reset"> 
  <div><?php 
if(isset($error)) 
{ echo $error; } 
?>
</div><br />
</form> 

</body>
</html>