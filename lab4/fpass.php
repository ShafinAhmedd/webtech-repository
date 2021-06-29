<?php  
 $msg = '';  
 $error = '';  
 $data = file_get_contents('data.json');
$arr = json_decode($data, true);

$em = $arr["e-mail"];

if (isset($_POST['email'])) {
	if ($_POST['email']==$em) {
		$_SESSION['email'] = $em;
		header("location:chgpass.php");
	}
	else{
		$msg="Invalid E-mail";
		// echo "<script>alert('uname or pass incorrect!')</script>";
	}

}
 if(isset($_POST["submit"]))  
 {  
    if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }
    }
    ?> 
<!DOCTYPE HTML>
<html>  
<head>  
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body style="background-color:rgb(6, 197, 255);">
      <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">FORGOT PASSWORD</h3><br />

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     
<br />


E-mail: <input type="text" name="email" class="form-control" /><br />
<button type="submit" value="fpass">Submit</button><br />
<?php  
                     if(isset($msg))  
                     {  
                          echo $msg;
                     }  
                     ?> 
</form>

</body>
</html>
