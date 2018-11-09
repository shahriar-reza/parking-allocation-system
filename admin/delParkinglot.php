<?php
    
   session_start();
   if(!empty($_SESSION['type']=='admin')){
       // echo "hello ".$_SESSION['name'];
   }else{
       header('location: ../index.php');
   }

   include("../connect.php");

   $lid =$_GET['Lot_id'];
	
	
	// sending query
	$sql= "DELETE FROM `parkinglot` WHERE Lot_id = '$lid'";
	$result = $conn->query($sql);
	mysqli_close($conn); 

    if(! $result) {   
      die('Could not enter data: ' . mysqli_error() ); 
    } 
    else {echo "<script>
                        alert('Parking Lot Deleted.');
                        window.location.href='upParkLot.php';
                    </script>";
    }


?>
