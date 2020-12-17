<?php
	session_start();
    require '../db/db.php';

			if(isset($_POST['sign-btn'])){
   
                
                $companyname=$_POST['cmpName'];
                $userName=$_POST['usName'];
                $email=$_POST['email'];
                $password=$_POST['1pass'];
                $repassword=$_POST['2pass'];
                //$file=$_FILES['file'];

                //$extention=array("jpg","png","gif","jpeg");'seaa'.'{$userName}'


                if($password==$repassword){
                    $query="SELECT * FROM usres WHERE username='$userName'";
                    $query_run =mysqli_query($con,$query);

                    if (mysqli_num_rows($query_run)>0) {
                        echo '<script type="text/javascript"> alert("User already exists") </script>';
                    }
                    else
                    {

                        $fname=$_FILES['file']['name'];
                		$ftempname=$_FILES['file']['tem_name'];
                		$fsize=$_FILES['file']['size'];
                		$ferror=$_FILES['file']['error'];
                		$ftype=$_FILES['file']['type'];
                		$fileext=explode('.', $fname);
                		$fileActualext=strtolower(end($fileext));
                		$extention=array("jpg","png","gif","jpeg");
                		$fnamenew=uniqid('',true).".".$fileActualext;
                		$fileDestination='img/'.$fnamenew;
                		move_uploaded_file($ftempname, $fileDestination);
                        
                        $query="insert into usres values('$companyname','$userName','$email','$password')";
                        $query_run=mysqli_query($con,$query);
                        if ($query_run) {

                            $sql = "CREATE TABLE ".$userName." (
                                indate DATE PRIMARY KEY,
                                income DOUBLE NOT NULL,
                                cost DOUBLE NOT NULL

                            )";
                
                            $query_run=mysqli_query($con,$sql);

                            echo '<script type="text/javascript"> alert("User registered !") </script>';
                            header("location:home.php");
                            
                        }else{
                            echo '<script type="text/javascript"> alert("error!") </script>';
                        }
                    }
                }else{
                    echo '<script type="text/javascript"> alert("Password is no matched !") </script>';
                }


            }


		?>