<?php

require_once ('database.php');

$id = null;



    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		
		
    }
     
    if ( null==$id ) {
        header("Location: studentmainpg.php");
    }
if (isset($_POST['Submit'])) {
	
		$result = $conn->prepare("SELECT * FROM complain WHERE id = '$id'");
		$result->execute();
		$row = $result->fetch();
		
		$timestamp = $row['timestamp'];
		$int = (int)$timestamp;
		
		//echo $int;
		
		$currenttimestamp = strtotime("now");
		
		//echo $currenttimestamp;
		
		$accepttime = $timestamp+1800;
		//echo $accepttime;
		
		if($accepttime>=$currenttimestamp){ 
		
		//echo "yeah???";
		
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM complain WHERE id = '$id'";

		$conn->exec($sql);
		echo "<script>alert('Deleted!!!'); window.location='studentmainpg.php'</script>";
		
		}else{
			echo "<script>alert('Time limit exceeded!!!'); window.location='studentmainpg.php'</script>";
		}
		
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
    <form method="post" action="delete.php?id=<?php echo $id?>"  enctype="multipart/form-data" class="form">
	
	<p>Are You Sure To Delete ?</p>
    
	</div>
    <div>
   <a class="btn" href="studentmainpg.php" class="btn btn-primary">Back</a>
<button type="submit" name="Submit" class="btn btn-primary">Delete</button>
    </div>
</form>
  </body>
</html>