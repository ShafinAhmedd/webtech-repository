<?php

require_once 'db_connect.php';

function updateProfile($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE member set `name` = ?, email = ?, username = ?, gender =?, dateofbirth=?, `image`=? where id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['email'], $data['username'], $data['gender'], $data['dateofbirth'], $data['image'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updatePP($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE member set `image`=? where id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['image'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showProfile($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `member` where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function showAllProfiles(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `member` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function changePass($id, $psw){
    $conn = db_conn();
    $selectQuery = "UPDATE member set `password` = ? where id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$psw['cnfpsw'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showPass($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `member` where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}