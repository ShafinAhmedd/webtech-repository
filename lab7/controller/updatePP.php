<?php

require_once '../model/model.php';

if (isset($_POST['updatePP'])) 
{if ($_FILES["image"]["error"] != 0) {
    $imageErr = "file required";
    echo '<a href="../changePP.php" style="color: blue">Back</a> <br>';
}else{
	$data['image'] = basename($_FILES["image"]["name"]);
    $target_dir = "../uploads/";
	  $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $file_tmp =$_FILES['image']['tmp_name'];
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
    move_uploaded_file($file_tmp,$target_file);
    if (updatePP($_POST['id'], $data)){
  	header('Location: ../viewprof.php?id='.$_POST["id"]);
  }
  else{
    header('Location:changePP.php');
  }
}
if(isset($imageErr))
{
     echo $imageErr;
}

}

?>