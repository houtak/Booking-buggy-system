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
$name=$_POST['name'];
$ic=$_POST['ic'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$date=$_POST['date'];
$time=$_POST['time'];
//$inasis=$_SESSION['inasis'];
$nobuggy=$_POST['nobuggy'];
//$status='Submitted';
//$comment='NO';
//date_default_timezone_set("Asia/Kuala_Lumpur");
//$datereport=date("Y-m-d");
//$timereport=date("H:i:s");
//$timestamp=strtotime("now");

	    $result = $conn->prepare("SELECT * FROM buggy WHERE date='$date' AND buggy>='$nobuggy'");
		$result->execute();
		$row = $result->fetch();
								
		if(is_array($row) && !empty($row)) {
			
			$availablebuggy=$row['buggy'];
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO book (name, ic, age,phone,date,time,nobuggy)
			VALUES ('$name', '$ic', '$age', '$phone', '$date' ,'$time', '$nobuggy')";

			$conn->exec($sql);
			
			$newvalue= $availablebuggy - $nobuggy;
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql2 = "UPDATE buggy set buggy = '$newvalue' WHERE date='$date'";

		    $conn->exec($sql2);
		
		echo "<script>alert('Successful!!!'); window.location='complain.php'</script>";
		
		header("Location: /Buggy/print.php?name=$name&ic=$ic&age=$age&phone=$phone&date=$date&time=$time&buggy=$nobuggy");
	     
		 }else{
		
		echo "<script>alert('Failed !!!'); window.location='complain.php'</script>";
	    
		}
								

			
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
                <h3>Buggy Booking Form</h3>
            </div>
    <form method="post" action="complain.php"  enctype="multipart/form-data" class="form">
<table class="table1">
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Name</label></td>
		<td width="30"></td>
		<td><input type="text" name="name" placeholder="Name"  /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">IC No</label></td>
		<td width="30"></td>
		<td><input type="text" name="ic" placeholder="IC No" /></td>
	</tr>
	
	
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Age</label></td>
		<td width="30"></td>
		<td><input type="text" name="age" placeholder="Age"  /></td>
	</tr>
	
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Phone No</label></td>
		<td width="30"></td>
		<td><input type="text" name="phone" placeholder="Phone (without -)"  /></td>
	</tr>
	
	
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Date</label></td>
		<td width="30"></td>
		<?php date_default_timezone_set("Asia/Kuala_Lumpur");?>
		<td><input type="date" name="date" min="<?php echo date("Y-m-d")?>"/></td>
	</tr>
	
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Time</label></td>
		<td width="30"></td>
		<td><select name="time">
				<option value="0800">08:00</option>
				<option value="0830">08:30</option>
				<option value="0900">09:00</option>
				<option value="0930">09:30</option>
				<option value="1000">10:00</option>	
				<option value="1030">10:30</option>	
				<option value="1100">11:00</option>	
				<option value="1130">11:30</option>	
			</select></td>
	</tr>
	
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">No of Buggy</label></td>
		<td width="30"></td>
		<td><select name="nobuggy">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>	
			</select></td>
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