<?php  
session_start();
 $message = '';  
 $error = '';  

$unameErr=$emailErr=$nameErr=$genderErr=$dobErr="";
 
require_once('controller/profInfo.php');

 $profile = fetchProfile($_SESSION['id']);
?>
 <!DOCTYPE html>
 <html>
      <head>
           <title></title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>
      <body style="background-color:rgb(97, 105, 116);">
      <div class="menu">
      <?php include 'menu.php';?>
      </div>
           <br /> 
           <h1>Account</h1>
<div class="menu">
<?php include 'promenu.php';?>
</div>
<br />
           <div class="container" style="width:500px;">  
                <h3 align="">Edit Profile</h3><br />
           <form action="controller/updateProf.php" method="POST" enctype="multipart/form-data">  
                     <?php
                     if(isset($error))  
                     {
                          echo $error;
                     }  
                     ?>
                     <br />
                     <label>Name</label>
                     <input value="<?php echo $profile['name'] ?>" type="text" id="name" name="name"><br />
                     <label>E-mail</label>
                     <input value="<?php echo $profile['email']?>" type="text" id="email" name="email"><br />
                     <label>User Name</label>
                     <input value="<?php echo $profile['username'] ?>" type="text" id="username" name="username"><br />
                     <span class="error">* <?php echo $unameErr;?></span><br>
                    <fieldset>
                    <legend for="email">Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label><br>
                     <span class="error">* <?php echo $genderErr;?></span><br>

                     <legend>Date of Birth:</legend>
                     <input value="<?php echo $profile['dateofbirth'] ?>" type="date" id="dob" name="dob"> <br><br>
                     <span class="error">* <?php echo $dobErr;?></span><br>
                     </fieldset>
                     <input type="hidden" name="id" value="<?php echo $profile['id'] ?>">
                     <input type="submit" name="updateProfile" value="Update"><br />                      
                     <?php
                     if(isset($message))
                     {
                          echo $message;
                     }
                     ?>
                     
                </form> 
           </div>  
           <br />  
      </body>  
 </html> 