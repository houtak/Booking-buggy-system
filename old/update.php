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
        header("Location: staffmain.php");
    }

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

		$newstatus=$_POST['status'];
		$newcomment=$_POST['comment'];

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE complain set status = '$newstatus', comment = '$newcomment' WHERE id = '$id'";

		$conn->exec($sql);
		echo "<script>alert('Updated!!!'); window.location='staffmain.php'</script>";
	
	
// }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<body background="images/b.png">
    <!--- <script src="js/bootstrap.min.js"></script> --->
	
	
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Complain Detail and Update Page</h3>
            </div>
            <div class="row">

                <table class="table table-striped table-bordered">
                 
					<tr>
                      <th>Student Name</th>
					  <td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $studname; ?></td>
					</tr>
                    <tr>
                      <th>Matric No</th>
					  <td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $matricno; ?></td>
					</tr>
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
                    						
                 
            </table>
        </div>
    </div> <!-- /container -->
	
	<center>
	
	<form method="post" action="update.php?id=<?php echo $id?>"  enctype="multipart/form-data" >
<table class="table1">
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Status</label></td>
		<td width="30"></td>
		<td><select name="status">
				<option value="Submitted"
				<?php 
				if($status == 'Submitted')
					echo "selected";
					?>
				>Submitted</option>
				<option value="Processing"
				<?php 
				if($status == 'Processing')
					echo "selected";
					?>
				>Proceesing</option>
				<option value="Completed"
				<?php 
				if($status == 'Completed')
					echo "selected";
					?>
				>Completed</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Comment</label></td>
		<td width="30"></td>
		<td><textarea type="text" name="comment" placeholder="Comment" rows="8" cols="50"><?php echo$comment; ?></textarea></td>
	</tr>
	
</table>

    <div>
	<br>
   <a class="btn" href="staffmain.php" class="btn btn-primary">Back</a>
   <button type="submit" name="Submit" class="btn btn-primary">Update</button>
    </div>
</form>
</center>
  </body>
</html>