<?php
	require 'db.php';
?>

<?php
	
	if(isset($_POST['submit']))
	{
		$from_date = $_POST['from_date'];
		$to_date   = $_POST['to_date'];
$sql = "SELECT DISTINCT * FROM `employee` WHERE emp_date BETWEEN '$from_date' AND '$to_date' ORDER BY emp_date";
		
		//echo $sql;
		$query = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($query);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<head>
<style>
.hero-image {
  background-image: url("img/nature.jpg"); /* The image used */
  background-color: #cccccc; /* Used if the image is unavailable */
  height: 650px; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}
</style>
	<title>POLS SOFTECH</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<h1 class="text-center text-primary">Find The Employee Details Between Date</h1>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="hero-image">


<div class="container mx-auto" style="width: 800px;" align="center">
  <form class="form-inline" method="post" enctype="multipart/form-data">
    <div class="form-group mx-auto">
      <label for="inputdefault">From Date</label>
      <input class="form-control" id="inputdefault" type="date" name="from_date">
    </div>
	
	<div class="form-group">
      <label for="inputdefault">To Date</label>
      <input class="form-control" id="inputdefault" type="date" name="to_date">
    </div><br></br>
	<p class="text-center">
		<input type="submit" class="btn btn-primary text-center" name="submit" value="SUBMIT" >
	</p>
	
	<script language="JavaScript" src="js/validator.js"></script>
	
<table id="data_table" class="display text-white" width="100%" align="center">
<thead align="center">
  <tr>
		<td class="special" colspan="7" align="left">Date Wise Employee Details</td>
  </tr>
  <tr id="welcome" class="post">
  <th align="left" valign="top" width="6%" class="text-white"><a href='#' ><p style="color:#FFFFFF">Sl</p></a></th>
	<th align="left" valign="top" class="text-white"><a href='#' ><p style="color:#FFFFFF">Name</p></a></th>
	<th align="left" valign="top" class="text-white"><a href='#' ><p style="color:#FFFFFF">Date</p></a></th>
	<th align="left" valign="top" class="text-white"><a href='#' ><p style="color:#FFFFFF">Status</p></a></th>
  </tr>
</thead>
<tbody align="center">
	<?php
		
		if($count == "0")
		{
			echo '<h1>Sorry Data Not Found</h1>';
		}
		else
		{
			$i=0;
				while($row = mysqli_fetch_assoc($query))
				{
					$i++;
					?>
						<tr>
							<td align="left" valign="top"><b><?php echo $i;?></b></td>
							<td align="left" valign="top"><b><?php echo $row['emp_name'];?></b></td>
							<td align="left" valign="top"><b><?php echo $row['emp_date'];?></b></td>
							<td align="left" valign="top"><b><?php echo $row['emp_status'];?></b></td>
						</tr>
					<?php
				}	
			
		}
	?>
	
	</tbody></table>
  </form>
  </div>
</body>
</html>
