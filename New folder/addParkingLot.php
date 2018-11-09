<!DOCTYPE html>
<html>
<head>
	<title>Parking Lot</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="wrapper">
		<div id="formDiv">
			<form method="POST" action="addParkingLot.php" enctype="multipart/form-data">
			
			<input type="text" name="lname" placeholder="Enter Parking Lot Name"><br>
			<input type="text" name="ladd" placeholder="Enter Address"><br>
			<input type="text" name="lcap" placeholder="Enter Lot Capacity"><br>
			<input type="text" name="locc" placeholder="Enter Number of occupied slot"><br>
			<input type="text" name="nblock" placeholder="Enter Number of Blocks"><br>
			<input type="submit" name="submit" value="Add Parking Lot">
			
				
			</form>
		</div>
	</div>
<?php

	if(isset($_POST['submit'])){
		$dbhost = 'localhost'; 
		$dbuser = 'root'; 
		$dbpass = ''; 
		$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
		if(! $conn ) {   
			die('Could not connect: ' . mysql_error()); 
		} 


		$lotname = $_POST['lname'];
		$lotaddress = $_POST['ladd'];
		$lotcapacity = $_POST['lcap'];
		$lotoccupied = $_POST['locc'];
		$noblocks = $_POST['nblock'];

		$sql = "INSERT INTO `parkinglot` (`Lotname`, `Address`, `LotCapasity`, `LotOccupied`, `NoOfBlocks`) VALUES ('$lotname','$lotaddress','$lotcapacity','$lotoccupied','$noblocks')";

		mysql_select_db('parkingallocationsystem'); 
		$retval = mysql_query( $sql, $conn ); 
		if(! $retval ) {   
			die('Could not enter data: ' . mysql_error()); 
		} 
		echo "<script>
                        alert('Parking Lot Created.');
                        window.location.href='addParkingLot.php';
                    </script>";
 
		mysql_close($conn); 
	}  
		
?>
</body>
</html>