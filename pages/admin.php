<?php

	session_start();
    require '../db/db.php';
    if (isset($_SESSION['cname'])) {
        
        }else {
        	header("location:../home.php");
        
        }
	

?>

<!DOCTYPE html>
<html>
<head>
	<title> Admin </title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<div class="header">
		<h1 class="admin_header"> ADMINISTRATION VIEW </h1>
	</div>

<h2 class="site_name"> <a href="../home.php"> SEAA </a> </h2>
<div class="menu_bar">

	<ul>
		<li>
			<h2 class="admin1"><a href="?link=1#link1" >User's List</a></h2>
		</li>
		<li>
			<h2 class="admin2"><a href="?link=2#link2">View User Table</a></h2>
		</li>
		<li>
			<h2 class="admin3"><a href="?link=3#link3">Supplier Details Table</a></h2>
		</li>
		<li>
			<h2><a href="logout.php">Exit</a></h2>
		</li>
	</ul>
</div>

<?php 
	if ($_GET['link']=='0') {

	}
	elseif ($_GET['link']=='1') {

		$query="SELECT * FROM usres ";
		$query_run = mysqli_query($con,$query);

		echo "<div class='link1' id='link1'>
				<h1 class='usTable_title'> User's Table </h1>
				<table class='user_table'>
				<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<td> Company Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
					<td> User Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
					<td> E-Mail &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
					<td> Password &nbsp&nbsp&nbsp</td>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		";

		if ($query_run-> num_rows >0) {
			while ($row =mysqli_fetch_array($query_run)) {
				echo "
					<tr class='table_row'>
						<td class='table_data'>".$row["companyName"]."</td>
						<td class='table_data'>".$row["username"]."</td>
						<td class='table_data'>".$row["email"]."</td>
						<td class='table_data4'>".$row["password"]."</td>
					</tr> ";
						
			}
			echo "</table></div>";
		}
	}
	elseif ($_GET['link']=='2') {

		echo '
			<style type="text/css">
				.admin2{
					color: #00f;
				}
			</style>
		';

		$sum_income=0;
		$sum_cost=0;
		$tblnm="";

		echo "
			<div class='link1' id='link2'>
				<form method='post'>
					<div class='search'>
						<h2> <input type='text' name='input' placeholder='Enter User Name'> 
						<button type='submit' name='s1' >Search </button></h2>
			
					</div>
				</form>
		";

		if(isset($_POST['s1'])){

			$tblnm=$_POST['input'];

			if($tblnm !== ""){
				$query="SELECT companyName FROM usres WHERE username='$tblnm'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0){
					$row =mysqli_fetch_array($query_run);
					$name2=$row["companyName"];
					echo "
						<style type='text/css'>
							.usdataTable_title{
								display: none;
							}
						</style>
					<center> <h1 class='usdataTable_title2'> ".$name2." </h1> </center> 
						
					";
				}
		
			}

			$query="SELECT * FROM ".$tblnm." ";
			$query_run = mysqli_query($con,$query);

		
			if (mysqli_num_rows($query_run)>0) {
				echo "
					<div class='usdata'>
						<table class='userdata_table'>
							<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
							<tr>
								<td> Date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
								<td> Income &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
								<td> Cost &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
							</tr>
							<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
							while ($row =mysqli_fetch_array($query_run)) {
								echo "
									<tr class='table_row'>
										<td class='table_data'>".$row["indate"]."</td>
										<td class='table_data'> Rs. ".$row["income"]."</td>
										<td class='table_data'> Rs. ".$row["cost"]."</td>
									</tr> ";
								$sum_income=$sum_income+$row["income"];
								$sum_cost=$sum_cost+$row["cost"];
							}
							echo "
								<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
								<tr>
									<td>Total</td>
									<td> Rs. ".$sum_income."</td>
									<td> Rs. ".$sum_cost."</td>
								</tr>

						</table> 
					</div>";
			}else{
				echo '<script type="text/javascript"> alert("Invalid User Name or User Table is Empty !") </script>';
			}
			echo "</div>";
		}
	}
	elseif ($_GET['link']=='3'){
		
		echo '
		
			<div class="link1"  id="link3">
			<center> <h1> Supplier Details Table </h1> </center>
			<div class="table3">
		';

		$query="SELECT * FROM suppliers ORDER BY userName " ;
		$query_run=mysqli_query($con,$query);
		if(mysqli_num_rows($query_run)>0){
			
			echo '
				<table class="userdata_table">
					<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
					<tr>
						<th> User Name </th>
						<th> Supplier Name </th>
						<th> Address </th>
						<th> Tele </th>
						<th> Note </th>
					</tr>
					<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
			';
			while ($row =mysqli_fetch_array($query_run)) {
				
				echo '
					<tr class="table_row">
						<td class="table_data">'.$row[0].'</td>
						<td class="table_data">'.$row[1].'</td>
						<td class="table_data">'.$row[2].'</td>
						<td class="table_data">'.$row[3].'</td>
						<td class="table_data">'.$row[4].'</td>
					</tr>
				';
			}

		}else 


		echo '
			</div>
			</div>';

	}

 ?>

	

</body>
</html>