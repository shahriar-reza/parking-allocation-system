<?php
	include("connect.php");
	$passErr = "";
	if(isset($_POST['submit'])){
		if(($_POST['password']==$_POST['rpassword'])){
		 


		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$username = $_POST['uname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		

		$phn = $_POST['contact'];

		$sql = "INSERT INTO `accounts` (`Firstname`, `Lastname`, `Username`, `Email`, `Password`,`phn_no`,`type`) VALUES ('$firstname','$lastname','$username','$email','$password','$phn','user')";

		$res = $conn->query($sql);
		mysqli_close($conn);
            if(!$res) {
                echo "<script>
                        alert('Can't register your account. Try Again!!);
                        window.location.href='register.php';
                    </script>";
            }
            else{
                echo "<script>
                        alert('Welcome! you are now registered.');
                        window.location.href='index.php';
                    </script>";    
            }
            $conn = null; 
	}
	else{
            $passErr = "* Passwords Don't Match";
        }  
}
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1 class="banner" > Parking Allocation System </h1>

			<nav class="menu">

            
                <ul>

                        <li id = "current"> <a href="index.php"> Home </a></li>
                        <li> <a href="list_of_lot.php"> List of parkinglot </a></li>
                        <li> <a href="#"> How it works </a></li>
                        <li> <a href="login.php"> Sign In </a></li>
                </ul>
                
            </nav>
	<div id="wrapper" style="align-items: center;">
		<div id="formDiv" style="align-items: center;">
			<form method="POST" action="register.php" enctype="multipart/form-data">
			
			<input type="text" name="fname" style="height: 30px; width: 200px; padding: 10px;" placeholder="Enter First Name" required><br>
			<input type="text" name="lname" style="height: 30px; width: 200px; padding: 10px;" placeholder="Enter Last Name" required><br>
			<input type="text" name="uname" style="height: 30px; width: 200px; padding: 10px;" placeholder="Enter Username" required><br>
			<input type="text" name="email" style="height: 30px; width: 200px; padding: 10px;" placeholder="Enter Email" required><br>
			<input type="password" name="password" style="height: 30px; width: 200px; padding: 10px;" placeholder="Enter Password" required><br>
			<input type="password" name="rpassword" style="height: 30px; width: 200px; padding: 10px;" placeholder="Repeat Password" required>
			<span class="error"><b><?php echo $passErr; ?></b></span></td> <br>
			<input type="text" name="contact" style="height: 30px; width: 200px; padding: 10px;" placeholder="Enter your contact Number" required><br>

			<input id="u_btn" type="submit" name="submit" value="Register">
			
				
			</form>
		</div>
	</div>

</body>
</html>