<?php

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
$name=$_POST['name'];
$matricno=$_POST['matricno'];
$icno=$_POST['icno'];
$inasis=$_POST['inasis'];
$roomno=$_POST['roomno'];
$gender=$_POST['gender'];
$username=$_POST['username'];
$password=$_POST['password'];

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO student (name, matricno, icno, inasis,roomno,gender,username,password)
VALUES ('$name', '$matricno', '$icno', '$inasis', '$roomno', '$gender' ,'$username', md5('$password'))";

$conn->exec($sql);
echo "<script>alert('Register Successful!!!'); window.location='index.php'</script>";
// }
}
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<body background="images/b.png">
	<style>
	.form { 
	margin: 0 auto; 
	width:250px;
	line-height: 200%:
	}
	</style>
</head>
 
<body>
		<h3 class="form">Register Page</h3>
		<br>
    <form method="post" action="register.php"  enctype="multipart/form-data" class="form">
<table class="table1">
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Name</label></td>
		<td width="30"></td>
		<td><input type="text" name="name" placeholder="name" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Matric No</label></td>
		<td width="30"></td>
		<td><input type="number" name="matricno" placeholder="Matric No" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">IC No</label></td>
		<td width="30"></td>
		<td><input type="number" name="icno" placeholder="IC no" /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Inasis</label></td>
		<td width="30"></td>
		<td><input type="text" name="inasis" placeholder="Inasis" /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Room No</label></td>
		<td width="30"></td>
		<td><input type="text" name="roomno" placeholder="Room No" /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Gender</label></td>
		<td width="30"></td>
		<td><input type="text" name="gender" placeholder="Gender" /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Username</label></td>
		<td width="30"></td>
		<td><input type="text" name="username" placeholder="Username" /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Password</label></td>
		<td width="30"></td>
		<td><input type="password" name="password" placeholder="Password" /></td>
	</tr>
</table>
    </div>
    <div class = "form">
	<br>
	 <a class="btn" href="index.php" class="btn btn-danger">Back</a>
	 &nbsp;&nbsp;&nbsp;
	<button type="submit" name="Submit" class="btn btn-primary">Submit</button>
    </div>
</form>
  </body>
</html>