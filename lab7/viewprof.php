<?php  
session_start();
require_once 'controller/profInfo.php';

$profile = fetchProfile($_SESSION['id']);



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style.css">
	<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body style="background-color:rgb(97, 105, 116)";>
<div class="header">
    <div class="col-3 col-s-12">
    <div class="menu">
      <?php include 'menu.php';?>
      </div>
</div>
           <br /> 
           <h1>View Profile</h1>
		   </div>
<br />
<table>
	<tr>
		<th>Name</th>
		<th>Username</th>
		<th>Email</th> 
		<th>Gender</th>
		<th>Date of Birth</th>
		<th>Image</th>
	</tr>
	<tr>
		<td><a href="viewprof.php?id=<?php echo $profile['id'] ?>"><?php echo $profile['name'] ?></a></td>
		<td><?php echo $profile['username'] ?></td>
		<td><?php echo $profile['email'] ?></td>
		<td><?php echo $profile['gender'] ?></td>
		<td><?php echo $profile['dateofbirth'] ?></td>
		<td><img width="100px" height="100px" src="uploads/<?php echo $profile['image'] ?>" alt="<?php echo $profile['name'] ?>"></td>
	</tr>

</table><div class="pofmenu">
<?php include 'promenu.php';?>
</div>
<div class="footer">
    <footer style="text-align: center">&copy; Copyright 2021</footer>
</div>

</body>
</html>