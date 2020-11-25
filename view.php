<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  <link href="css/calendar.css" type="text/css" rel="stylesheet" />
	<body background="images/download1.jpg">
</head>
 
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">Buggy Booking In UUM</a>
		</div>
		<ul class="nav navbar-nav">
		  <li><a href="../Buggy/index.html">Home</a></li>
		  <li class="active"><a href="../Buggy/view.php">Check Buggy Availability</a></li>
		  <li><a href="../Buggy/complain.php">Book Now</a></li>
		  <li><a href="../Buggy/feedback.php">Contact</a></li>
		  <li><a href="../Buggy/login.php">Admin</a></li>
		</ul>
	  </div>
	</nav>
    <div class="container">
            <div class="row">
                <h2 style="text-shadow:2px 1px 0 #444">Available Buggy</h2>
            </div>
			
            <div class="row">
			
                <table class="table">
                  <thead>
                    <tr>
					  <th scope="col">Date</th>
					  <th scope="col">Available Buggy (Unit)</th>
	
                    </tr>
                  </thead>
                  <tbody>
                  <?php
								$timestamp=strtotime("now");
								
								//echo $timestamp;
								require_once('database.php');
								$result = $conn->prepare("SELECT * FROM buggy WHERE timestamp>='$timestamp'");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								//$id=$row['id'];
							?>
								<tr>
								
								<td scope="row"> <?php echo $row ['date']; ?></td>
								
								<td> <?php echo $row ['buggy']; ?></td>

															
								
								<?php } ?>
								</tr>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
	
	<?php
	//include 'calendar.php';
	 
	//$calendar = new Calendar();
	 
	//secho $calendar->show();
	?>
  </body>
</html>