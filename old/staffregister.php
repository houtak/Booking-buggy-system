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
$staffid=$_POST['staffid'];
$username=$_POST['username'];
$password=$_POST['password'];

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO staff (name, staffid, username, password)
VALUES ('$name', '$staffid', '$username', md5('$password'))";

$conn->exec($sql);
echo "<script>alert('Successfully Added!!!'); window.location='index.php'</script>";
// }
}
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <<link   href="css/bootstrap.min.css" rel="stylesheet">
	<body background="images/b.png">
</head>
 
<body>
    <form method="post" action="staffregister.php"  enctype="multipart/form-data">
<table class="table1">
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Name</label></td>
		<td width="30"></td>
		<td><input type="text" name="name" placeholder="name" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Staff ID</label></td>
		<td width="30"></td>
		<td><input type="number" name="staffid" placeholder="Staff ID" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Username</label></td>
		<td width="30"></td>
		<td><input type="text" name="username" placeholder="Username" /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Year Published</label></td>
		<td width="30"></td>
		<td><input type="password" name="password" placeholder="Password" /></td>
	</tr>
</table>
    </div>
    <div>
<button type="submit" name="Submit" class="btn btn-primary">Add</button>
    </div>
</form>
  </body>
</html>