<?php
	session_start();
	$connection = new mysqli("localhost", "root", "", "survey");
	$user_check=$_SESSION['login_user'];
	$qry = "select username from login where username='".$user_check."'";
	$ses_sql=mysqli_query($connection,$qry);
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session =$row['username'];
	if(!isset($login_session))
		{
			mysqli_close($connection); // Closing Connection
			header('Location: index.php'); // Redirecting To Home Page
		}	
?>