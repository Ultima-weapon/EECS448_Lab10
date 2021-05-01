<html lang="en-us">
	<head>
        <title>View User Posts</title>
		<link href="css\style.css" rel="stylesheet" type="text/css">
    </head>
	<body>
		<!-- Heading -->
		<div id="header" class="title-header">
			<h1 id="title">View User Posts</h1>
		</div>
		<div align="center">
			<?php
				if($_POST['submit']){
					if($users==''){
						$users = $_POST['users'];
					}
					if($users==''){
						echo 'You must select a user, press back and try again.';
						exit();
					}
					$mysqli = new mysqli("mysql.eecs.ku.edu","andrewford","ohFaex3f","andrewford");
					if($mysqli->connect_errno){
						echo 'Unable to connect to the database.';
						$mysqli->close();
						exit();
					}
					$query = "SELECT post_id, content FROM Posts WHERE author_id = '" . $users . "'";
					if($result = $mysqli->query($query)){
						echo "<table><colgroup><col class='w'><col></colgroup><thead><tr><b><th colspan='2'>" . $users . "</th></tr></b>";
						echo "<tr><b><th>post_id</th><th>content</th></tr></b></thead><tbody>";
						while ($row = $result->fetch_assoc()){
							echo '<tr><td>' . $row["post_id"] . '</td><td>' . $row["content"] . '</td></tr>';
						}
						echo "</tbody></table>";
						$result->free();
					}
					$mysqli->close();
				}
			?>
		</div>
	</body>
</html>