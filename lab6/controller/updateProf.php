<?php

require_once '../model/model.php';


if (isset($_POST['updateProfile'])) {
	if(empty($_POST["name"]))  
     {
         $nameErr = "Name is required";
     }else {
		$profile['name'] = trim($_POST['name']);

     }

     if (empty($_POST["email"])) {
         $emailErr = "Email is required";
       } else {
		$profile['email'] = trim($_POST['email']);

         if (!filter_var($profile['email'], FILTER_VALIDATE_EMAIL)) {
           $emailErr = "Invalid email format";
           $profile['email']="";
         }
       }
     if (empty($_POST["username"])) {
         $unameErr = "Username is required";
       } else {
		$profile['username'] = trim($_POST['username']);

         if (!preg_match("/^[a-zA-Z-' 0-9]*$/",$profile['username'])) {
           $unameErr = "alpha numeric characters, period,dash or underscore only";
           $profile['username']="";

         }
         if(str_word_count($profile['username'])<2)
         {
           $unameErr="Less then two Word";
           $profile['username']="";
           
         }
    }
     if(empty($_POST["gender"]))  
     {
          $genderErr = "Gender is required"; 
     }

     if(empty($_POST["dob"]))  
     {
         $dobErr = "Date of Birth is required";
     }else {
		$profile['dateofbirth'] = trim($_POST['dob']);
     }
     if(empty($error) && empty($unameErr) && empty($unameErr) && empty($unameErr) && empty($unameErr) && empty($genderErr)) {
          
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['username'] = $_POST['username'];
		$data['gender'] = $_POST['gender'];
		$data['dateofbirth'] = $_POST['dob'];
	
		if (updateProfile($_POST['id'], $data)) {
		  echo 'Successfully updated!!';

		  header('Location: ../viewprof.php?id='.$_POST["id"]);
	  }
	} else {
		echo 'You are not allowed to access this page.';
	}

      }

 function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }
?>