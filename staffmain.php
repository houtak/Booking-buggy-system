<?php session_start(); 

//echo $_SESSION['valid'];
if(empty($_SESSION['valid'])){

	header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<body background="images/b.png">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h2 style="text-shadow:2px 1px 0 #444">STAFF PAGE</h2>
            </div>
			
            <div class="row">
				<p>
				    <a href="updatebuggy.php" class="btn btn-primary">Update Availability of Buggy</a>
					<a href="displayfeedback.php" class="btn btn-success">View Feedback</a>
					<a href="logout.php" class="btn btn-danger">Logout</a>
                </p>
				
				<br>
			
                <table class="w3-table-all w3-card-4">
                  <thead>
                    <tr class="w3-light-grey">
                      <th>Name</th>
                      <th>Ic No</th>
					  <th>Age</th>
					  <th>Phone</th>
					  <th>Date</th>
					  <th>Time</th>
					  <th>No of Buggy</th>
		
                    </tr>
                  </thead>
                  <tbody>
                  <?php
								require_once('database.php');
								$result = $conn->prepare("SELECT * FROM book");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['id'];
							?>
								<tr>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['name']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['ic']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['age']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['phone']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['date']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['time']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['nobuggy']; ?></td>

															
						
								<?php } ?>
								</tr>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>