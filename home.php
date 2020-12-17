<?php
	session_start();
    require 'db/db.php';
    if (isset($_SESSION['usName'])) {
        //header("location:app1.php?link=1");
        }

    
?>

<!DOCTYPE >
<html>
<head>
	<meta name="viewport"  content="width=device-width, inetial-scale=1" >
	<title>
		S E A A - Home
	</title> 
	<script src="js/jquery-3.4.1.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/home.css"/>

</head>

<body id="body">
	
	<?php
		if (isset($_SESSION['cname'])){
			if($_SESSION['cname']=="Admin"){
				echo '
				<div class="in-div">
					<h2 id="site_name" class="blink-image" alt="Small Enterprise Account Assist">SEAA</h2>
					<ul class="in-ul">
						<li><a class="in-a" href="pages/admin.php?link=0" > '.$_SESSION['cname'].' </a></li>
						<li><a class="in-a" href="pages/logout.php"  >Log Out </a></li>
					</ul>
				</div>';
			}else{
				echo '
				<div class="in-div">
					<h2 id="site_name" class="blink-image" alt="Small Enterprise Account Assist">SEAA</h2>
					<ul class="in-ul">
						<li><a class="in-a" href="pages/app1.php?link=4" > '.$_SESSION['cname'].' </a></li>
						<li><a class="in-a" href="pages/logout.php"  >Log Out </a></li>
					</ul>
				</div>';
			
			}
		}
		 else{?>
			
			<div class="in-div">
				<h2 id="site_name" class="blink-image">SEAA</h2>
				<ul class="in-ul">
					<li><a class="in-a" onclick="document.getElementById('login').style.display='block'">Log In</a></li>
					<li><a class="in-a" onclick="document.getElementById('signup').style.display='block'">Sign Up</a></li>
				</ul>
			</div> 
	<?php } ?>
		

	

<script>
// When the user scrolls down 20px from the top of the document, slide down the navbar
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
  		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    		document.getElementById("in-div").style.top = "0";
  		} else {
    		document.getElementById("in-div").style.top = "0px";
  		}
	}

</script>

<br>


<div class="slideshow-container">

	<div class="mySlides fade">
    	<img src="img/0.jpeg" class="slid">
	</div>

	<div class="mySlides fade">
    	<img src="img/back.jpg" class="slid">
	</div>

	<div class="mySlides fade">
    	<img src="img/appbg.jpg" class="slid">
	</div>

</div>

<br>

<div style="text-align:center">
	<span class="dot"></span> 
  	<span class="dot"></span>
  	<span class="dot"></span> 
</div>

	<img src="img/656.jpg" class="home-img0">

<div class="site_name_text">
	<center> <span id="s1"> Small Enterprise </span> </center> <br> 
	<center> <span id="s2"> Account Assist</span>  </center>
</div>

<div class="box1">
	<div class="box_img1">
		<img src="img/input.jpg">
		<h1 class="box1_text">Insert Data</h1>
	</div>
	<div class="box_img1">
		<img src="img/pro.png">
		<h1 class="box1_text"> Process</h1>
	</div>
	<div class="box_img1">
		<img src="img/out.jpg">
		<h1 class="box1_text"> Represent</h1>
	</div>
</div>



<script>
	var slideIndex = 0;
	showSlides();

	function showSlides() {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("dot");
	  for (i = 0; i < slides.length; i++) {
	    slides[i].style.display = "none";  
 	 }	
  	slideIndex++;
  	if (slideIndex > slides.length) {slideIndex = 1}    
	  	for (i = 0; i < dots.length; i++) {
	    	dots[i].className = dots[i].className.replace(" active", "");
	  	}	
  		slides[slideIndex-1].style.display = "block";  
	  	dots[slideIndex-1].className += " active";
	 	 setTimeout(showSlides, 9000); // Change image every 2 seconds
	}

</script>


	<img src="img/home-img3.png" class="home-img1">

	<h1 class="text-home1"> Any Device  <br> &nbsp &nbsp &nbsp &nbsp  &nbsp AnyWhere </h1>


	<div id="login" class="modal">
		<form class="modal-content animate" action="pages/action.php"  method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('login').style.display='none'" class="close" title="Close">&times</span>
				<img src="img/login.png" alt="Avatar" class="avatar">
				<h1 style="text-align:center" class="popup-tital">Log In</h1>
			</div>
			<div class="container">				
				<input type="text" name="usName" placeholder="Enter User Name" required>
				<input type="password" name="pass" placeholder="Enter Password" required>
				<button type="submit"  id="btn" name="log-btn"> Log In </button>
			</div>
		</form>
	</div>

	<div id="signup"  class="modal">
		<form class="modal-content animate"  method="post" action="pages/action1.php">
			<div class="imgcontainer">
				<span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close">&times</span>
				<img src="img/signup.png"  alt="Avatar" class="avatar">
				<h1 style="text-align:center" class="popup-tital">Sign Up</h1>
			</div>
			<div class="container">				
				<input type="text" id="cmpName" name="cmpName" placeholder="Company Name" required oninput="check_cname()"></h2>
				<input type="text" id="usName" name="usName" placeholder="User Name" required oninput="check_uname()"></h2>
				<input type="text" id="email" name="email" placeholder="E-mail" required oninput="check_email()"></h2>
				<input type="password" id="pass1" name="1pass" placeholder="Password" required oninput="check_pass1()"></h2>
				<input type="password" id="pass2" name="2pass" placeholder="Re-Enter Password " required oninput="check_pass2()"></h2>
				
				<button type="submit" name="sign-btn" id="btn">Sign Up</button>
			</div>
		</form>
	</div>
	<script src="js/validate.js"></script> 
	
	<script>
		var modal=document.getElementById('login');
		window.onclick=function (event) {

			if (event.target==modal) {
				modal.style.display="none";
			}

		}
	</script>
	<script>
	
		var modal=document.getElementById('signup');
		window.onclick=function (event) {
			if (event.target==modal) {
				modal.style.display="none";
			}

		}
	</script>
	
	<?php 
		include('pages/footer.php');
	 ?>
	

</body>
</html>