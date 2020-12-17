<?php
	session_start();
    require 'php/db.php';
    if (isset($_SESSION['usName'])) {
        //header("location:app1.php?link=1");
        $un=$_SESSION['usName'];
     }else{
     	header("location:home.php");
     }

    $query="SELECT companyName FROM usres WHERE username='$un'";
    $query_run = mysqli_query($con,$query);
    $row =mysqli_fetch_array($query_run);

    
?>

<!DOCTYPE html>
<html>
<head>
	<title> SEAA - <?php echo ''.$row[0].' '; ?></title>
	<link rel="stylesheet" type="text/css" href="userlog.css">
</head>
<body>

	<center> <h id="header"> <?php echo ''.$row[0].' '; ?> </h> </center> 
	<h id="username"> User : <?php echo ''.$un.' '; ?>  </h>
	
	<h2 class="site_name"> <a href="home.php"> SEAA </a> </h2>
	<div class="menu_bar">
	
	<ul>
		<li>
			<h2><a href="app1.php?link=1">Daily Sale</a></h2>
		</li>
		<li>
			<h2><a href="app1.php?link=2">Sales Details</a></h2>
		</li>
		<li>
			<h2><a href="app1.php?link=3">Graph View</a></h2>
		</li>
		<li>
			<h2><a href="app1.php?link=5">Supplier Details</a></h2>
		</li>
		<li>
			<h2><a href="app1.php?link=4">Profile</a></h2>
		</li>
		<li>
			<h2><a href="logout.php">Log Out</a></h2>
		</li>
	</ul>
</div>



