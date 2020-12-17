<?php 
	session_start();
	if (isset($_SESSION['usName'])) {
        $name=$_SESSION['usName'];
    }else{
    	$nam="no";
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title> SEAA About Us</title>
	<link rel="stylesheet" type="text/css" href="../css/aboutus.css">
	<meta rel="stylesheet" type="text/css" href="../css/home.css"/>
</head>
<body>

	<div class="topbar">
		<span class="site_name"> <a href="home.php">SEAA</a> </span>
		
	</div>
	<span class="tital">About Us</span>  
	<div class="box">
		<div class="box1"> <br><br>
			<span>Name : Sathsara D.M.S.</span> <br> <br>
			<span>Index No : ICT/17/851</span>
		</div>
		<div class="box1"> <br><br>
			<span>Name : Malsha A.G.P.H. </span> <br> <br>
			<span>Index No : ICT/17/835</span>
		</div>
		<div class="box1"> <br><br>
			<span>Name : Jayalath D.L.N. </span> <br> <br>
			<span>Index No : ICT/17/825 </span>
		</div>
		<div class="row0">
			<div class="box2"> <br><br>
				<span>Name : Abekoon A.M.L.P.V. </span> <br> <br>
				<span>Index No : ICT/17/801 </span>
			</div>
			<div class="box2"> <br><br>
				<span>Name : Dilshan H.V.A.D.</span> <br> <br>
				<span>Index No : ICT/17/808</span>
			</div>
			<div class="box2"> <br><br>
				<span>Name : Heshan B.D.H.</span> <br> <br>
				<span>Index No : ICT/17/822 </span>
			</div>
		</div>
	</div>
	<?php 
		require('footerapp.php');
	 ?>
</body>
</html>