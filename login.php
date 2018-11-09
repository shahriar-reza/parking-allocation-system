<?php
        session_start();
    include("connect.php"); 
    if(isset($_POST['login'])){
        echo "<script>
                        alert('Not registered. May be registered.');
                        window.location.href='user/user_home.php';
                    </script>";

        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        $query = "SELECT * FROM `accounts` WHERE '$email'=Email AND '$pass'= Password ";
        $result = $conn->query($query);
        $row = mysqli_fetch_assoc($result);
        echo $row['Username'];
        $type = $row['type'];
        
        if(mysqli_num_rows($result) > 0){
            if( $type == 'admin'){
                $_SESSION['email']=$row['Email'];
                $_SESSION['type']=$row['type'];
                header('location: admin/admin_home.php');
            }elseif ($type == 'user') {

                 $_SESSION['email']=$row['Email'];
                 $_SESSION['type']=$row['type'];
                 
                 header('location: user/user_home.php');
            }elseif ($type == 'incharge') {
                 $_SESSION['email']=$row['Email'];
                 $_SESSION['type']=$row['type'];
                 header('location: incharge/ic_home.php');
            }
            else{
            echo " Something wrong!!!";}
        }
    }

    ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/logStyle.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div>
	<h1 class="banner" > Parking Allocation System </h1>

		<nav class="menu">

            
            <ul>

                        <li id = "current"> <a href="index.php"> Home </a></li>
                        <li> <a href="list_of_lot.php"> List of parkinglot </a></li>
                        <li> <a href="#"> How it works </a></li>
                        <li> <a href="login.php"> Sign In </a></li>
                        

            </ul>
                
        </nav>
</div>

	<div class="container">

		

		<img src="img/2.png">
		<form action="" method="post">
			<div class="form-input">
				<input type="text" name ="email" placeholder="Enter Email" required pattern=".+@.+">
			</div>
			<div>
				<input type="password" name ="pass" placeholder="Enter Password" required>
			</div>
			<div>
				<input type="submit" name="login" value="Sign In" class="btn-login">
			</div>
			<h3> <a id = "fpass" href="#" style="color: white;">forget password?</a></h3>
		</form>	
	</div>



	<h2 style="  text-align: center; width: 100%;"><a style=" color:#16a085;" href="register.php"> create an account </a></h2>
</body>
</html>