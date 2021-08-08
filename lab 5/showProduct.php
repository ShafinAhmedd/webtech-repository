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

<table>
	<tr>
		<th>Equipment</th>
		<th>Model</th>
		<th>Quantity</th>
		<th>Price</th>
		
	</tr>
	<tr>
		<td><a href="showProduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['Equipment'] ?></a></td>
		<td><?php echo $product['Model'] ?></td>
		<td><?php echo $product['Quantity'] ?></td>
		<td><?php echo $product['Price'] ?></td>
		
	</tr>

</table>


</body>
</html>