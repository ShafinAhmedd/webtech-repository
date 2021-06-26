<?php
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$email="";
	$err_email="";
	$cPass="";
	$err_cPass="";
	$code= "";
	$err_code="";
	$number="";
	$err_number="";
	$day=0;
	$err_day="";
	$month="";
	$err_month="";
	$year=0;
	$err_year="";
	$gender="";
	$err_gender="";
	$prof="";
	$err_prof="";
	$hears=[];
	$err_hear="";
	$bio="";
	$err_bio="";
	$addrs="";
	$err_address="";
	$city="";
	$err_city="";
	$state="";
	$err_state="";
	$zip="";
	$err_zip="";
	
	$hasError=false;
	
	$professions = array("Teaching","Service","Business","Entreprenuer");
	$days = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	$months = array("Jan","Fab","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	$years = array(1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2005);
	
	function hearExist($her){
		global $hears;
		foreach($hears as $h){
			if($h == $her){
				return true;
			}
		}
		return false;
	}
	function numCharCheck($pas){
	    for ($i = 0; $i <= strlen($pas)-1; $i++) {
            if(is_numeric($pas[$i]))  {
                return true;
                break;
            }
        }
		return false;
	}
	function specialCharCheck($pas){
	    for ($i = 0; $i <= strlen($pas)-1; $i++) {
            if(($pas[$i]) == "#" or ($pas[$i])== "?" or ($pas[$i]=="@"))  {
                return true;
                break;
            }
        }
		return false;
	}
	function lowerCharCheck($pas){
	    for ($i = 0; $i <= strlen($pas)-1; $i++) {
            if(ctype_lower($pas[$i]))  {
                return true;
                break;
            }
        }
		return false;
	}
	function upperCharCheck($pas){
	    for ($i = 0; $i <= strlen($pas)-1; $i++) {
            if(ctype_upper($pas[$i]))  {
                return true;
                break;
            }
        }
		return false;
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if(empty($_POST["name"])){
			$err_name="Name Required";
			$hasError = true;
		}
		else{
			$name=htmlspecialchars($_POST["name"]);
		}
		if(empty($_POST["username"])){
			$err_uname="Username Required";
			$hasError = true;
		}
		else if(strlen($_POST["username"]) <=5){
			$err_uname="Username Must be greater than 5 character";
			$hasError = true;
		}
		
		else if(strpos($_POST["username"], " ") > 0){
			$err_uname="Username can not have space";
			$hasError = true;
		}
		
		else{
			$uname=htmlspecialchars($_POST["username"]);
		}
		if(empty($_POST["email"])){
			$err_email="Email Required";
			$hasError = true;
		}
		else if(strpos($_POST["email"], "@")> 0 and (strpos($_POST["email"], ".") > strpos($_POST["email"], "@"))){
			$email=htmlspecialchars($_POST["email"]);
		}
		
		else{
			$err_email="Email is not valid";
			$hasError = true;
		}
		if(empty($_POST["password"])){
			$err_pass="Password Required";
			$hasError = true;
		}
		else if(strlen($_POST["password"]) <=7){
			$err_pass="Password must be atleast 8 charecter";
			$hasError = true;
		}
		else if(!specialCharCheck($_POST["password"])){
			$err_pass="Password must have special charecter";
			$hasError = true;
		}
		else if(!numCharCheck($_POST["password"])){
			$err_pass="Password must have a number";
			$hasError = true;
		}
	    else if(!(lowerCharCheck($_POST["password"]) and upperCharCheck($_POST["password"]))){
			$err_pass="Password must be a combination of Upper and Lower case";
			$hasError = true;
		}
		
		else{
			$pass=htmlspecialchars($_POST["password"]);
		}
		
		if(empty($_POST["code"])){
			$err_code="Code Required";
			$hasError = true;
		}
		else if(!is_numeric($_POST["code"])){
			$err_code="Code Must be a number";
			$hasError = true;
		}
		
		else{
			$code=htmlspecialchars($_POST["code"]);
		}
		
		if(empty($_POST["number"])){
			$err_number="Number Required";
			$hasError = true;
		}
		else if(!is_numeric($_POST["number"])){
			$err_number="Must be a number";
			$hasError = true;
		}
		
		else{
			$number=htmlspecialchars($_POST["number"]);
		}
		
		if(empty($_POST["cPass"])){
			$err_cPass="Confirm Password Required";
			$hasError = true;
		}
		else if($_POST["cPass"] != $_POST["password"]){
			$err_pass="Password doesen't match!";
			$hasError = true;
		}
		
		else{
			$cPass=htmlspecialchars($_POST["cPass"]);
		}
		
		if(empty($_POST["address"])){
			$err_address="Street number Required";
			$hasError = true;
		}
		
		else{
			$addrs=htmlspecialchars($_POST["address"]);
		}
		
		if(empty($_POST["city"])){
			$err_city="City Required";
			$hasError = true;
		}
		
		else{
			$city=htmlspecialchars($_POST["city"]);
		}
		if(empty($_POST["state"])){
			$err_state="State Required";
			$hasError = true;
		}
		
		else{
			$state=htmlspecialchars($_POST["state"]);
		}
		
		if(empty($_POST["zip"])){
			$err_zip="Zip Required";
			$hasError = true;
		}
		
		else{
			$zip=htmlspecialchars($_POST["zip"]);
		}
		if(!isset($_POST["gender"])){
			$err_gender="Gender Required";
			$hasError = true;
		}
		else{
			$gender =htmlspecialchars($_POST["gender"]);
		}
		if(!isset($_POST["day"])){
			$err_day = "Select Day";
			$hasError = true;
		}
		else{
			$day = htmlspecialchars($_POST["day"]);
		}
		if(!isset($_POST["month"])){
			$err_month = "Select Month";
			$hasError = true;
		}
		else{
			$month = htmlspecialchars($_POST["month"]);
		}
		if(!isset($_POST["year"])){
			$err_year = "Select Year";
			$hasError = true;
		}
		else{
			$year = htmlspecialchars($_POST["year"]);
		}
		if(!isset($_POST["hears"])){
			$err_hear="Required";
			$hasError = true;
		}
		else{
			$hears = ($_POST["hears"]);
		}
		if(empty($_POST["bio"])){
			$err_bio="Bio Required";
			$hasError = true;
		}
		else{
			$bio = htmlspecialchars($_POST["bio"]);
		}
		
		if(!$hasError){
			echo $name."<br>";
			echo $_POST["username"]."<br/>";
			echo $_POST["email"]."<br/>";
			echo $_POST["code"]."-".$_POST["number"]."<br/>";
			echo $_POST["day"]."-".$_POST["month"]."-".$_POST["year"]."<br/>";
			echo $_POST["address"]."-".$_POST["zip"]."<br/>";
			echo $_POST["gender"]."<br/>";
			echo $_POST["bio"]."<br/>";
			
			$arr = $_POST["hears"];
			
			foreach($arr as $e){
				echo "$e <br>";
			}
		}
		
		
	}
?>
<html>
	<head>
		<title>REGISTRATION</title>
	</head>
	<body>
		<fieldset>
			<form action="" method="post">
				<table >
					<tr>
						<td align="right">Name: </td>
						<td><input type="text" name="name" value="<?php echo $name;?>"></td>
						<td><span><?php echo $err_name;?></span></td>
						
					</tr>
					<tr>
						<td align="right">Username: </td>
						<td><input type="text" name="username" value="<?php echo $uname;?>" ></td>
						<td><span><?php echo $err_uname;?></span></td>
					</tr>
					<tr>
						<td align="right">Password: </td>
						<td><input type="password" name="password" value="<?php echo $pass;?>"></td>
						<td><span><?php echo $err_pass;?></span></td>
					</tr>
					
					<tr>
						<td align="right">Confirm Password: </td>
						<td><input type="password" name="cPass" value="<?php echo $cPass;?>"></td>
						<td><span><?php echo $err_cPass;?></span></td>
					</tr>
                    
					<tr>
						<td align="right">Email: </td>
						<td><input type="text" name="email" value="<?php echo $email;?>"></td>
						<td><span><?php echo $err_email;?></span></td>
					</tr>
                    
					<tr>
						<td align="right">Phone: </td>
						<td><input type="text" name="code" placeholder="code" value="<?php echo $code;?>"> - <input type="text" name="number" placeholder="Number" value="<?php echo $number;?>"></td>
						<td><span><?php echo $err_code;?><?php echo "".$err_number;?></span></td>
					</tr>
					
					<tr>
						<td align="right">Address: </td>
						<td><input type="text" name="address" placeholder="Street Address" value="<?php echo $addrs;?>"></td>
						<td><span><?php echo $err_address;?></span></td>
					</tr>
					
					<tr>
					    <td></td>
						<td><input type="text" name="city" placeholder="City" value="<?php echo $city;?>"> - <input type="text" name="state" placeholder="State" value="<?php echo $state;?>"></td>
						<td><span><?php echo $err_city;?><?php echo " ".$err_state;?></span></td>
					</tr>
					
					<tr>
						<td></td>
						<td><input type="text" name="zip" value="<?php echo $zip;?>" placeholder="Postal/Zip Code"></td>
		                <td><span><?php echo $err_zip;?></span></td>
					</tr>
					
					<tr>
						<td align="right">Birth Date:  </td>
						<td>
							<select name="day">
								<option selected disabled>Day</option>
								<?php
									foreach($days as $d){
										if($day == $d)
											echo "<option selected>$d</option>";
										else
											echo "<option>$d</option>";
									}
								?>
							</select>
							<select name="month">
								<option selected disabled>Month</option>
								<?php
									foreach($months as $m){
										if($month == $m)
											echo "<option selected>$m</option>";
										else
											echo "<option>$m</option>";
									}
								?>
							</select> 
							<select name="year">
								<option selected disabled>Year</option>
								<?php
									foreach($years as $y){
										if($year == $y)
											echo "<option selected>$y</option>";
										else
											echo "<option>$y</option>";
									}
								?>
							</select> 
						</td>
						<td><span><?php echo $err_day;?><?php echo $err_month;?><?php echo $err_year;?></span></td>
					</tr>
					
					<tr>
						<td align="right">Gender: </td>
						<td><input type="radio" value="Male" <?php if($gender == "Male") echo "checked";?> name="gender"> Male <input <?php if($gender == "Female") echo "checked";?> name="gender"  value="Female" type="radio"> Female</td>
						<td><span><?php echo $err_gender;?></span></td>
					</tr>
					<tr>
						<td align="right">Where did you hear<br/> about us?  </td>
						<td>
							<input type="checkbox" value="A Friend or Colleague" <?php if(hearExist("A Friend or Colleague")) echo "checked";?>  name="hears[]"> A Friend or Colleague<br/>
							<input type="checkbox" value="Google" <?php if(hearExist("Google")) echo "checked";?> name="hears[]"> Google<br>
							<input type="checkbox" value="Blog Post" <?php if(hearExist("Blog Post")) echo "checked";?> name="hears[]"> Blog Post <br/>
							<input type="checkbox" value="News Article" <?php if(hearExist("News Article")) echo "checked";?> name="hears[]"> Games
						</td>
						<td><span><?php echo $err_hear;?></span></td>
					</tr>
					<tr>
						<td align="right">Bio:  </td>
						<td>
							<textarea name="bio"><?php echo $bio;?></textarea>
						</td>
						<td><span><?php echo $err_bio;?></span></td>
					</tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" value="Register"></td>
					</tr>
					
				</table>
			</form>
		</fieldset>
	</body>
</html>