<?php
    
   session_start();
   if(!empty($_SESSION['type']=='incharge')){
   }else{
       header('location: ../index.php');
   }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Incharge | Add Customers</title>
	<link rel="stylesheet" type="text/css" href='../css/style.css'>

  </head>
  <body>
    <div class="container">

    <h1 class="banner" > Parking Allocation System </h1>

    <nav class="menu">

            
                 <ul>

                        <li> <a href="ic_home.php"> Home | Incharge </a></li>
                        <li> <a href="list_of_customer.php"> List of Customers </a></li>
                        <li id = "current"> <a href="addCustomer.php"> Add Customers </a></li>
                        <li> <a href="upCustomer.php"> Update Customers Info </a></li>
                        <li> <a href="../logout.php"> Sign Out </a></li>
                        

                    </ul>
                
            </nav>

    <div id="wrapper" style="padding-left: 35%; padding-top: 7%;">
    <div id="formDiv">
      <form method="POST" action="addCustomer.php" enctype="multipart/form-data">
       
        <h3>Customer Details :</h3>
        
        <input type="text" id = "AsrhBox"  name="name" placeholder="Enter Name"><br>
        <input type="text" id = "AsrhBox" name="email" placeholder="Enter Email"><br>
        <input type="text"  id = "AsrhBox" name="phn" placeholder="Enter Contact No"><br>

        <br><br><input type="submit" id = "u_btn" name="submit" value="Add Customers">

      </form>
    </div>
    </div>

    <?php

  if(isset($_POST['submit'])){
    include("../connect.php");

    $cname = $_POST['name'];
    $cemail = $_POST['email'];
    $cphn = $_POST['phn'];

    $sql = "INSERT INTO `customers`(`Name`, `Email`, `PhoneNumber`, `SlipID`) VALUES ('$cname' , '$cemail' , '$cphn' ,'')";
    $result = $conn->query($sql);
           
    mysqli_close($conn); 

    if(! $result) {   
      die('Could not enter data: ' . mysqli_error() ); 
    } 
    else {echo "<script>
                        alert('New Customer Added.');
                        window.location.href='addCustomer.php';
                    </script>";
    }
  }  
    
?>

  </div>
</body>
</html>