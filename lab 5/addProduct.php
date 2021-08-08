<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php
        include "nav.php";
     ?>

<form action="controller/createProduct.php" method="POST" enctype="multipart/form-data">
    
 <fieldset style="border: 5px solid #5eff00; width: 10px">
  <legend style="background-color:rgb(6, 135, 255);">Add Sports Equipment </legend>
  <label for="seqm">Sports Equipment:</label><br>
  <input type="text" id="seqm" name="seqm"><br>
  <label for="model">Model No:</label><br>
  <input type="text" id="model" name="model"><br>
  <label for="quantity">Quantity:</label><br>
  <input type="number" id="quantity" name="quantity"><br>
  <label for="price">Price:</label><br>
  <input type="number" id="price" name="price"><br>
  <input type="submit" name = "addproduct" value="Add">
  <input type="reset"> 
  </fieldset>
</form> 

</body>
</html>

