<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="scripts/jquery.min.js"></script>
   <script src="sjs/bootstrap.min.js"></script>
</head>
<body>
<table class="table table-border table-hover">
							<tr>
								<th>name</th>
								<th>age</th>
								<th>gender</th>
								<th>phone</th>
							</tr>
	<?php
	include "connect_db.php";
		$place = $_GET["place"];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$else = $_GET['else'];

		$result=mysql_query("insert into travel_prejudice (place,
		time,price) VALUES ('$place','$time','$price')");
		if (!$result)
			echo "insert error!";
		$select = mysql_query ("select* from travel_prejudice where place = '$place' && time = '$time'");
		if (!$select)
			echo "select fail";
		echo "";
		while($row = mysql_fetch_array($select))
		{
			$select2 = mysql_query ("select* from login where id='".$row['id']."'");
			if (!$select2)
				echo "select2 fail";
			else
				
				while($row2 = mysql_fetch_array($select2))
				{
					echo "<tr>";
					echo "<td>" . $row2['username'] . "</td>";
					echo "<td>" . $row2['age'] . "</td>";
					echo "<td>" . $row2['gender'] . "</td>";
					echo "<td>" . $row2['phone'] . "</td>";
					echo "</tr>";
				}
				//echo "</table>";
		}

		mysql_close($conn);
	?>

</body>
</html>