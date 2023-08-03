<?php
	$con=mysqli_connect("localhost","root","","user_authentication");

	if(mysqli_connect_error())
	{
		echo "<script>alert('Cannot connect to the database');</script>";
		exit();
	}
?>
