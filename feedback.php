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
			<div class="form">
                <h3>Feedback</h3>
            </div>
    <form method="post" action="feedback.php"  enctype="multipart/form-data" class="form">
<table class="table1">
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Subject</label></td>
		<td width="30"></td>
		<td><input type="text" name="subject" placeholder="Subject"  required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Message</label></td>
		<td width="30"></td>
		<td><textarea type="text" name="message" placeholder="Comment" rows="8" cols="50" required></textarea></td>
	</tr>
	
	
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Name</label></td>
		<td width="30"></td>
		<td><input type="text" name="name" placeholder="Name"  required /></td>
	</tr>
	
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Email</label></td>
		<td width="30"></td>
		<td><input type="email" name="email" placeholder="email" required /></td>
	</tr>
	
	
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Phone</label></td>
		<td width="30"></td>
		<td><input type="text" name="phone" placeholder="Phone" required  /></td>
	</tr>
	
	
	
</table>
    </div>
    <div>
	<a class="btn" href="index.html" class="btn btn-primary">Back</a>
		<button type="submit" name="Submit" class="btn btn-primary">Submit</button>
    </div>
</form>
  </body>
</html>