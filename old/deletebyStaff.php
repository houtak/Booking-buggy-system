<?php

require_once ('database.php');

$id = null;



    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		
		
    }
     
    if ( null==$id ) {
        header("Location: staffmain.php");
    }
if (isset($_POST['Submit'])) {
	
		
		
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM complain WHERE id = '$id'";

		$conn->exec($sql);
		echo "<script>alert('Deleted!!!'); window.location='staffmain.php'</script>";
	
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
    <form method="post" action="deletebyStaff.php?id=<?php echo $id?>"  enctype="multipart/form-data" class="form">
	
	<p>Are You Sure To Delete ?</p>
    
	</div>
    <div>
   <a class="btn" href="staffmain.php" class="btn btn-primary">Back</a>
<button type="submit" name="Submit" class="btn btn-danger">Delete</button>
    </div>
</form>
  </body>
</html>