<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<body background="images/b.png">
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h2 style="text-shadow:1px 1px 0 #444">MY COMPLAIN/REPORT</h2>
            </div>
			
			
		    <br>
			
            <div class="row">
				<p>
                    <a href="complain.php" class="btn btn-primary">Add Complain/Report</a>
					<a href="logout.php" class="btn btn-danger">Logout</a>
					
                </p>
				
				<br>
				<br>
				
                <table class="w3-table-all w3-card-4">
                  <thead>
                    <tr class="w3-light-grey">
                      <th>Issue</th>
                      <th>Description</th>
					  <th>Location</th>
					  <th>Status</th>
					  <th>Comment</th>
					  <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php
								require_once('database.php');
								$result = $conn->prepare("SELECT * FROM complain WHERE matricno=".$_SESSION['matricno']."");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['id'];
							?>
								<tr>

								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['issue']; ?></td>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['description']; ?></td>
								<td style="text-align:center; word-break:break-all; width:100px;"> <?php echo $row ['location']; ?></td>
								<td style="text-align:center; word-break:break-all; width:100px;"> <?php echo $row ['status']; ?></td>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['comment']; ?></td>
															
								<?php								
								echo '<td width=250>';
								echo '<a class="btn btn-primary" href="view.php?id='.$row['id'].'">View</a>'; 
								echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">delete</a>'; 
								echo '</td>';
								?>
								<?php } ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>