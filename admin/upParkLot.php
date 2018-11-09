<?php
    
   session_start();
   if(!empty($_SESSION['type']=='admin')){
   }else{
       header('location: ../index.php');
   }

?>

<html>
	<head>
		<title>Admin | Update Parkinglot</title>
		<link rel="stylesheet" type="text/css" href='../css/style.css'>

	</head>
	<body>
		<div class="container">

		<h1 class="banner" > Parking Allocation System </h1>

			<nav class="menu">

            
                <ul>

                        <li> <a href="admin_home.php"> Home | Admin </a></li>
                        <li> <a href="admin_list_of_lot.php"> List of parkinglot </a></li>
                        <li> <a href="addParkLot.php"> Add Parking Lot </a></li>
                        <li id = "current"> <a href="upParkLot.php"> Update Parking Lot </a></li>
                        <li> <a href="../logout.php"> Sign Out </a></li>
                </ul>
                
            </nav>
		<section class="sec">
			
			<div >
            <table id="table_div1">
                <tr>
                    <th> Lot Name </th>
                    <th>&nbsp;&nbsp;</th>              
                    <th> Address </th>
                    <th>&nbsp;&nbsp;</th>             
                    <th> Lot Capasity </th>
                    <th>&nbsp;&nbsp;</th>            
                    <th> Loc Occupied </th>
                    <th>&nbsp;&nbsp;</th>
                    <th> No of Floor(s) </th>
                </tr>

                <?php
            		
    				include("../connect.php"); 
                    $query = "SELECT * FROM `parkinglot`";
                    $result = $conn->query($query);
                    $row = mysqli_fetch_assoc($result);
                    
                    while($row != NULL){
                    $lid = $row['Lot_id'];
                    $name = $row['LotName'];
                    echo"<tr><td>$name</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $add = $row['Address'];
                    echo"<td>$add</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $loc = $row['LotCapasity'];
                    echo"<td>$loc</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $lo = $row['LotOccupied'];
                    echo"<td>$lo</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    $nf = $row['NoOfFloor'];
                    echo"<td>$nf</td></tr>";
                    echo"<th>&nbsp;&nbsp;</th>";
                    echo"<td> <a href ='editParkinglot.php?Lot_id=$lid'>Edit</a>";
                    echo"<td> <a href ='delParkinglot.php?Lot_id=$lid'><center>Delete</center></a>";
        			$row = mysqli_fetch_assoc($result);
        		    }
            	?>
                        </table>
                        </div>


            	
            	
		</section>
		
		</div>
	</body>
</html>