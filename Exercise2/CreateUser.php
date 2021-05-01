<html>
	<head>
		<title>Create User</title>
		<link href="css\style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Heading -->
		<div id="header" class="title-header">
			<h1 id="title">Create User</h1>
		</div>
		<div align="center">
			<?php
				if($_POST['submit']){
					if($username==''){
						$username = $_POST['username'];
					}
					if($username==''){
						echo 'The input field was empty, press back and try again.';
						exit();
					}
					$mysqli = new mysqli("mysql.eecs.ku.edu","andrewford","ohFaex3f","andrewford");
					if($mysqli->connect_errno){
						echo 'Unable to connect to the database. New user creation unsuccessful.';
						$mysqli->close();
						exit();
					}
					$query = "INSERT INTO Users (user_id) VALUES ('" . $username . "')";
					if($result = $mysqli->query($query)){
						echo "Username: '" . $username . "' has been successfully added.";
						$result->free();
					} else {
						echo 'Username already exists, press back and try again.';
						$result->free();
					}
					$mysqli->close();
				}
			?>
		</div>
	</body>
</html>