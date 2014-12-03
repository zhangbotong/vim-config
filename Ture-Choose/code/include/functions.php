<?php
function checkSession()
{
 
	if(isset($_SESSION["adminuser"])&&($_SESSION["adminuser"]==ADMIN_USER)&&($_SESSION["adminpass"]==ADMIN_PASS))
	{
	return true;
		
	}
	else{
	return false;
	}
}
function redirect($weburl)
{
echo "<script Lanuage='JavaScript'>window.location ='".$weburl."'</script>";
}

function showmsg($url,$msg){
	 echo "<script Lanuage='JavaScript'>";
	 echo "alert('".$msg."');";
	 echo "window.location ='".$url."';";
	 echo "</script>";
}
?>
