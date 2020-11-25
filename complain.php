<?php
//session_start();
require_once ('database.php');

if (isset($_POST['Submit'])) {

$name=$_POST['name'];
$ic=$_POST['ic'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$date=$_POST['date'];
$time=$_POST['time'];
$nobuggy=$_POST['nobuggy'];


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
								
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <link   href="css/bootstrap.min.css" rel="stylesheet">
	<body background="images/download.jpg">
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
		  <li class="active"><a href="../Buggy/complain.php">Book Now</a></li>
		  <li><a href="../Buggy/feedback.php">Contact</a></li>
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
			
			<form method="post" action="complain.php"  enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">Book Now</div>
						<div class="panel-body">
						   <div class = "row">
								<div class="col-md-6">
									<div class="input-group">
										<label style="color:#3a87ad; font-size:18px;">Name</label>
										<input type="text" name="name" placeholder="Name"  class="form-control" size=100%/>
									</div>
									
									<div class="input-group">
										<label style="color:#3a87ad; font-size:18px;">IC No</label>
										<input type="text" name="ic" placeholder="IC No" class="form-control" size=100%/>
									</div>
									
									<div class="input-group">
										<label style="color:#3a87ad; font-size:18px;">Age</label>
										<input type="text" name="age" placeholder="Age" class="form-control" size=100%/>
									</div>
									
									<div class="input-group">
										<label style="color:#3a87ad; font-size:18px;">Phone No</label>
										<input type="text" name="phone" placeholder="Phone (without -)"  class="form-control" size=100%/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<label style="color:#3a87ad; font-size:18px;">Date</label>
											<?php date_default_timezone_set("Asia/Kuala_Lumpur");?>
										<input type="date" name="date" min="<?php echo date("Y-m-d")?>" class="form-control" size=100%/>
									</div>	
										
									<div class="input-group">
										<label style="color:#3a87ad; font-size:18px;">Time</label>
										<select name="time" class="form-control" >
													<option value="0800">08:00</option>
													<option value="0830">08:30</option>
													<option value="0900">09:00</option>
													<option value="0930">09:30</option>
													<option value="1000">10:00</option>	
													<option value="1030">10:30</option>	
													<option value="1100">11:00</option>	
													<option value="1130">11:30</option>	
										</select>
									</div>

									<div class="input-group">
										<label style="color:#3a87ad; font-size:18px;">No of Buggy</label>
										<select name="nobuggy" class="form-control" >
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>	
										</select>
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
			</form>
	</div>
  </body>
</html>