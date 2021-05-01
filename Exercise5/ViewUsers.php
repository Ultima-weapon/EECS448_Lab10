<html lang="en-us">
	<head>
        <title>View Users</title>
		<link href="css\style.css" rel="stylesheet" type="text/css">
    </head>
	<body>
		<!-- Heading -->
		<div id="header" class="title-header">
			<h1 id="title">View Users</h1>
		</div>
		<?php
			$mysqli = new mysqli("mysql.eecs.ku.edu","andrewford","ohFaex3f","andrewford");
			if($mysqli->connect_errno){
				echo 'Unable to connect to the database.';
				$mysqli->close();
				exit();
			}
			echo "<table><tr><b><th>user_id</th></tr></b>";
			$query = "SELECT user_id FROM Users";
			if($result = $mysqli->query($query)){
				while ($row = $result->fetch_assoc()){
					echo "<tr><td>" . $row["user_id"] . "</td></tr>";
				}
				$result->free();
			}
			$mysqli->close();
			echo "</table>";
		?>
	</body>
</html>