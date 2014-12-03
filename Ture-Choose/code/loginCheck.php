<title>用户登录验证</title>
<?php
header("Content-type: text/html; charset=utf-8"); 
include "include/common.php";
if($_POST["do"]=="login")									//单击了“提交”按钮
{
session_start();
$user=trim($_POST['user']);
$pass=trim($_POST['pass']);
if($user==ADMIN_USER && $pass==ADMIN_PASS){   //判断该用户和密码是否正确
	echo "登录成功!";
	$_SESSION['adminuser']=$user;
	$_SESSION['adminpass']=$pass;
	echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php\">3秒钟转入主页,请稍等......";
}else{
	echo "<script>alert('登录失败!');history.back();</script>"; 
}
}

if(isset($_GET['do']) && $_GET["do"]=="exit"){
	$_SESSION["adminuser"]=null;
	$_SESSION["adminpass"]=null; 
	echo "<script>alert('退出成功!');history.back();</script>"; 
}
?>