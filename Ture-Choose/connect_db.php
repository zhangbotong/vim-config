<html>
<body>
	<?php
		$conn=mysql_connect ("localhost","root","") or die ("connect error!");
		mysql_select_db ("travel",$conn)or die ("不能选定数据库：".mysql_error());
	
	?>

</body>
</html>