<?php
header("Content-type: text/html; charset=utf-8"); 
//允许动作
$dos = array('new', 'reply', 'delete');
$do = (!empty($_GET['do']) && in_array($_GET['do'], $dos))?$_GET['do']:'index';
if($do == 'index'){
 redirect("index.php");
}
include "include/common.php";
include "include/functions.php";
//添加操作
if($do=='new') {
    //标题
	$title=$_POST["title"];
	//姓名
	$visitor=$_POST["vname"];
	//网址
	$url=$_POST["url"];
	//内容
	$body=$_POST["body"];
	//时间
	$create_at=date("Y-m-d");
	//验证是否为空
	if($title=="" or $visitor=="" or $body==""){
		  showmsg("new.php","标题、姓名和内容都不能为空，请检查。");
	}else{
		$query="insert into tb_message(visitor,url,body,title,create_at) values("
		."'".$visitor."','".$url."','".$body."','".$title."',date('".$create_at."'))";
		mysql_query($query);
		mysql_close($conn);
		showmsg("index.php","添加成功，转到首页。"); 
	}
}
//更新操作
if($do=='reply') {
	//回复内容
	$reply=$_POST["reply"];
	$query="update tb_messages set reply='".$reply."' where id=".$_POST["msgid"];
	mysql_query($query);
	mysql_close($conn);
	showmsg("index.php","回复成功，转到首页。"); 
}
//删除操作
if($do=='delete') {
	//if(!checkSession())
	//{
	//showmsg("login.php","请先登录后再操作!"); 
	//}
	//else{
	//"delete from 'tb_messages' where id=".$_GET["id"];
	$id =$_GET["id"];
	mysql_query("delete from tb_messages where id=$id");
	mysql_close($conn);
	showmsg("index.php","删除成功，转到首页。"); 
}


?>