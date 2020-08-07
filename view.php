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
                <h2 style="text-shadow:2px 1px 0 #444">Available Buggy</h2>
            </div>
			
            <div class="row">
				<p>
				    <a href="index.html" class="btn btn-primary">Back</a>
                </p>
				
				<br>
			
                <table class="w3-table-all w3-card-4">
                  <thead>
                    <tr class="w3-light-grey">
					  <th>Date</th>
					  <th>Available Buggy (Unit)</th>
	
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
								
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['date']; ?></td>
								
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['buggy']; ?></td>

															
								
								<?php } ?>
								</tr>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>