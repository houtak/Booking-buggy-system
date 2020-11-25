<?php
session_start();
require_once ('database.php');

if(empty($_SESSION['valid'])){

	header("location: login.php");
    exit;
}

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

$date=$_POST['date'];
//$inasis=$_SESSION['inasis'];
$buggy=$_POST['buggy'];
$timestamp = strtotime($date);

//$status='Submitted';
//$comment='NO';
//date_default_timezone_set("Asia/Kuala_Lumpur");
//$datereport=date("Y-m-d");
//$timereport=date("H:i:s");
//$timestamp=strtotime("now");

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO buggy (date, buggy, timestamp)
VALUES ('$date', '$buggy', '$timestamp')";

$conn->exec($sql);
echo "<script>alert('Successfully Added!!!'); window.location='updatebuggy.php'</script>";
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
</head>
 
<body>
<br>
<br>
	 <div class="row">
		<div class="col-md-2">
		</div>
		
		<div class="col-md-7">
			<form method="post" action="updatebuggy.php"  enctype="multipart/form-data">
			<div class="panel panel-default">
			   <div class="panel-heading">Update Buggy Availability</div>
				  <div class="panel-body">
					<div class = "row">
					  <div class="col-md-4">	
						<div class="input-group">
							<label style="color:#3a87ad; font-size:18px;">Date</label>
							<?php date_default_timezone_set("Asia/Kuala_Lumpur");?>
							<input type="date" name="date" min="<?php echo date("Y-m-d")?>" class="form-control"/>
						</div>
						<br>
						<div class="input-group">
							<a class="btn" href="staffmain.php" class="btn btn-primary">Back</a>
							<button type="submit" name="Submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<label style="color:#3a87ad; font-size:18px;">Update Buggy</label>
							<input type="number" name="buggy" class="form-control"/>
						</div>
					</div>
				   </div>
				</div>
			</div>	
		</form>
</body>
</html>