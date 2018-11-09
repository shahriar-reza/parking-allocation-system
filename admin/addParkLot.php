<?php
    
   session_start();
   if(!empty($_SESSION['type']=='admin')){
   }else{
       header('location: ../index.php');
   }

?>


<!DOCTYPE html>
<html>
<head>
	<title> Admin | Adding Parkinglot </title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>


	<div class="container">

    <h1 class="banner" > Parking Allocation System </h1>

    <nav class="menu">
                <ul>

                        <li> <a href="admin_home.php"> Home | Admin </a></li>
                        <li> <a href="admin_list_of_lot.php"> List of Parking Lot </a></li>
                        <li id = "current"> <a href="addParkLot.php"> Add Parking Lot </a></li>
                        <li> <a href="upParkLot.php"> Update Parking Lot </a></li>
                        <li> <a href="../logout.php"> Sign Out </a></li>
                </ul>        
    </nav>


	<div id="wrapper" style="padding-left: 35%; padding-top: 7%;">
		<div id="formDiv">
			<form method="POST" action="addParkLot.php" enctype="multipart/form-data">
			<h3>Parking Lot :</h3>
			<input type="text" id = "AsrhBox"  name="lname" placeholder="Enter Parking Lot Name"><br>
			<input type="text" id = "AsrhBox" name="ladd" placeholder="Enter Address"><br>
			<input type="text"  id = "AsrhBox" name="lcap" placeholder="Enter Lot Capacity"><br>
			<input type="text" id = "AsrhBox" name="nfloor" placeholder="Enter Number of floor"><br>

			<br>
			<h4> Floor Details </h4>
			<h6>1st Floor </h6>
			<input style=" padding-left: 50px;" type="text" id = "AsrhBox" name="nf1" placeholder="Enter Number of Slots"><br>
			<h6>2nd Floor </h6>
			<input style=" padding-left: 50px;" type="text" id = "AsrhBox" name="nf2" placeholder="Enter Number of Slots"><br>
			<h6>3rd Floor </h6>
			<input style=" padding-left: 50px;" type="text" id = "AsrhBox" name="nf3" placeholder="Enter Number of Slots"><br>
			<h6>4th Floor </h6>
			<input style=" padding-left: 50px;" type="text" id = "AsrhBox" name="nf4" placeholder="Enter Number of Slots"><br>

			<br><br><input type="submit" id = "u_btn" name="submit" value="Add Parking Lot">
			
				
			</form>
		</div>
	</div>
<?php

	if(isset($_POST['submit'])){
		include '../connect.php';

		$sql_count = "SELECT * FROM `parklot` WHERE 1";
        $result = $conn->query($sql_count);
        $row = mysqli_fetch_assoc($result);
        $pl_c = $row['count'];
        $pl_c = $pl_c + 1;
        $pkl_id =  "pkl_$pl_c";
        echo $pl_c;
        echo $pkl_id;
        $sql_count1 = "SELECT * FROM `f_c` WHERE 1";
        $result1 = $conn->query($sql_count1);
        $row1 = mysqli_fetch_assoc($result1);
        $fl_c = $row1['count'];
        $fl_c = $fl_c + 1;
        $frl_id =  "frl_$fl_c";
        echo $fl_c;
        echo $frl_id;

		$lotname = $_POST['lname'];
		$lotaddress = $_POST['ladd'];
		$lotcapacity = $_POST['lcap'];
		$nofloor = $_POST['nfloor'];
		$f1_s = $_POST['nf1'];
		//if($_POST['nf2'] != '')
		$f2_s = $_POST['nf2'];
		//if($_POST['nf2'] != '')
		$f3_s = $_POST['nf3'];
		//if($_POST['nf2'] != '')
		$f4_s = $_POST['nf4'];


		$sql = "INSERT INTO `parkinglot`(`Lot_id`, `LotName`, `Address`, `LotCapasity`, `LotOccupied`, `NoOfFloor`) VALUES ('$pkl_id','$lotname','$lotaddress','$lotcapacity','0','$nofloor')";

		$retval = $conn->query($sql);

		$sql1 = "INSERT INTO `floor`(`Floor_id`, `FloorNumber`, `NumberOfSlot`, `FloorOccupied`, `Lot_id`) VALUES ('$frl_id','1st floor','$f1_s','0','$pkl_id')";

		$retval2 = $conn->query($sql1);
		if($f2_s != '0'){
			$fl_c = $fl_c + 1;
        	$frl_id =  "frl_$fl_c";
			$sql2 = "INSERT INTO `floor`(`Floor_id`, `FloorNumber`, `NumberOfSlot`, `FloorOccupied`, `Lot_id`) VALUES ('$frl_id','2nd floor','$f2_s','0','$pkl_id')";
			$retval3 = $conn->query($sql2);
		}

		if($f3_s != '0'){
			$fl_c = $fl_c + 1;
        	$frl_id =  "frl_$fl_c";
			$sql3 = "INSERT INTO `floor`(`Floor_id`, `FloorNumber`, `NumberOfSlot`, `FloorOccupied`, `Lot_id`) VALUES ('$frl_id','3rd floor','$f3_s','0','$pkl_id')";
			$retval4 = $conn->query($sql3);
		}

		if($f4_s != '0'){
			$fl_c = $fl_c + 1;
        	$frl_id =  "frl_$fl_c";
			$sql4 = "INSERT INTO `floor`(`Floor_id`, `FloorNumber`, `NumberOfSlot`, `FloorOccupied`, `Lot_id`) VALUES ('$frl_id','4th floor','$f4_s','0','$pkl_id')";
			$retval5 = $conn->query($sql4);
		}
		mysqli_close($conn); 

		if(! $retval || ! $retval2 || !$retval3 || ! $retval4 || ! $retval5) {   
			die('Could not enter data: ' . mysqli_error()); 
		} 
		else {echo "<script>
                        alert('Parking Lot Created.');
                        window.location.href='addParkLot.php';
                    </script>";
		}
	}  
		
?>
</div>
</body>
</html>