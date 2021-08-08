<?php  
require_once '../model/model.php';


if (isset($_POST['updateProduct'])) {
	$data['seqm'] = $_POST['seqm'];
	$data['model'] = $_POST['model'];
	$data['quantity'] = $_POST['quantity'];
	$data['price'] = $_POST['price'];
	
	if (updateProduct($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  
  	header('Location: ../showProduct.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>