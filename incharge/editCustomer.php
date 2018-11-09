<?php
    session_start();
    if(!empty($_SESSION['type']=='incharge')){
       // echo "hello ".$_SESSION['name'];
    }else{
       header('location: ../index.php');
    }
    include("../connect.php");
    $eid =$_GET['Email'];

    $sql= "SELECT * FROM customers WHERE Email = '$eid'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    
    if (!$result){
        die("Error: Data not found..");
    }
    $name=$row['Name'] ;
    $email= $row['Email'] ;                  
    $phn=$row['PhoneNumber'] ;

    if(isset($_POST['save'])){   
        $uname = $_POST['name'];
        $uemail = $_POST['email'];
        $uphn = $_POST['phn'];
        $sql1= "UPDATE customers SET Name ='$uname', Email ='$uemail', PhoneNumber ='$uphn' WHERE Email = '$eid'";
        $result1 = $conn->query($sql1);
        mysqli_close($conn); 

        if(! $result1){   
            die('Could not enter data: ' . mysqli_error() ); 
        }else {
            echo "<script>
                alert('Customer Updated.');
                window.location.href='upCustomer.php';
                </script>";
        }
    }
?>

<html>
    <head>
        <title>Incharge | Update Customers</title>
        <link rel="stylesheet" type="text/css" href='../css/style.css'>
    </head>

    <body>
        <div class="container">
            <h1 class="banner" > Parking Allocation System </h1>
            <nav class="menu">            
                <ul>
                    <li> <a href="ic_home.php"> Home | Incharge </a></li>
                    <li> <a href="list_of_customer.php"> List of Customers </a></li>
                    <li> <a href="addCustomer.php"> Add Customers </a></li>
                    <li id = "current"> <a href="upCustomer.php"> Update Customers Info </a></li>
                    <li> <a href="../logout.php"> Sign Out </a></li>
                </ul>     
            </nav>

            <form method="POST">
            <table id="table_div">
                <tr>
                    <td>Name :</td>
                    <td><input type="text" name="name" value="<?php echo $name ?>"/></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td><input type="text" name="email" value="<?php echo $email ?>"/></td>
                </tr>
                <tr>
                    <td>Phone Number :</td>
                    <td><input type="text" name="phn" value="<?php echo $phn ?>"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input id="u_btn" type="submit" name="save" value="save" /></td>
                </tr>
            </table>
        </div>
    </body>
</html>