
	<?php
	session_start();
	//登陆
	//if (!isset($_POST['submit']))
		//exit ('illegal access exception');
	include "connect_db.php";
		$username=$_POST['username'];
		$password=$_POST['password'];
		$url="index.html";
		$result = mysql_query ("select* from login where username='$username' && password='$password'");
		if (!$result)
			echo 'you are not registered yet!click here <a href="sign_up.html;">register</a>';
		else
		{
			$_SESSION['username']=$username;
			$_SESSION['id']=$result['id'];
			header('Location:index.html');
		}
		mysql_close($conn);
			
	?>