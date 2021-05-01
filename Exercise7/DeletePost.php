<html lang="en-us">
	<head>
        <title>Delete Posts</title>
		<link href="css\style.css" rel="stylesheet" type="text/css">
    </head>
	<body>
		<!-- Heading -->
		<div id="header" class="title-header">
			<h1 id="title">Delete Posts</h1>
		</div>
		<div align="center">
			<?php
				if($_POST['submit']){
					$mysqli = new mysqli("mysql.eecs.ku.edu","andrewford","ohFaex3f","andrewford");
					if($mysqli->connect_errno){
						echo 'Unable to connect to the database.';
						$mysqli->close();
						exit();
					}
					$query = "SELECT post_id FROM Posts";
					if($result = $mysqli->query($query)){
						while ($row = $result->fetch_assoc()){
							if($_POST[$row["post_id"]]==1){
								$delete = "DELETE FROM Posts WHERE post_id = '" . $row["post_id"] . "'";
								if($deleteResult = $mysqli->query($delete)){
									echo "Post with post_id: '" . $row["post_id"] . "' Successfully Deleted<br>";
								}
							}
						}
						$deleteResult->free();
						$result->free();
					}
					$mysqli->close();
				}
			?>
		</div>
	</body>
</html>