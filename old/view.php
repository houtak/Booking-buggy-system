<?php session_start(); 

require_once ('database.php');

$id = null;
$matricno = null;
$issue = null;
$description = null;
$inasis = null;
$location = null;
$comment = null;
$status = null;
$date = null;
$time = null; 


    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		$result = $conn->prepare("SELECT * FROM complain WHERE id = '$id'");
	    $result->execute();
		$data = $result->fetch(PDO::FETCH_ASSOC);
		$matricno = $data['matricno'];
		$issue = $data['issue'];
		$description = $data['description'];
		$inasis = $data['inasis'];
		$location = $data['location'];
		$comment = $data['comment'];
		$status= $data['status'];
		$date = $data['datereport'];
		$time = $data['timereport'];
		
		$result2 = $conn->prepare("SELECT * FROM student WHERE matricno = '$matricno'");
	    $result2->execute();
		$data2 = $result2->fetch(PDO::FETCH_ASSOC);
		$studname = $data2['name'];
    }
     
    if ( null==$id ) {
        header("Location: studentmainpg.php");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<body background="images/b.png">
    <!--- <script src="js/bootstrap.min.js"></script> --->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3 style="text-shadow:1px 1px 0 #444">MY COMPLAIN/REPORT DETAIL</h3>
            </div>
            <div class="row">

                <table class="w3-table-all w3-card-4 w3-hoverable">
                 
					<tr>
                      <th>Issue</th>
					  <td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $issue; ?></td>
					</tr>
					<tr>
                      <th>Description</th>
					  <td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $description; ?></td>
					</tr>
					<tr>
					  <th>Inasis</th>
					  <td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $inasis; ?></td>
					</tr>
					<tr>
					  <th>Location</th>
					  <td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $location; ?></td>
				    </tr>
					<tr>
					  <th>Date report</th>
					  <td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $date; ?></td>
				    </tr>
					<tr>
					  <th>Time report</th>
					  <td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $time; ?></td>
				    </tr>
					<tr>
					  <th>status</th>
					  <td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $status; ?></td>
				    </tr>
					<tr>
					  <th>Comment</th>
					  <td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $comment; ?></td>
				    </tr>
                    						
                 
            </table>
        </div>
    </div> <!-- /container -->
	
	<center>
	
	

    <div>
	<br>
   <a  href="studentmainpg.php" class="btn btn-primary">Back</a>
    </div>
</form>
</center>
  </body>
</html>