<?php
//session_start();
require_once ('database.php');

if (isset($_POST['Submit'])) {
// echo "";
// }else{
// $file=$_FILES['image']['tmp_name'];
// $image = $_FILES["image"] ["name"];
// $image_name= addslashes($_FILES['image']['name']);
// $size = $_FILES["image"] ["size"];
// $error = $_FILES["image"] ["error"];
// 
// if ($error > 0){
// die("Error uploading file! Code $error.");
// }else{
// 	if($size > 10000000) //conditions for the file
// 	{
// 	die("Format is not allowed or file size is too big!");
// 	}
// 	
// else
// 	{
//move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);			
//$location=$_FILES["image"]["name"];

//$matricno=$_SESSION['matricno'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
//$time=$_POST['time'];
//$inasis=$_SESSION['inasis'];
//$nobuggy=$_POST['nobuggy'];
//$status='Submitted';
//$comment='NO';
//date_default_timezone_set("Asia/Kuala_Lumpur");
//$datereport=date("Y-m-d");
//$timereport=date("H:i:s");
//$timestamp=strtotime("now");

	    
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO feedback (subject, message, name,email,phone)
			VALUES ('$subject', '$message', '$name', '$email', '$phone' )";

			$conn->exec($sql);
			
		
		    echo "<script>alert('Successful!!!'); window.location='index.html'</script>";
				
			//echo "<script>alert('Successfully Added!!!'); window.location='complain.php'</script>";
//}
}
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <link   href="css/bootstrap.min.css" rel="stylesheet">
	<body background="images/download1.jpg">
	<style>
	.form { 
	margin: 0 auto; 
	width:250px;
	line-height: 200%:
	}
	</style>
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
		  <li class="active"><a href="../Buggy/feedback.php">Contact</a></li>
		  <li><a href="../Buggy/login.php">Admin</a></li>
		</ul>
	  </div>
	</nav>
	
	<br>
	<br>
	 <div class="row">
		<div class="col-md-2">
		</div>
		
		<div class="col-md-7">
	
    <form method="post" action="feedback.php"  enctype="multipart/form-data">
		<div class="panel panel-default">
						<div class="panel-heading">Feedback</div>
						<div class="panel-body">
						   <div class = "row">
								<div class="col-md-6">
								<div class="input-group">
									<label style="color:#3a87ad; font-size:18px;">Subject</label>
									<input type="text" name="subject" placeholder="Subject" class="form-control" size="100%" required />
								</div>
								<div class="input-group">
									<label style="color:#3a87ad; font-size:18px;">Message</label>
									<textarea type="text" name="message" placeholder="Comment" rows="8" cols="50" class="form-control" required></textarea>	
								</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<label style="color:#3a87ad; font-size:18px;">Name</label>
										<input type="text" name="name" placeholder="Name" class="form-control" size="100%" required />	
									</div>
									<div class="input-group">
										<label style="color:#3a87ad; font-size:18px;">Email</label>
										<input type="email" name="email" placeholder="email" class="form-control" size="100%" required />	
									</div>
									<div class="input-group">
										<label style="color:#3a87ad; font-size:18px;">Phone</label>
										<input type="text" name="phone" placeholder="Phone" class="form-control" size="100%" required  />	
									</div>
									<div class="input-group">
										<br>
										<a class="btn" href="index.html" class="btn btn-primary">Back</a>
										<button type="submit" name="Submit" class="btn btn-primary">Submit</button>	
									</div>
									</div>
								</div>
						</div>
					</div>
				</div>												
	</form>
  </body>
</html>