<?php
require_once ('database.php');

$name = null;
$ic = null;
$age = null;
$phone = null;
$date = null;
$time = null;
$buggy = null;


if ( !empty($_GET['name'])) {
	
	$name = $_REQUEST['name'];
	$ic = $_REQUEST['ic'];
	$age = $_REQUEST['age'];
	$phone = $_REQUEST['phone'];
	$date = $_REQUEST['date'];
	$time = $_REQUEST['time'];
	$buggy = $_REQUEST['buggy'];
	
	/*
	echo "Name:" , $name;
	echo "IC:" , $ic;
	echo "Age:" , $age;
	echo "Phone:" , $phone;
	echo "Date:" , $date;
	echo "Time:" , $time;
	echo "Buggy:" , $buggy;
	*/
}
?> 

<html>
<body>

<h1>Booking successful! Have a nice day!</h1>

<h2>Receipt</h2>

<p>Name: <?php echo $name?></p>
<p>IC No: <?php echo $ic?></p>
<p>Age: <?php echo $age?></p>
<p>Phone: <?php echo $phone?></p>
<p>Date: <?php echo $date?></p>
<p>Time: <?php echo $time?></p>
<p>No of Buggy: <?php echo $buggy?></p>

<br>
<p>Note: Please show this receipt to the reception!</p>
<br>
<button onclick="myFunction()">Print</button>
<button onclick="back()">Close</button>

<script>
function myFunction() {
  window.print();
}

function back(){
   window.location='index.html';
}
</script>

</body>
</html>
