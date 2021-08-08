<?php  
 session_start();
 $message = '';
 $error = '';
 $username=$psw=$password=$email=$image="";
 $unameErr=$pswErr=$cnfpswErr=$emailErr=$imageErr="";


require_once('model/db_connect.php');
 if(isset($_POST["submit"]))
 {  

   if(empty($_POST["name"]))  
      {
          $error = "<label class='text-danger'>Enter Name</label>";
      }
      if (empty($_POST["email"])) {
          $emailErr = "Email is required";
        } else {
          $email = trim($_POST['email']);
          
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email="";
          }
        }
      if (empty($_POST["username"])) {
          $unameErr = "Name is required";
        } else {
          $username = trim($_POST['username']);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' 0-9]*$/",$username)) {
            $unameErr = "alpha numeric characters, period,dash or underscore only";
            $username="";
            
          }if(str_word_count($username)<2)
          {
            $unameErr="Less then two Word";
            $username="";
            
          }
     }if (empty($_POST["psw"])) {
          $pswErr = "Password is required";
          
        } else {
          $psw = test_input($_POST["psw"]);
          // check if name only contains letters and whitespace
          if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$psw)) {
            $pswErr = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
            $psw="";
            
        }
       }
       if (empty($_POST["password"])) {
          $cnfpswErr = "Confirm Password is required";
        } else {
          $password = trim($_POST['password']);
          $options = array("cost"=>4);
          $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
         
           
          if($psw != $password){
            $cnfpswErr = "Password must match with the Retyped Password";
            $password="";
          }
        }

      if(empty($_POST["gender"]))  
      {
           $error = "<label class='text-danger'>Gender,Name,e-mail cannot be empty</label>";  
      }
      if ($_FILES["image"]["error"] != 0) {
        $imageErr = "file required";
      } else {
        $targetDir = "uploads/";
        $fileName = basename($_FILES['image']['name']);
        $file_tmp =$_FILES['image']['tmp_name'];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        move_uploaded_file($file_tmp,$targetFilePath);
        }
      if (empty($error) && empty($emailErr) && empty($unameErr) && empty($pswErr) && empty($cnfpswErr) && empty($imageErr)) {

        $name = trim($_POST['name']);
        $gender = trim($_POST['gender']);
        $dob = trim($_POST['dob']);
        

        $conn = db_conn();
	      $sql = 'select * from member where email = :email';
            $stmt = $conn->prepare($sql);
            $p = ['email'=>$email];
            $stmt->execute($p);
            
            if($stmt->rowCount() == 0)
            {
                $sql = "insert into member (name, username, email, password, gender, dateofbirth, image) values(:name,:username,:email,:pass,:gender,:dob,:image)";
            
                try{
                    $handle = $conn->prepare($sql);
                    $params = [
                        ':name'=>$name,
                        ':username'=>$username,
                        ':email'=>$email,
                        ':pass'=>$hashPassword,
                        ':gender'=>$gender,
                        ':dob'=>$dob,
                        ':image'=>$fileName
                    ];
                    
                    $handle->execute($params);
                    
                    $success = 'User has been created successfully';
                    
                }
                catch(PDOException $e){
                    $errors[] = $e->getMessage();
                }
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
      <body style="background-color:rgb(97, 105, 116);">  
      <div class="menu">
      <?php include 'menu.php';?>
      </div>
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Registration</h3><br /> 
                <?php 
                if(isset($success))
                {
                    
                    echo '<div class="alert alert-success">'.$success.'</div>';
                }
                ?>     

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <div class="form-group">
                     <label for="email">Name</label>  
                     <input type="text" name="name" class="form-control" /><br />
                     </div>  
                     <div class="form-group">
                     <label for="email">E-mail</label>
                     <input type="text" name="email" class="form-control" value="<?php echo $email;?>"><br />
                     <span class="error">* <?php echo $emailErr;?></span><br />
                     </div> 
                     <div class="form-group">
                     <label for="email">User Name</label>
                     <input type="text" name = "username" value="<?php echo $username;?>" class="form-control" /><br />
                     <span class="error">* <?php echo $unameErr;?></span><br>
                    </div>
                    <div class="form-group">
                     <label for="email">Password</label>
                     <input type="password" name = "psw" value="<?php echo $psw;?>" class="form-control" /><br />
                     <span class="error">* <?php echo $pswErr;?></span><br>
                    </div>
                    <div class="form-group">
                     <label for="email">Confirm Password</label>
                     <input type="password" name = "password" value="<?php echo $password;?>" class="form-control" /><br />
                     <span class="error">* <?php echo $cnfpswErr;?></span> <br />
                    </div>
                    <fieldset>
                    <div class="form-group">
                    <legend for="email">Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label><br>
                    </div>
                    <div class="form-group">
                     <legend for="email">Date of Birth:</legend>
                     <input type="date" name="dob"> <br><br>
                    </div>
                    <label for="email">image</label>
                    <input type="file" name="image" /><br><br>
                    <span class="error">* <?php echo $imageErr;?></span> <br />
                    </fieldset> 
                     <input type="submit" name ="submit" value="submit" class="btn btn-info" /><br />                      
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