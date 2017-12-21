<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) 
	{
		if (empty($_POST['username']) || empty($_POST['password'])) 
		{
			$error = "Username or Password is invalid";
		}
	else
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$conn = new mysqli("localhost", "root", "", "company");
		// To protect MySQL injection for Security purpose
		/*$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($username);
		$password = mysqli_real_escape_string($password);*/
		// Selecting Database

		// SQL query to fetch information of registerd users and finds user match.
		$sql = "select * from Login where username= '" 
                        .$_POST["username"]     
                        ."' and password ='" 
                        .$_POST["password"] 
                        ."' ";
                $res = mysqli_query($conn,$sql);
                $row_cnt = mysqli_num_rows($res);
		if ($row_cnt == 1) 
			{
				$_SESSION['login_user']=$username; // Initializing Session
				header("location: profile.php"); // Redirecting To Other Page
			} 
			else 
			{
				$error =  "Rows are:";
			}
		mysqli_close($conn); // Closing Connection
	}
	
?>