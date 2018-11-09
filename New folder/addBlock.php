<!DOCTYPE html>
<html>
<head>
	<title>AddBlock</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="wrapper">
		<div id="formDiv">
			<form method="POST" action="addBlock.php" enctype="multipart/form-data">
			
			<input id="blname" type="text" name="blkname" placeholder="Enter Block Name"><br>
			<input type="text" name="nfloor" placeholder="Enter Number of Floors"><br>
			<input type="text" name="blkcap" placeholder="Enter Block Capacity"><br>
			<input type="text" name="blkocc" placeholder="Enter Number of occupied Blocks"><br>
			<input type="submit" name="submit" value="Add Block">
			
				
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


		$blockname = $_POST['blkname'];
		$nofloors = $_POST['nfloor'];
		$blockcapacity = $_POST['blkcap'];
		$blockoccupied = $_POST['blkocc'];

		$sql = "INSERT INTO `block` (`BlockName`, `NoOfFloors`, `BlockCapasity`, `BlockOccupied`) VALUES ('$blockname','$nofloors','$blockcapacity','$blockoccupied')";

		mysql_select_db('parkingallocationsystem'); 
		$retval = mysql_query( $sql, $conn ); 
		if(! $retval ) {   
			die('Could not enter data: ' . mysql_error()); 
		} 
		echo "Entered data successfully\n"; 
		mysql_close($conn); 
	}  
		
?>
</body>
</html>