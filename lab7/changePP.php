<?php  
session_start();
 $message = '';  
 $error = '';  

$imageErr="";
 
?>
 <!DOCTYPE html>
 <html>
      <head>
           <title></title>
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <link rel="stylesheet" href="style.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>
      <body style="background-color:rgb(97, 105, 116);">
      <div class="header">
    <div class="col-3 col-s-12">
    <div class="menu">
      <?php include 'menu.php';?>
      </div>
</div>
           <br /> 
           <h1>Change Profile Picture Change</h1>
           </div>
<div class="pofmenu">
<?php include 'promenu.php';?>
</div>
<br />
           <div class="container" style="width:500px;">  
                <h3 align="">Change Profile Picture</h3><br />
           <form action="controller/updatePP.php" method="POST" enctype="multipart/form-data">  
                     <?php
                     if(isset($error))  
                     {
                          echo $error;
                     }
                     ?>
                     <br />
                     <input type="file" name="image" /><br><br>
                     <span class="error">* <?php echo $imageErr;?></span> <br />
                     
                     <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                     <input type="submit" name="updatePP" value="upload"><br />                      
                     <?php
                     if(isset($message))
                     {
                          echo $message;
                     }
                     ?>
                     
                </form> 
           </div>  
           <br />
           <div class="footer">
    <footer style="text-align: center">&copy; Copyright 2021</footer>
</div>  
      </body>  
 </html> 