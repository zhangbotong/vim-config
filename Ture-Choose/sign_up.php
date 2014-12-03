<html lang="en"><!--<![endif]--> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="scripts/jquery.min.js"></script>
		<script src="sjs/bootstrap.min.js"></script>
	</head>
<body>
<?php
	if (!isset($_POST['submit']))
		exit ('非法访问');
	include "connect_db.php";
		$username=$_POST['username'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];
		$url="login.html";
		//验证用户名密码是否符合规范
		if (!preg_match('/^[\w\x80-\xff]{3,15}$/', $username))
			exit('错误：用户名不符合规定。<a href="javascript:history.back(-1);">返回</a>');
		if (strlen($password)<6)
			exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');
		//检测用户名是否已经存在
		$check_query=mysql_query("select * from login
		where username='$username'");
		if (mysql_fetch_array($check_query))
		{
			echo 'error：username :',$username,' already exists<a href="javascript:history.back(-1);">return</a>';
			exit;
		}
		$result=mysql_query("insert into login (username,age,gender,
		phone,password) VALUES ('$username','$age','$gender',
		'$phone','$password')");
		if (!$result)
		{
			echo "注册失败".'<br />';
			echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
		}
			
		else
		{
			exit('<h2>Sign up secceed! please click here <a href="login.html">login</a>');
		}
		mysql_close($conn);
?>
</body>
</html>