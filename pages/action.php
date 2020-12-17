<?php
	session_start();
    require '../db/db.php';

			if (isset($_POST['log-btn'])) {  /* 'log-btn' kiyanne button eke name ekata dunnu nama */
				
				$uname=$_POST['usName']; /* 'usName' kiyanne input tag eke name ekata dunnu nama */
				$psw=$_POST['pass'];
				$query="SELECT * FROM usres WHERE username='$uname' AND password='$psw'"; /* user name ekai password ekai harida balana query eka */
				$query_run = mysqli_query($con,$query); /* query eka raun karana command eka  */

				$adminun="seaa625"; /* meeka adaala na */
				$adminpw=""; /* meeka adaala na */

                    	if (mysqli_num_rows($query_run)>0) /* uda run karapu query eke result ekak thiyenawada kiyala balanne methana  */
                    	{ 
							$_SESSION['usName']=$uname;
							$query="SELECT companyName FROM usres WHERE username='$uname'"; 
							$query_run = mysqli_query($con,$query);
							$data=array();
							while ($row=mysqli_fetch_assoc($query_run)) {
				            	//echo gettype($row);
            					$data[]=$row;
							}
							foreach ($data[0] as $d ) {
								//echo $d;
							}
							$_SESSION['cname']=$d;
							echo '<script type="text/javascript"> alert(" LogIn Sucssesfuln!") </script>';
                   			header('location:app1.php?link=4');
                   		}else if($uname==$adminun){
                   			$_SESSION['cname']="Admin";
                   			$_SESSION['usName']=$adminun;
                   			header('location:admin.php?link=0');
                   		}

                   		else {
                   			echo '<script type="text/javascript"> alert("Invalid username or password !") </script>';
                   			header('location:../home.php');
                   		}
			}
		?>