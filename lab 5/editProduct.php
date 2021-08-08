<?php

require_once 'controller/productInfo.php';

$product = fetchProduct($_GET['id']);

 include "nav.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="controller/updateProduct.php" method="POST" enctype="multipart/form-data">
 <fieldset style="border: 5px solid #5eff00; width: 10px">
  <legend style="background-color:rgb(6, 135, 255);">Edit Sports Equipment </legend>
 <label for="seqm">Equipment:</label><br>
  <input value="<?php echo $product['Equipment'] ?>" type="text" id="seqm" name="seqm"><br>
  <label for="model">Model No. :</label><br>
  <input value="<?php echo $product['Model'] ?>" type="text" id="model" name="model"><br>
  <label for="quantity">Quantity:</label><br>
  <input value="<?php echo $product['Quantity'] ?>" type="number" id="quantity" name="quantity"><br>
  <label for="price">Price:</label><br>
  <input value="<?php echo $product['Price'] ?>" type="number" id="price" name="price"><br>
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateProduct" value="Update">
  <input type="reset"> 
  </fieldset>
</form> 

</body>
</html>

