<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href='css/style.css'>

	</head>
	<body>
		<div class="container">

		<h1 class="banner" > Parking Allocation System </h1>

			<nav class="menu">

            
                <ul>

                        <li id = "current"> <a href="index.php"> Home </a></li>
                        <li> <a href="list_of_lot.php"> List of parkinglot </a></li>
                        <li> <a href="#"> How it works </a></li>
                        <li> <a href="login.php"> Sign In </a></li>
                </ul>
                
            </nav>
		<section class="sec">
			
			<div id = "search"><br>
			<br>
        	<form id = "search" action="" method="POST">
				<input id="srhBox" type="text" name="user_input" placeholder="Find Your Place" size="">
				<input id="u_btn" type="submit" name="name_search" value="search" onClick="highlightSearch()">
            	<br><br>
            </form>
        	</div>

            <div >

            	<div id="table_div">
        <div id="searchtext">
            
        <?php
                include("connect.php"); 
                function highlightkeyword($str, $search) {
                    $highlightcolor = "#daa732";
                    $occurrences = substr_count(strtolower($str), strtolower($search));
                    $newstring = $str;
                    $match = array();
 
                    for ($i=0;$i<$occurrences;$i++) {
                        $match[$i] = stripos($str, $search, $i);
                        $match[$i] = substr($str, $match[$i], strlen($search));
                        $newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));
                    }
 
                $newstring = str_replace('[#]', '<span style="color: '.$highlightcolor.';">', $newstring);
                $newstring = str_replace('[@]', '</span>', $newstring);
                return $newstring;
 
                }
                if(isset($_POST['name_search'])){
                    
                    $key = $_POST['user_input'];
                $query="SELECT * FROM parkinglot where LotName like '%$key%' or Address like '%$key%'";

                $result = $conn->query($query);

                
                $row = mysqli_fetch_assoc($result);
                if($row == null) {
                echo "<p><b> No Match Found </b></p>";
                }
                else{
                //echo "Registered. :) ";    
                echo "<table >
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
				</tr>";

                while($row != NULL){
                    $name = $row['LotName'];
        			echo"<tr><td>";
                    echo highlightkeyword($name, $key);
                    echo "</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
        			$add = $row['Address'];
        			echo"<td>";
                    echo highlightkeyword($add, $key);
                    echo "</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
        			$loc = $row['LotCapasity'];
        			echo"<td>$loc</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
        			$lo = $row['LotOccupied'];
        			echo"<td>$lo</td>";
                    echo"<th>&nbsp;&nbsp;</th>";
        			$nf = $row['NoOfFloor'];
        			echo"<td>$nf</td></tr>";
                    
                    $row = mysqli_fetch_assoc($result);
                }
            }
            
            }
            $conn = null;

            
            ?>

            </table>
            	
            </div>
		</section>
		
		</div>
	</body>
</html>