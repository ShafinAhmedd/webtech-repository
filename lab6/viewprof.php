<?php  
session_start();
require_once 'controller/profInfo.php';

$profile = fetchProfile($_SESSION['id']);



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
<body style="background-color:rgb(97, 105, 116);>
<div class="menu">
      <?php include 'menu.php';?>
      </div>
           <br /> 
           <h1>Account</h1>
<div class="menu">
<?php include 'promenu.php';?>
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

</table>


</body>
</html>