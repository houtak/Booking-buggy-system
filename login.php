<?php
session_start();

require_once ('database.php');

if (isset($_POST['login'])) {
	
	//$type=$_POST['user'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	//require_once('database.php');
	
	//if($type == "staff"){
		
	$result = $conn->prepare("SELECT * FROM admin WHERE username='$username' AND password=md5('$password')");
	$result->execute();
	$row = $result->fetch();
	
	if(is_array($row) && !empty($row)) {
		$validuser = $row['username'];
        $_SESSION['valid'] = $validuser;
        //$_SESSION['name'] = $row['name'];
        //$_SESSION['staffid'] = $row['staffid'];
		echo "<script>alert('Login Successful!!!'); window.location='staffmain.php'</script>";
	}else{
		echo "<script>alert('Login Failed!!!'); window.location='login.php'</script>";
	}
	}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Inasis Reporting System</title>
	<link   href="css/bootstrap.min.css" rel="stylesheet">
	<body background="images/b.png">
	
</head>
<body>
	<div class="header">
		<br>
	    <center> <h1>UUM buggy booking System (Admin)</h1> </center>
		<br>
		<br>
		<center> <h3>Login</h3> </center>
		<br>

	</div>
	<form method="post" action="login.php">
	<center>
		
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn btn-success" name="login">Login</button>
		</div>
		
		</center>
	</form>
</body>
</html>