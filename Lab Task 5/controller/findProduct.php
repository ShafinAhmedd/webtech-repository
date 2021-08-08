<?php

require_once '../model/model.php';

if (isset($_POST['findProduct'])) {
	
		echo $_POST['product_name'];

    try {
    	
    	$allSearchedProducts = searchProduct($_POST['product_name']);
    	require_once '../showSearchedProduct.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
}

