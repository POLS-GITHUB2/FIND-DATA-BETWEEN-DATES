<?php
	$conn=mysqli_connect("localhost","root","","data_date_wise");
	if(!$conn)
	{
		die("could not connect Database".mysqli_connect_error());		
	}
?>