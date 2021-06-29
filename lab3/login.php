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
<body style="background-color:rgb(100, 68, 214);">
<br />
<?php
$uname=$psw="";
$unameErr=$pswErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["uname"])) {
    $unameErr = "Name is required";
  } else {
    $uname = test_input($_POST["uname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' 0-9]*$/",$uname)) {
      $unameErr = "alpha numeric characters, period,dash or underscore only";
      $uname="";
    }
    if(str_word_count($uname)<2)
    {
      $unameErr="Less then two Word";
      $uname="";
    }
  }
  if (empty($_POST["psw"])) {
    $pswErr = "Password is required";
  } else {
    $psw = test_input($_POST["psw"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[@#$%])(?=.*[A-Z]).{8,}/",$psw)) {
      $pswErr = "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
      $psw="";
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
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br />
<fieldset>
<legend>Login</legend>
  <label for="uname">User Name:</label><br>
  <input type="text" id="uname" name="uname" value="<?php echo $uname;?>"><br />
  <span class="error">* <?php echo $unameErr;?></span><br>
  <label for="psw">Password:</label><br>
  <input type="text" id="psw" name="psw" value="<?php echo $psw;?>"><br />
  <span class="error">* <?php echo $pswErr;?></span><br>
  <label>
    <input type="checkbox" checked="checked" name="remember"> Remember me<br />
  </label><br>
  <button type="submit">Submit</button>
  <span class="psw">Forgot <a href="#">password?</a></span><br />
</fieldset>
</form>
</body>
</html>