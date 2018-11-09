<?php
    
   session_start();
   if(!empty($_SESSION['type']=='incharge')){
       // echo "hello ".$_SESSION['name'];
   }else{
       header('location: ../index.php');
   }

?>

<html>
	<head>
		<title> Incharge | List of Customers </title>
		<link rel="stylesheet" type="text/css" href='../css/style.css'>

	</head>
	<body>
		<div class="container">

		<h1 class="banner" > Parking Allocation System </h1>

			<nav class="menu">

            
                <ul>

                        <li> <a href="ic_home.php"> Home | Incharge </a></li>
                        <li id = "current"> <a href="list_of_customer.php"> List of Customers </a></li>
                        <li> <a href="addCustomer.php"> Add Customers </a></li>
                        <li> <a href="upCustomer.php"> Update Customers Info </a></li>
                        <li> <a href="../logout.php"> Sign Out </a></li>
                </ul>
                
            </nav>
		<section class="sec">
			
			<div >
            <table id="table_div">
                <tr>
                    <th> Name </th>
                    <th>&nbsp;&nbsp;</th>              
                    <th> Email </th>
                    <th>&nbsp;&nbsp;</th>             
                    <th> Contact No </th>
                    <th>&nbsp;&nbsp;</th>            
                    <th> Slip ID </th>
				</tr>

                <?php
            		
    				include("../connect.php"); 
    				$query = "SELECT * FROM `customers`";
        			$result = $conn->query($query);
        			$row = mysqli_fetch_assoc($result);
        			
        			while($row != NULL){
        			$name = $row['Name'];
        			echo"<tr><td>$name</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
        			$email = $row['Email'];
        			echo"<td>$email</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
        			$phn = $row['PhoneNumber'];
        			echo"<td>$phn</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
        			$slpid = $row['SlipID'];
        			echo"<td>$slpid</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
        			//echo"<br>";
        			$row = mysqli_fetch_assoc($result);
        		}
            	?>
                        </table>
                        </div>


            	
            	
		</section>
		
		</div>
	</body>
</html>