<?php  
require_once 'controller/productInfo.php';

$product = fetchProduct($_GET['id']);


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>
<fieldset style="border: 5px solid #5eff00; width: 10px">
  			<legend style="background-color:rgb(6, 135, 255);">DELETE PRODUCT </legend>
<table>
	<tr>
		<th>Equipment</th>
		<th>Model</th>
		<th>Quantity</th>
		<th>Price</th>
		
	</tr>
	<tr>
        <td><?php echo $product['Equipment'] ?></td>
		<td><?php echo $product['Model'] ?></td>
		<td><?php echo $product['Quantity'] ?></td>
		<td><?php echo $product['Price'] ?></td>
		
	</tr>

</table>
<a href="controller/deleteProduct.php?id=<?php echo $product['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">DELETE</a>

</fieldset>
</body>
</html>