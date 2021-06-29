<?php  
 $message = '';  
 $error = '';  
 $uname=$psw=$cnfpsw="";
 $unameErr=$pswErr=$cnfpswErr="";
 if(isset($_POST["submit"]))  
 {  
     if(empty($_POST["name"]))  
      {  
          $error = "<label class='text-danger'>Enter Name</label>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }  
      if (empty($_POST["uname"])) {
          $unameErr = "Name is required";
        } else {
          $uname = test_input($_POST["uname"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' 0-9]*$/",$uname)) {
            $unameErr = "alpha numeric characters, period,dash or underscore only";
            $uname="";
            
          }if(str_word_count($uname)<3)
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
          if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$psw)) {
            $pswErr = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
            $psw="";
            
        } 
       }
       if (empty($_POST["cnfpsw"])) {
          $cnfpswErr = "Confirm Password is required";
        } else {
          $cnfpsw = test_input($_POST["cnfpsw"]);
         
          // if (!strchr($psw,$cnfpsw)) 
          if($psw != $cnfpsw){
            $cnfpswErr = "Password must match with the Retyped Password";
            $cnfpsw="";
          }
        }
       
      if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Gender cannot be empty</label>";  
      } 
       
      else  
      {  
          if(file_exists('data.json')) 
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["uname"], 
                     'password'    =>   $_POST["cnfpsw"],
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"]  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
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
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body style="background-color:rgb(204, 255, 204);">  
      <div class="menu">
      <?php include 'menu.php';?>
      </div>
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Append Data to JSON File</h3><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <label>Name</label>  
                     <input type="text" name="name" class="form-control" /><br />  
                     <label>E-mail</label>
                     <input type="text" name = "email" class="form-control" /><br />
                     <label>User Name</label>
                     <input type="text" name = "uname" value="<?php echo $uname;?>" class="form-control" /><br />
                     <span class="error">* <?php echo $unameErr;?></span><br>
                     <label>Password</label>
                     <input type="password" name = "psw" value="<?php echo $psw;?>" class="form-control" /><br />
                     <span class="error">* <?php echo $pswErr;?></span><br>
                     <label>Confirm Password</label>
                     <input type="password" name = "cnfpsw" value="<?php echo $cnfpsw;?>" class="form-control" /><br />
                     <span class="error">* <?php echo $cnfpswErr;?></span> <br />
                    <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label><br>

                     <legend>Date of Birth:</legend>
                     <input type="date" name="dob"> <br><br>
                    </fieldset> 
                     
                     <input type="submit" name="submit" value="Append" class="btn btn-info" /><br />                      
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