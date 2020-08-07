<?php session_start();

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
                <h2 style="text-shadow:2px 1px 0 #444">Feedback</h2>
            </div>
			
            <div class="row">
				<p>
				    <a href="staffmain.php" class="btn btn-primary">Back</a>
                </p>
				
				<br>
			
                <table class="w3-table-all w3-card-4">
                  <thead>
                    <tr class="w3-light-grey">
					  <th>Subject</th>
					  <th>Message</th>
					  <th>Name</th>
					  <th>Email</th>
					  <th>Phone</th>
	
                    </tr>
                  </thead>
                  <tbody>
                  <?php
								//$timestamp=strtotime("now");
								
								//echo $timestamp;
								require_once('database.php');
								$result = $conn->prepare("SELECT * FROM feedback ");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								//$id=$row['id'];
							?>
								<tr>
								
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['subject']; ?></td>
								
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['message']; ?></td>

							    <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['name']; ?></td>	

								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['email']; ?></td>

								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['phone']; ?></td>								
								
								<?php } ?>
								</tr>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>