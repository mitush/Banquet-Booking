<!DOCTYPE html>
<html>
<head>
	<title>Old Bookings</title>
</head>
<body>
<center>
	<?php
	 include("../Homepage/server.php");
     if (!isset($_SESSION)){
             session_start();
         }
    	$mob = $_SESSION['mob'];           
       	$sql = "select * from Booking where mobile =$mob";
       	$res = $conn->query($sql);
       	if($res->num_rows ==0){
       		echo "<script language='javascript' type='text/javascript'>alert('No data')</script> " ;
       	}
       	else{
			while ($row = mysqli_fetch_assoc($res)) 
        	{ 
    			echo 'Mobile No:'.$row['Mobile'].'<br>
				City:'.$row['City'].'<br>		
				State:'.$row['State'].'<br>
				Booking Start Date:'.$row['Book_Date'].'<br>
				Booking Ending Date:'.$row['End_Date'].'<br>
				No of Guests:'.$row['Guests'].'<br>
				Additional Info:'.$row['Additional'].'<br>';
				echo "------------------------------------------------------------<br>";
			 }
		
       	}
       	echo '<a href="javascript:window.close();">CLOSE WINDOW</a>'; 
	?>
	</center>
</form>
</body>
</html>