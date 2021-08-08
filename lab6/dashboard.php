<?php
    session_start(); 
    require_once 'controller/profInfo.php';
    
    $profile = fetchProfile($_SESSION['id']);
    if(!$_SESSION['id']){
        header('location:login.php');
    }
    if (isset($_COOKIE['email'])) {
        
        $mail = $_COOKIE['email'];
    
        echo "Cookies Set Successfuly <br>",$mail;
    }
    else{
    
         echo "cookie timeout";
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
<body style="background-color:rgb(97, 105, 116);">  
<div class="menu">
      <?php include 'menu.php';?>
      </div>
           <br />
<h1>Account</h1>
<div class="container mt-4">
<h1>Welcome <?php echo ucfirst($_SESSION['name']); ?></h1>
<h1 align="left"><img width="100px" height="100px" src="uploads/<?php echo $profile['image'] ?>" alt="<?php echo $profile['name'] ?>"></h1>
<hr>
</div>
	

<div class="menu">
<?php include 'promenu.php';?>
</div>


</body>
</html>