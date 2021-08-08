<?php
    session_start(); 
    require_once 'controller/profInfo.php';
    
    $profile = fetchProfile($_SESSION['id']);
    if(!$_SESSION['id']){
        header('location:login.php');
    }
    if (isset($_COOKIE['email'])){
        
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
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color:rgb(97, 105, 116);">
<div class="header">
    <div class="col-3 col-s-12">
    <div class="menu">
      <?php include 'menu.php';?>
      </div>
</div>
           <br /><br /><br />
<h1 style="text-align: center" class="aside">Account</h1>
</div>
<h1>Welcome <?php echo ucfirst($_SESSION['name']); ?></h1>
<h1 align="left"><img width="100px" height="100px" src="uploads/<?php echo $profile['image'] ?>" alt="<?php echo $profile['name'] ?>"></h1>
<hr>
<div class="pofmenu">
<?php include 'promenu.php';?>
</div>

<div class="footer">
    <footer style="text-align: center">&copy; Copyright 2021</footer>
</div>
</body>
</html>