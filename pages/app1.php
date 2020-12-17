<?php

	session_start();
    require '../db/db.php';
    if (isset($_SESSION['usName'])) {
        if ($_SESSION['usName']== "seaa625") {
        	header("location:../home.php");
        }
    }else {
      	header("location:../home.php");
    }
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport"  content="width=device-width, inetial-scale=1" >
	<title>
		S E A A 
	</title>
	<link rel="stylesheet" type="text/css" href="../css/app1.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
     	google.charts.setOnLoadCallback(drawChart);

      	function drawChart() {
      	
        var data = google.visualization.arrayToDataTable([
          ['indate', 'Income', 'Cost'],
          
    		<?php 

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


				$query="select * from ".$u." where indate BETWEEN  '".date("y")."-01-00' AND '".date("y")."-12-31'";
				$q_run=mysqli_query($con,$query);
				// $data=mysqli_fetch_array($q_run)
				//echo "h";
				while($data=mysqli_fetch_array($q_run)){
					$indate=$data['indate'];
					$Income=$data['income'];
					$Cost=$data['cost'];
				?>
				['<?php echo $indate;?>',<?php echo $Income;?>,<?php echo $Cost;?>],
			<?php

			}
			?>
        ]);

        var options = {
          title: 'Company Progres',
          hAxis: {title: 'Date',  titleTextStyle: {color: '#f00'}},
          vAxis: {minValue: 0 ,title: 'Rs',  titleTextStyle: {color: '#f00'} }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart1'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
     	google.charts.setOnLoadCallback(drawChart);

    	function drawChart() {
      	
        var data = google.visualization.arrayToDataTable([
          ['indate', 'Income', 'Cost'],
          
    		<?php 

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


				$query="select * from ".$u."";
				$q_run=mysqli_query($con,$query);
				// $data=mysqli_fetch_array($q_run)
				//echo "h";
				while($data=mysqli_fetch_array($q_run)){
					$indate=$data['indate'];
					$Income=$data['income'];
					$Cost=$data['cost'];
				?>
				['<?php echo $indate;?>',<?php echo $Income;?>,<?php echo $Cost;?>],
			<?php

			}
			?>
        ]);

        var options = {
          title: 'Company Progres',
          hAxis: {title: 'Date',  titleTextStyle: {color: '#f00'}},
          vAxis: {minValue: 0 ,title: 'Rs',  titleTextStyle: {color: '#f00'} }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart0'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
     	google.charts.setOnLoadCallback(drawChart);

      	function drawChart() {
      	$mm=2;
        var data = google.visualization.arrayToDataTable([
          ['indate', 'Income', 'Cost'],
          
    		<?php 

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


				$query="select * from ".$u." where indate BETWEEN  '".date("y")."-".date("m")."-00' AND '".date("y")."-".date("m")."-31'";
				$q_run=mysqli_query($con,$query);
				// $data=mysqli_fetch_array($q_run)
				//echo "h";
				while($data=mysqli_fetch_array($q_run)){
					$indate=$data['indate'];
					$Income=$data['income'];
					$Cost=$data['cost'];
				?>
				['<?php echo $indate;?>',<?php echo $Income;?>,<?php echo $Cost;?>],
			<?php

			}
			?>
        ]);

        var options = {
          title: 'Company Progres This Month',
          hAxis: {title: 'Date',  titleTextStyle: {color: '#f00'}},
          vAxis: {minValue: 0 ,title: 'Rs',  titleTextStyle: {color: '#f00'} },
          legend: { position: 'right' }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart3'));

        chart.draw(data, options);
      }
      $(window).resize(function(){
      	drawChart();
      });
    </script>


</head>
<body >
<div class="nav">
	<nav class="menu">
		<h1 id="cName-app1">  </h1> 
		<ul class="menu_ul">
	    	<li id="l1"><a href="app1.php?link=4" class="ht">Dashboard</a></li>
			<li id="l2"><a href="app1.php?link=1" class="ht">Daily Sale</a></li>
			<li id="l3"><a href="app1.php?link=6" class="ht">Goods Purchases</a></li>
			<li id="l4"><a href="app1.php?link=2" class="ht">Sales Details</a></li>
			<li id="l5"><a href="app1.php?link=5" class="ht">Suppliers Details</a></li>
			<li id="l6"><a href="app1.php?link=3" class="ht">Graph View</a></li>
			<li><a href="logout.php" class="ht">Log Out</a></li>
		</ul>
		<div class="icon">
			<div class="line1"></div>
			<div class="line2"></div>
			<div class="line3"></div>
		</div>

	</nav>
</div>

	<?php
		if ($_GET['link']=='1') {

			echo '<script type="text/javascript">
				document.getElementById("cName-app1").innerHTML="Daily Sale";
			</script> ';

			echo '
				<style type="text/css"> 
					#l2{
						list-style-type: none;
						display: inline-block;
						transition: 0s all;
						height: 00px;
						margin-top: 0px;
					} 
					
					#l2 a{
						color:#f55;
						font-size:30px;
						}
					
					@media only screen and (max-width: 600px){
						#l2 a{
						color:#f55;
						font-size:20px;
						}
					}

				</style>
			';

			
				$income=0;
				$cost=0;
				$date=0;
				

			 
				echo '	<br>
				<div class="all1">
				<form method="POST">
					<div class="sub1"> <br>
					<h1 class="tital"> Insert Your Daily Sale</h1>
					<h2 class="date" > Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="date"  name="date" > </h2>
						<div  class="income"> <br>

							<h1 class="income-t"><u>Income</u>  </h1>
							<h2> Daily Sale : <input type="text" name="sale" placeholder="Rs"> </h2>
							<h2> Other  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; : <input type="text" name="income-other" placeholder="Rs" > </h2>
					
						</div>

						<div class="cost">

							<h1 class="cost-t"><u> Cost</u> </h1>

							<h2> Salary : <input type="text" name="salary" placeholder="Rs"> </h2>
							<h2> Food&nbsp;&nbsp; : <input type="text" name="food" placeholder="Rs"> </h2>
							<h2> Other&nbsp; : <input type="text" name="other-cost" placeholder="Rs"> </h2>

						</div>

						<input type="submit"  name="add" value="Submit" class="submit">

					</form>

				</div>

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
							echo '<script type="text/javascript"> alert("Insert Successfully !") </script>';
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
						if ($income!=0 && $cost!=0 && $date!=0 ) {
						
							$query="INSERT INTO ".$u." VALUES ('$date','$income','$cost')";
							$query_run2=mysqli_query($con,$query);
							if($query_run2){
								echo '<script type="text/javascript"> alert("Insert Successfully !  ") </script>';
							}else{
								echo '<script type="text/javascript"> alert("Insert Unsuccessfully !") </script>';
							}
						
						}else{
							echo '<script type="text/javascript"> alert("Insert Unsuccessfully !") </script>';
						}

						
					}

				}

					
					
					
				
				echo '
					<div id="result">
						<h1> <center><u> Summary </u></center></h1> 
						<h2> &nbsp;&nbsp;&nbsp; Date &nbsp;&nbsp;&nbsp; : '.$date.'</h2>              
						<h2> &nbsp;&nbsp;&nbsp; Income : Rs '.$income.'</h2>
						<h2> &nbsp;&nbsp;&nbsp; Cost &nbsp;&nbsp;&nbsp;&nbsp; : Rs '.$cost.'</h2>
					</div>
					</div>

				';

		}elseif ($_GET['link']=='2') {

			echo '<script type="text/javascript">
					document.getElementById("cName-app1").innerHTML="Sales Details";
				</script> ';

			$GLOBALS['$all']=0;
			$year=date("y");
			$month=date("m");

			function tbl2($query_run3,$query_run4){

				echo '
					<style type="text/css"> 
						@media only screen and (max-width: 1032px){
							.all2{
								height:850px;
							}
						}
						@media only screen and (max-width: 600px){
							.all2{
								height:810px;
							}
						}
					</style>
				';

				$GLOBALS['$totalPurchases']=0;
				$GLOBALS['$totalPayments']=0;
				if (mysqli_num_rows($query_run4)>0){

					while ($row =mysqli_fetch_array($query_run4)){
						$GLOBALS['$totalPurchases'] += $row[4];
						$GLOBALS['$totalPayments'] += $row[5];
					}
				}
				$mt=0;
				$sumincome=0;
				$sumcost=0;
				$allincome=0;
				$allcost=0;
				if (mysqli_num_rows($query_run3)>0) {
					echo '
						<div class="table-show"> 
							
							<table class="tbl-show"> 
								<tr><td class="tbl-head"> Date </td>
								<td class="tbl-head"> Income </td>
								<td class="tbl-head"> Cost </td>
							</tr>
						
					';
					while ($row =mysqli_fetch_array($query_run3)) {
						if (substr($row["indate"],5,2) != $mt && $mt >0 && $GLOBALS['$all']==1) {
							echo '<tr> <td> <br></td> </tr>';
							echo '
					
								<tr>
									<td class="data2">&nbsp &nbsp &nbsp Total</td>
									<td class="data2">Rs. '.$sumincome.'</td>
									<td class="data2">Rs. '.$sumcost.' </td>
								</tr>
							';
							$allincome +=$sumincome;
							$allcost +=$sumcost;
							$sumincome=0;
							$sumcost=0;
							echo '<tr> <td> <br> <br> </td> </tr>';
						}

						echo "
						 	<tr>
								<td class='data'>".$row["indate"]."</td>
								<td class='data'>Rs. ".$row["income"]."</td>
								<td class='data'>Rs. ".$row["cost"]."</td>
							</tr> ";
						$sumincome=$sumincome+$row["income"];
						$sumcost=$sumcost+$row["cost"];
						
						$mt=substr($row["indate"],5,2);
							
					}
					echo '<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
				
						<tr>
							<td class="data2">&nbsp &nbsp &nbsp Total</td>
							<td class="data2">Rs. '.$sumincome.'</td>
							<td class="data2">Rs. '.$sumcost.'</td>
						</tr>
						</table>
						</div>';
							

						if ($GLOBALS['$all']==1) {
							$allincome +=$sumincome;
							$allcost +=$sumcost;
							$profit=$allincome-$allcost-$GLOBALS['$totalPurchases'];
							echo '
							<div id="report"> <br>
								<h id="report-head"><u> Report </u></h> <br>
								<h2> Total Income : </h2>
								<h2 class="rs">Rs. '.$allincome.' </h2>
								<h2> Total Cost : </h2>
								<h2 class="rs">Rs. '.$allcost.' </h2> 
								<h2> Total Purchases :</h2>
									<h2 class="rs"> Rs. '.$GLOBALS['$totalPurchases'].' </h2>
								<h2> Total Payments&nbsp : </h2>
								<h2 class="rs"> Rs. '.$GLOBALS['$totalPayments'].' </h2>
								<h2> Profit : </h2>
								<h2 class="rs"> Rs. '.$profit.' </h2> 
								<h2>  </h2>
							</div>
						';
						}else{
							$profit=$sumincome-$sumcost-$GLOBALS['$totalPurchases'];
							echo '
							<div id="report"> <br>
								<h id="report-head"><u> Report </u></h> <br>
								<h2> Total Income : </h2>
								<h2 class="rs"> Rs. '.$sumincome.' </h2>
								<h2> Total Cost : </h2>
								<h2 class="rs"> Rs. '.$sumcost.' </h2>
								<h2> Total Purchases : </h2>
								<h2 class="rs"> Rs. '.$GLOBALS['$totalPurchases'].' </h2>
								<h2> Total Payments&nbsp : </h2>
								<h2 class="rs"> Rs. '.$GLOBALS['$totalPayments'].' </h2> 
								<h2> Profit : </h2>
								<h2 class="rs">  Rs. '.$profit.' </h2> 
								<h2>  </h2>
							</div>
							';
						}
							
						
						
					} 
				}

			echo '
				<style type="text/css"> 
					#l4{
						list-style-type: none;
						display: inline-block;
						transition: 0s all;
						height: 00px;
						margin-top: 0px;
					} 
					#l4 a{
						color:#f55;
						font-size:30px;
					}
					@media only screen and (max-width: 600px){
						#l4 a{
						color:#f55;
						font-size:20px;
						}
					}
				</style>
			';

			#echo ' <h1 id="cName-app1"> Sales Details </h1> ';


			echo '
			<div class="all2">
				<div id="col2">
					<form method="post"  id="monthvis">
						<input type="submit" name="submit20" value="All" id="submit20" class="submit2" >
						<input type="submit" name="submit21" value="This Year" id="submit21" class="submit2" >
						<input type="submit" name="submit22" value="Last Month" id="submit22" class="submit2" >
						<input type="submit" name="submit23" value="This Month" id="submit23" class="submit2" >

					</form>
				</div>
			';
			if (isset($_POST['submit23']) ) {

				echo '
				<style type="text/css"> 
					#submit23{
						color: #f55;
						border-color: #f22;
						box-shadow:0 0px 25px 0 #f00;
					}					

				</style>
				';

				$query3="SELECT * FROM ".$comm." WHERE indate BETWEEN '".$year."-".$month."-00' AND '".$year."-".$month."-31'";
				$query_run3=mysqli_query($con,$query3);

				$query1="SELECT * FROM supplierdetails WHERE companyName='$comm' AND date BETWEEN '".$year."-".$month."-00' AND '".$year."-".$month."-31' ";
				$query_run1=mysqli_query($con,$query1);
				
				tbl2($query_run3,$query_run1);

			}elseif (isset($_POST['submit22'])) {

				echo '
				<style type="text/css"> 
					#submit22{
						color: #f55;
						border-color: #f22;
						box-shadow:0 0px 25px 0 #f00;
					}

				</style>
				';

				
				$month=$month-1;
				$query3="SELECT * FROM ".$comm." WHERE indate BETWEEN '".$year."-".$month."-00' AND '".$year."-".$month."-31'";
				$query_run3=mysqli_query($con,$query3);
				
				$query1="SELECT * FROM supplierdetails WHERE companyName='$comm' AND date BETWEEN '".$year."-".$month."-00' AND '".$year."-".$month."-31' ";
				$query_run1=mysqli_query($con,$query1);

				tbl2($query_run3,$query_run1);


			}elseif (isset($_POST['submit21'])) {
				$GLOBALS['$all'] = 1;
				
				echo '
				<style type="text/css"> 
					#submit21{
						color: #f55;
						border-color: #f22;
						box-shadow:0 0px 25px 0 #f00;
					}

				</style>
				';


					$comm=$_SESSION['usName'];
					$query="SELECT indate,income,cost FROM ".$comm." WHERE indate BETWEEN '".$year."-01-01' AND '".$year."-12-31'";
					$query_run=mysqli_query($con,$query);

					$query1="SELECT * FROM supplierdetails WHERE companyName='$comm' AND date BETWEEN '".$year."-01-01' AND '".$year."-12-31' ";
					$query_run1=mysqli_query($con,$query1);
					
					tbl2($query_run,$query_run1);

			}elseif (isset($_POST['submit20'])) {
				$GLOBALS['$all'] = 1;
				
				echo '
				<style type="text/css"> 
					#submit20{
						color: #f55;
						border-color: #f22;
						box-shadow:0 0px 25px 0 #f00;
					}

				</style>
				';


					$comm=$_SESSION['usName'];
					$query="SELECT indate,income,cost FROM ".$comm." ";
					$query_run=mysqli_query($con,$query);

					$query1="SELECT * FROM supplierdetails WHERE companyName='$comm' ";
					$query_run1=mysqli_query($con,$query1);
					
					tbl2($query_run,$query_run1);

			}else{
				echo '<div class="default_2">
						<div class="default_2_text">
							<center><span> Watch Your </span></center> <br>
							<center><span> Sales Details </span></center>
						</div>
					</div>
				';
			}

			echo '</div> ';

		}elseif ($_GET['link']=='3') {

			echo '<script type="text/javascript">
				document.getElementById("cName-app1").innerHTML="Graph View";
			</script> ';

			echo '
				<style type="text/css"> 
					#l6{
						list-style-type: none;
						display: inline-block;
						transition: 0s all;
						height: 00px;
						margin-top: 0px;
					} 
					#l6 a{
						color:#f55;
						font-size:30px;
					}
					@media only screen and (max-width: 600px){
						#l6 a{
						color:#f55;
						font-size:20px;
						}
					}

				</style>
			';

			echo '
			<div class="all3">
			<div id="col3">
				<form method="post"  id="monthvis">
					<input type="submit" name="submit20" value="All" id="submit20" class="submit3" >
					<input type="submit" name="submit21" value="This Year" id="submit21" class="submit3" >
					<input type="submit" name="submit23" value="This Month" id="submit23" class="submit3" >

				</form>
			</div>
			
			';

			if(isset($_POST['submit23'])){

				echo '
					<style type="text/css"> 
						#submit23{
							color: #f55;
							border-color: #f22;
							box-shadow:0 0px 25px 0 #f00;
						}

					</style>
				';

				echo '<div id="curve_chart3" class="chart" > </div> ';

			}elseif (isset($_POST['submit22'])) {
				
			}elseif (isset($_POST['submit21'])) {

				echo '
					<style type="text/css"> 
						#submit21{
							color: #f55;
							border-color: #f22;
							box-shadow:0 0px 25px 0 #f00;
						}
	
					</style>
				';

				echo '<div id="curve_chart1" class="chart" > </div> ';

			}elseif (isset($_POST['submit20'])) {

				echo '
					<style type="text/css"> 
						#submit20{
							color: #f55;
							border-color: #f22;
							box-shadow:0 0px 25px 0 #f00;
						}

					</style>
				';

				echo '<div id="curve_chart0" class="chart" > </div> ';

			}else{
				echo '<div class="default_3">
						<div class="default_3_text">
							<center><span> Watch Your Progress </span></center>
							<center><span>  in </span></center>
							<center><span>  Graph </span></center>
						</div>
					</div>
				';
			}
			echo '</div>';

		}elseif ($_GET['link']=='4') {

			echo '<script type="text/javascript">
				document.getElementById("cName-app1").innerHTML="Dashboard";
			</script> ';

			$d=date("d");
			echo '
				<style type="text/css"> 
					#l1{
						list-style-type: none;
						display: inline-block;
						transition: 0s all;
						height: 00px;
						margin-top: 0px;
					} 
					#l1 a{
						color:#f55;
						font-size:30px;
					}

				</style>
			';
			
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

			

			echo '<div class="all4">
				 <div class="text4">
				<center><span class="text1">WELCOME IN</span></center>
				<center><span class="text2"><a href="home.php"> S E A A </a></span></center>
				</div>
			';
			
			$d=$d-1;
			$date4=0;
			$income4=0;
			$cost4=0;
			$profit4=0;
			$Purchases4=0;
			$Payments4=0;

			$query1="SELECT * FROM ".$comm." WHERE indate='".date("y")."-".date("m")."-".$d."'";
			$query_run1=mysqli_query($con,$query1);
			if (mysqli_num_rows($query_run1)>0) {
				while ($row =mysqli_fetch_array($query_run1)) {				
					$date4=$row[0];
					$income4=$row[1];
					$cost4=$row[2];
					$profit4=$income4-$cost4;
				}					
			}

			$query3="SELECT * FROM supplierdetails WHERE date='".date("y")."-".date("m")."-".$d."' AND companyName='$comm'";
			$query_run3=mysqli_query($con,$query3);
			if (mysqli_num_rows($query_run3)>0) {
				while ($row =mysqli_fetch_array($query_run3)) {				
					$Purchases4 +=$row[4];
					$Payments4 +=$row[5];
				}					
			}

			echo '
				<div class="rpt1"><br>
					<h2> Yesterday </h2>
					<h3> Date : '.$date4.'</h3>
					<h3> Income : Rs. '.$income4.' </h3>
					<h3> Cost : Rs. '.$cost4.'</h3>
					<h3> Profit : Rs. '.$profit4.'</h3>
					<h3> Purchases : Rs. '.$Purchases4.'</h3>
					<h3> Payments : Rs. '.$Payments4.'</h3>
				</div><br>
			';
			$xx=0;
			$query4="SELECT supplierName FROM supplierdetails WHERE companyName='$comm' GROUP BY supplierName ";
			$query_run4=mysqli_query($con,$query4);
			if (mysqli_num_rows($query_run4)>0) {
				$n=0;
				while ($row =mysqli_fetch_array($query_run4)) {		
					$xx++;		
					$names[$n]=$row[0];
					$n +=1;
				}					
			}

			

			echo '
				<div class="rpt2"><br>
					<h2> Payments </h2>';
			$invoam=0;
			$payam=0;
			if($xx>0){
				for ($i=0; $i < sizeof($names) ; $i++) { 
					$query5="SELECT * FROM supplierdetails WHERE supplierName='$names[$i]' AND companyName='$comm'";
					$query_run5=mysqli_query($con,$query5);
					if (mysqli_num_rows($query_run5)>0) {
						while ($row =mysqli_fetch_array($query_run5)) {			
							$invoam +=$row[4];
							$payam +=$row[5];
						}
						$Balance4=$invoam-$payam;
						if($Balance4>0){
							echo '
								<h3> You have to pay &nbsp &nbspRs. '.$Balance4.' &nbsp &nbspto&nbsp &nbsp '.$names[$i].' </h3>
							';
							
						}elseif ($Balance4==0) {
							
						}else{
							$Balance4=$Balance4*-1;
							echo '
								<h3> You have a balance &nbsp &nbspRs. '.$Balance4.' &nbsp &nbspfrom&nbsp &nbsp '.$names[$i].' </h3>
							';
						}
						$invoam =0;
						$payam =0;
					}
				}
			}else{
				echo '
						<h3> You have to no payments for Suppliers ! </h3>
					';
			}
			
			
			echo '	
				</div>
			';

			echo '
				
				<div class="profile-div">

					<h2> Profile </h2>
					<h3> Company Name &nbsp;&nbsp; : &nbsp;&nbsp; ' .$c.' </h3>
					<h3> Owner &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; : &nbsp;&nbsp; ' .$_SESSION['usName'].' </h3>
					<h3> E mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; : &nbsp;&nbsp; ' .$e.' </h3>
					<h3> Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;  </h3>
					<h3> Type of Company &nbsp;: &nbsp;&nbsp;  </h3>
				</div>
				</div>
			';

			echo '

			<div id="curve_chart3" class="chart4" > </div> ';

		}elseif ($_GET['link']=='5') {

			echo '<script type="text/javascript">
					document.getElementById("cName-app1").innerHTML="Suppliers Details";
				</script> ';

			echo '
				<style type="text/css"> 
					#l5{
						height: 0px;
					} 
					#l5 a{
						color:#f55;
						font-size:30px;
					}
					@media only screen and (max-width: 600px){
						#l5 a{
						color:#f55;
						font-size:20px;
						}
					}

				</style>
			';

			$n=0;
			echo '<div class="all5"> 
					<div class="master">
						<div id="suppNamelist">
				';
							$input51=0;
							$query5="SELECT supplierName FROM supplierdetails WHERE companyName='$comm'  GROUP BY supplierName";
							$query_run5=mysqli_query($con,$query5);
							if (mysqli_num_rows($query_run5)>0) {
								$input51=1;
								$n=0;
						
								while ($row =mysqli_fetch_array($query_run5)) {
							
									$input5[$n]=$row[0];
							 		$n= $n+1;
								}
						
							}
							echo '  <form method="post"  id="monthvis">';
							if ($input51!=0) {
								for($i=0; $i<sizeof($input5);$i++){
									global $n;
									$n=$i;
									echo '
										<input type="submit" name='.$n.' value='.$input5[$i].' id="submit2'.$n.'" class="submit5">  
									';
								}
							}
							echo '</form> </div> </div>';
					
							if ($input51!=0) {
								
								$GLOBALS['$count']=0;

								for ($i=0; $i < sizeof($input5) ; $i++) { 

									
									if(isset($_POST[$i])){

										echo '<style type="text/css"> 
												@media only screen and (max-width: 1032px){
													.all5{
														height:890px;
													}
												}
												@media only screen and (max-width: 600px){
													.all5{
														height:830px;
													}
												}
											</style>

										';

										$GLOBALS['$count']  +=1;
										$inp=$input5[$i];
										if($input5[0] !==""){
											$query6="SELECT date,InvoiceNo,InvoAmount,payAmount FROM supplierdetails WHERE  companyName='$comm' AND supplierName='$inp' ";
											$query_run6=mysqli_query($con,$query6);
											
											if(mysqli_num_rows($query_run6)>0){

												$t1=0;
												$t2=0;
												$dt=0;

												echo '<style type="text/css"> 
														#submit2'.$i.'{
															color: #f55;
															border-color: #f22;
															box-shadow:0 0px 25px 0 #f00;
														}	
													</style>';

												echo '
													<div id="tbl5">
														<table id="supdetailst"> <br>
															<tr>
																<td id="tblHead-sup"> Date </td>
											 					<td id="tblHead-sup"> Invoice </td>
											 					<td id="tblHead-sup"> Ivnoice Amount </td>
											 					<td id="tblHead-sup"> Pay Amount </td>
															</tr>
															<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
												';
												while ($row=mysqli_fetch_array($query_run6)) {
												echo'
													<tr>
														<td> '.$row[0].'</td>
														<td> '.$row[1].'</td>
														<td> Rs. '.$row[2].'</td>
														<td> Rs. '.$row[3].'</td>
												';
													$t1 +=$row[2];
													$t2 +=$row[3];
								
													$dt=substr($row[0],8);
													echo '</tr>';

												}

												echo '
														</table>
													</div>

													<div class="details">
														<div class="dtl">
															<h1><u> Details </u></h1> 
															<h2> Total Bill Amount : </h2>
															<h2 class="data5"> Rs. '.$t1.'</h2>
															<h2> Total Payment : </h2>
															<h2 class="data5"> Rs. '.$t2.' </h2>';

															$bal=$t1-$t2;
															if($t1 > $t2){
																echo '<h2 style="color: #0f0"> You have to Pay : </h2>
																	<h2 class="data5"> Rs. '.$bal.' </h2>';
															}else{
																$bal=$bal*-1;
																echo '<h2> You have a Balance : </h2>
																	<h2 class="data5"> Rs. '.$bal.' </h2>';
															}
															$query11="SELECT * FROM suppliers WHERE userName='$comm' AND supName='$inp'";
															$query_run11=mysqli_query($con,$query11);
															if(mysqli_num_rows($query_run11)>0){
																while ($row=mysqli_fetch_array($query_run11)){
																echo '</div>
																<div class="spl">
																	<h1> <u> Supplier Details </u> </h1>
																	<h2> Name : </h2>
																	<h2 class="data5"> '.$row[1].'</h2>
																	<h2> Address : </h2>
																	<h2 class="data5"> '.$row[2].' </h2>
																	<h2> Tele : </h2>
																	<h2 class="data5"> '.$row[3].' </h2>
																	<h2> Note : </h2>
																	<h2 class="data5"> '.$row[4].' </h2>
																';
																}

															}
															echo '	
																</div>
													</div>	';
											}
										}
									}
								}if($GLOBALS['$count'] == 0){
									echo '<div class="default_5">
											<div class="default_5_text">
												<center><span> Watch Your </span></center> 
												<center><span> Supplier Details </span></center>
												<center><span> & </span></center> 
												<center><span> Purchase Details </span></center>
											</div>
										</div>
									';
								}
							}
				echo '</div>';

		}elseif ($_GET['link']=='6') {

			echo '<script type="text/javascript">
				document.getElementById("cName-app1").innerHTML="Goods Purchases";
			</script> ';

			$comm=$_SESSION['usName'];
			$query8="SELECT supName FROM suppliers WHERE userName='$comm' GROUP BY supName";
					$query_run8=mysqli_query($con,$query8);
					if (mysqli_num_rows($query_run8)>0) {
						$n=0;
						

						while ($row =mysqli_fetch_array($query_run8)) {
							
							$input6[$n]=$row[0];
							 $n= $n+1;
						}
						
					}

			echo '
				<style type="text/css"> 
					#l3{
						list-style-type: none;
						display: inline-block;
						transition: 0s all;
						height: 00px;
						margin-top: 0px;
					} 
					@media only screen and (max-width: 1032px){
					#l3 a{
						color:#f55;
						font-size:30px;
						}
					}
					#l3 a{
						color:#f55;
						font-size:30px;
					}
					@media only screen and (max-width: 600px){
						#l3 a{
						color:#f55;
						font-size:20px;
						}
					}

				</style>
			';

			echo '
			<div class="all6">
				<div class="invoice">

				<form method="post">

					<h1 class="invoice-t"><u> Goods Purchase</u> </h1>

					<h2>  Date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp : <input type="date"  name="date" class="date6"></h2>

					<h2> Supplier Name &nbsp : <select name="suppName" size="1" >
							<option value=""> -- select --</option>
					';
								for ($i=0; $i < sizeof($input6) ; $i++) { 
									echo '<option value="'.$input6[$i].'">'.$input6[$i].'</option>';
								}
												
					echo ' </select> </h2>

					<h2> Invoice No &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="invoNo" placeholder=""> </h2>

					<h2> Invoice Amount : <input type="text" name="invoAmount" placeholder="Rs"> </h2>

					<h2> Pay Amount &nbsp&nbsp&nbsp&nbsp&nbsp : <input type="text" name="payAmount" placeholder="Rs"> </h2>

					<button name="sub6" class="submit6"> Submit</button>

				</form>

				</div>
			';


			if (isset($_POST['sub6'])) {
				$date6=0;
				$suppName="";
				$invoNo="";
				$invoAmount=0;
				$payAmount=0;
				$state="";
				$date6=$_POST['date'];
				$suppName=$_POST['suppName'];
				$invoNo=$_POST['invoNo'];
				$invoAmount=$_POST['invoAmount'];
				$payAmount=$_POST['payAmount'];		


				if($suppName!="" && $invoAmount>=0 &&  $date6!=0 ){
	
					$query4="INSERT INTO supplierdetails Values ('$comm','$suppName','$invoNo','$date6','$invoAmount','$payAmount')";
					$query_run4=mysqli_query($con,$query4);
					if($query_run4){
						echo '<script type="text/javascript"> alert("Insert Successfully !") </script>';
					}

				}else{
					$state="Not Goods Purchases Today !";
					echo '<script type="text/javascript"> alert(" '.$state.' ") </script>';
				}

			}


				echo '<div id="newsupplier">
					<form method="post">

						<h1> <u> Add New Supplier   </u> </h1>

						<h2> Supplier Name &nbsp &nbsp&nbsp : <input type="text" name="suppName"> </h2>

						<h2> Supplier Address&nbsp : <input type="text" name="suppAdd"> </h2>

						<h2> Contact Number &nbsp : <input type="text" name="tele"> </h2>

						<h2> Note &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp  &nbsp : <textarea name="note" rows="4"> </textarea></h2>

						
						<button name="submit62" class="submit6"> Add</button>

					</form>
					</div>
				';

				$supName="";

				if (isset($_POST['submit62'])) {

					$supName=$_POST['suppName'];
					$suppAdd=$_POST['suppAdd'];
					$tele=$_POST['tele'];
					$note=$_POST['note'];

					if ($supName!="") {

						$query9="SELECT * FROM suppliers WHERE supName='$supName' AND userName='$comm'";
						$query_run9=mysqli_query($con,$query9);
						if (mysqli_num_rows($query_run9)>0) {
							echo '<script type="text/javascript"> alert("This Supplier alrady Exist !") </script>';
							
						}else{

						$query7="INSERT INTO suppliers Values ('$comm','$supName','$suppAdd','$tele','$note')";
						$query_run7=mysqli_query($con,$query7);
						if($query_run7){
							echo '<script type="text/javascript"> alert("Insert Successfully !") </script>';
						}
					}
					}
					
				}

				echo '</div>'; 

		}elseif (is_null($_GET['link'])) {
			echo "Error !";
		}

	?>


	<script type="text/javascript">
		const navslide=()=>{
			const icon = document.querySelector('.icon');
			const nav = document.querySelector('.menu_ul');
			const navli = document.querySelectorAll ('.menu_ul li');


			icon.addEventListener('click',() =>{
				nav.classList.toggle('nav-active');

				navli.forEach((link, index)=>{
					if (link.style.animation) {
						link.style.animation='';
					}else{
						link.style.animation = `menu_ulFade 0.5s ease forwards ${index/7 +0.5}s`;
					}
			});

				icon.classList.toggle('toggle');

		});

			
		}

		navslide();

	</script>	

	<?php  require('footerapp.php');  ?>

</body>
</html>