<!-- <?php
		if ($_GET['link']=='1') {
			
				$income=0;
				$cost=0.0;
				$date=0.0;
					
			 
				echo '	
				<h1 id="cName-app1"> Daily Sale Details </h1>
				<form method="POST">
				<div  class="income">
					<h2 class="date" > Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="date"  name="date"> </h2>

					<h2 class="income-t"><u>Income</u>  </h2>
					<h2 class="tbox"> Daly Sale : <input type="text" name="sale" placeholder="Rs"> </h2>
					<h2 class="tbox"> Other  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="text" name="income-other" placeholder="Rs" > </h2>
					
				</div>


				<div class="cost">

					<h2 class="cost-t"><u> Cost</u> </h2>

					<h2 class="tbox"> Salary : <input type="text" name="salary" placeholder="Rs"> </h2>
					<h2 class="tbox"> Food&nbsp;&nbsp; : <input type="text" name="food" placeholder="Rs"> </h2>
					<h2 class="tbox"> Other&nbsp; : <input type="text" name="other-cost" placeholder="Rs"> </h2>

				</div>

				<div class="invoice">

					<h2 class="invoice-t"><u> Goods Purchase</u> </h2>

					<h2 class="tbox"> Supplier Name &nbsp : <input type="text" name="suppName" placeholder=""> </h2>

					<h2 class="tbox"> Invoice No &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="invoNo" placeholder=""> </h2>

					<h2 class="tbox"> Invoice Amount : <input type="text" name="invoAmount" placeholder="Rs"> </h2>

					<h2 class="tbox"> Pay Amount &nbsp&nbsp&nbsp&nbsp&nbsp : <input type="text" name="payAmount" placeholder="Rs"> </h2>

				</div>

					<input type="submit"  name="add" value="Submit" class="submit">

				
					 
				</form>



				';

				    
		
				if (isset($_POST['add'])) {
					$sale=(float)$_POST['sale'];
					$otheri=(float)$_POST['income-other'];
					$salary=(float)$_POST['salary'];
					$food=(float)$_POST['food'];
					$otherc=(float)$_POST['other-cost'];
					$income=($sale+$otheri);
					$cost=($salary+$food+$otherc);
					$date=$_POST['date'];



					$find1="SELECT * FROM ".$u." WHERE indate='$date'";
					$query_run=mysqli_query($con,$find1);
					$find2="SELECT * FROM ".$u." WHERE indate !='$date'";
					$query_run3=mysqli_query($con,$find2);
					if (mysqli_num_rows($query_run)>0) {
						$query="UPDATE ".$u." SET income='$income',cost='$cost' WHERE indate='$date'";
						$query_run1=mysqli_query($con,$query);
						if($query_run1){
							echo '<script type="text/javascript"> alert("Data Inserted !") </script>';
						}else{
							echo '<script type="text/javascript"> alert("Error !") </script>';
						}
						
					}
					else{
						$comm=$_SESSION['usName'];
						$query2="SELECT username FROM usres WHERE username='$comm'";
            			$cname=mysqli_query($con,$query2);
            			$data2=array();
            			while ($row=mysqli_fetch_assoc($cname)) {
            				//echo gettype($row);
            				$data2[]=$row;
						}
						foreach ($data2[0] as $u ) {
							//echo $d;
							
						}
						if ($income!=0 && $cost!=0 && $date!=0.0 ) {
						
							$query="INSERT INTO ".$u." VALUES ('$date','$income','$cost')";
							$query_run2=mysqli_query($con,$query);
							if($query_run2){
								echo '<script type="text/javascript"> alert("Data Inserted ! \n    Report    \n  Income : Rs.'.$income.'  \n  Cost : Rs.'.$cost.' ") </script>';
							}else{
								echo '<script type="text/javascript"> alert("Data is not Inserted !") </script>';
							}
						
						}else{
							echo '<script type="text/javascript"> alert("Date is not entered !") </script>';
						}


						$suppName="";
						$invoNo="";
						$invoAmount=0;
						$payAmount=0;
						$state="";

						$suppName=$_POST['suppName'];
						$invoNo=$_POST['invoNo'];
						$invoAmount=$_POST['invoAmount'];
						$payAmount=$_POST['payAmount'];


						if($suppName!="" && $invoAmount>=0 && $payAmount>=0 && $date!=0.0 ){
	
							$query4="INSERT INTO supplierdetails Values ('$comm','$invoNo','$date','$invoAmount','$payAmount')";
							$query_run4=mysqli_query($con,$query4);
							if($query_run4){
								echo '<script type="text/javascript"> alert("Data is Inserted !") </script>';
							}
	
						}else{
							$state="Not Goods Purchases Today !";
							echo '<script type="text/javascript"> alert(" '.$state.' ") </script>';
						}

						
					}


					
					}

					
					
					
				
				echo '
				<div id="result">
					<h2 class="tbox"> Date : '.$date.'</h2>              
					<h2 class="tbox"> Total Income : Rs '.$income.'</h2>
					<h2 class="tbox"> Total Cost : Rs '.$cost.'</h2>
				</div>



				<a href="userlog.php"> lllllllllll</a>
				';
			
		}elseif ($_GET['link']=='2') {

			echo '
			<h1 id="cName-app1"> Sales Details </h1>
			<div class="table-show">
			<table class="tbl-show"> 
			<h2 class="tbl-head"> Date  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Income  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Cost </h2>';

			$comm=$_SESSION['usName'];
			$query="SELECT indate,income,cost FROM ".$comm."";
			$query_run=mysqli_query($con,$query);
			if ($query_run-> num_rows >0) {
				while ($row =mysqli_fetch_array($query_run)) {
					echo "<tr>
						<td class='data'>".$row["indate"]."</td>
						<td> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td class='data'>Rs.</td>
						<td class='data'>".$row["income"]."</td>
						<td> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td><td class='data'>Rs.</td>
						<td class='data'>".$row["cost"]."</td>
						</tr> ";

				}
				echo "</table></div>";
			}else
			{
				echo "Data was not found !";
			}

		}elseif ($_GET['link']=='3') {

			echo '
				<h1 id="cName-app1"> Graph View </h1>
				<div id="curve_chart" class="chart">

				</div>
			';

		}elseif ($_GET['link']=='4') {
			
			$comm=$_SESSION['usName'];

			$query2="SELECT email FROM usres WHERE username='$comm'";
            $cname=mysqli_query($con,$query2);
            $data2=array();
            while ($row=mysqli_fetch_assoc($cname)) {
            	//echo gettype($row);
            	$data2[]=$row;
			}
			foreach ($data2[0] as $e ) {
				//echo $d;
				
			}


			$query2="SELECT companyName FROM usres WHERE username='$comm'";
            $cname=mysqli_query($con,$query2);
            $data2=array();
            while ($row=mysqli_fetch_assoc($cname)) {
            	//echo gettype($row);
            	$data2[]=$row;
			}
			foreach ($data2[0] as $c ) {
				//echo $d;
				
			}


			echo '
				<h1 id="cName-app1"> Profile </h1>
				<div class="profile-div">
					<h2> Company Name &nbsp;&nbsp; : &nbsp;&nbsp; ' .$c.' </h2>
					<h2> Owner &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; : &nbsp;&nbsp; ' .$_SESSION['usName'].' </h2>
					<h2> E mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; : &nbsp;&nbsp; ' .$e.' </h2>
					<h2> Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;  </h2>
					<h2> Type of Company &nbsp;: &nbsp;&nbsp;  </h2>
				</div>
			';

		}elseif ($_GET['link']=='5'){


			echo '
					<h1 id="cName-app1"> Supplier Details </h1>



			';




		}elseif (is_null($_GET['link'])) {
			echo "Error !";
		}

		 ?> -->






</body>
</html>