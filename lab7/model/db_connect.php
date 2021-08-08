<?php 
function db_conn()
{  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student";

    try {
        $conn = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        dir('Error: Cannot connect');
	echo "PDO error".$e->getMessage();
	die();
    }
    return $conn;
}
?>