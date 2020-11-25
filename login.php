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
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  <body background="images/download.jpg">
	  
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Buggy Booking In UUM</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="../Buggy/index.html">Home</a></li>
      <li><a href="../Buggy/view.php">Check Buggy Availability</a></li>
      <li><a href="../Buggy/complain.php">Book Now</a></li>
	  <li><a href="../Buggy/feedback.php">Contact</a></li>
	  <li class="active"><a href="../Buggy/login.php">Admin</a></li>
    </ul>
  </div>
</nav>
	<div class="row">
		<div class="col-md-12">
			<div class="header">
				<br>
				<h1 class="text-center">&nbsp;</h1>
			</div>
		</div>

	</div>
	<br>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
				<form method="post" action="login.php">
					<div class="panel panel-default">
					  <div class="panel-heading">Login</div>
					  <div class="panel-body">
						<div class="input-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" >
						</div>
						<div class="input-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
						</div>
						<div class="input-group">
								<br>
								<button type="submit" class="btn btn-success" name="login">Login</button>
						</div>
					</div>
				  </div>			
			</form>	
		</div>
		<div class="col-md-4">
		</div>
	</div>
</body>
</html>