<?php
    
   session_start();
   if(!empty($_SESSION['type']=='incharge')){
       // echo "hello ".$_SESSION['name'];
   }else{
       header('location: ../index.php');
   }

   include("../connect.php");

   $eid =$_GET['Email'];
	
	
	// sending query
	$sql= "DELETE FROM customers WHERE Email = '$eid'";
	$result = $conn->query($sql);
	mysqli_close($conn); 

    if(! $result) {   
      die('Could not enter data: ' . mysqli_error() ); 
    } 
    else {echo "<script>
                        alert('Customer Deleted.');
                        window.location.href='upCustomer.php';
                    </script>";
    }


?>
