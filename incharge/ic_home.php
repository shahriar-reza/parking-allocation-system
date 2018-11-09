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
    <title> PAS | Incharge Panel </title>
    <link rel="stylesheet" type="text/css" href='../css/style.css'>

  </head>
  <body>
    <div class="container">

    <h1 class="banner" > Parking Allocation System </h1>

    <nav class="menu">

            
                 <ul>

                        <li id = "current"> <a href="ic_home.php"> Home | Incharge </a></li>
                        <li> <a href="list_of_customer.php"> List of Customers </a></li>
                        <li> <a href="addCustomer.php"> Add Customers </a></li>
                        <li> <a href="upCustomer.php"> Update Customers Info </a></li>
                        <li> <a href="../logout.php"> Sign Out </a></li>
                        

                    </ul>
                
            </nav>
    <section class="sec">
      

            <div id="admin_details" style="padding-top: 50px; padding-left: 55%">

                <?php
            		
    				include("../connect.php");  
            		$type = $_SESSION['type'];
            		$query = "SELECT * FROM `accounts` WHERE type = 'incharge' ";
        			$result = $conn->query($query);
        			$row = mysqli_fetch_assoc($result);
        			
        			 $fname = $row['Firstname'];
              	$lname = $row['Lastname'];
              	$uname = $row['Username'];
              	$email = $row['Email'];
              	$phn = $row['phn_no'];
              	$type = $row['type'];
            	?>

              <h3>Firstname : <?php echo $fname ?></h3>
              <h3>Lastname : <?php echo $lname ?></h3>
              <h3>Username : <?php echo $uname ?></h3>
              <h3>Email : <?php echo $email ?></h3>
              <h3>Contact : <?php echo $phn ?></h3>
              <h3>Type : <?php echo $type ?></h3>
              
              
            </div>
    </section>
    
    </div>
  </body>
</html>