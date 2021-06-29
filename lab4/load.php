<!DOCTYPE html>  
 <html>  
      <head>  
        <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body style="background-color:rgb(204, 255, 204);">  
          <h1>Account</h1>
<div class="menu">

<?php include 'promenu.php';?>

</div>

        <div class="container" style="width:500px;">              
                
                          <?php   
                          session_start();
                          echo '<img src="uploads/prs.png" alt="PP" width="270" height="300">'.'<br>';
                          $data = file_get_contents("data.json");  
                          

                          $data = json_decode($data, true); 
                          $array_data[] = $data;
                          foreach($array_data as $entity)  
                          { 
                          echo
                               "Name : ".$entity["name"]."<br>".
                               "E-mail : ".$entity["e-mail"]."<br>".
                               "User name : ".$entity["username"]."<br>".
                               "Gender : ".$entity["gender"]."<br>".
                               "Date of birth : ".$entity["dob"];
                          }
                          
                          ?>  
                     <!-- </table>  
                   </div> -->
                 </div>
      </body>  
 </html>  