<html>
	<head>
		<title>Create Post</title>
		<link href="css\style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Heading -->
		<div id="header" class="title-header">
			<h1 id="title">Create Post</h1>
		</div>
		<div align="center">
			<?php
				if($_POST['submit']){
					if($username=='' || $textpost==''){
						$username = $_POST['username'];
						$textpost = $_POST['textpost'];
					}
					if($username==''){
						echo 'Username field was empty, post unsuccessful, press back and try again.';
						exit();
					}
					if($textpost==''){
						echo 'Post field was empty, post unsuccessful, press back and try again.';
						exit();
					}
					$mysqli = new mysqli("mysql.eecs.ku.edu","andrewford","ohFaex3f","andrewford");
					if($mysqli->connect_errno){
						echo 'Unable to connect to the database. New post creation unsuccessful.';
						$mysqli->close();
						exit();
					}
					$query = "SELECT count(*) AS total FROM Users WHERE user_id = '" . $username . "'";
					if($result = $mysqli->query($query)){
						if($result->fetch_assoc()["total"]==0){
							echo "Username: '" . $username . "' does not exist, post unsuccessful, press back and try again.";
							$result->free();
							$mysqli->close();
							exit();
						}
					}
					$query = "INSERT INTO Posts (author_id, content) VALUES ('" . $username . "', '" . $textpost . "')";
					if($result = $mysqli->query($query)){
						echo "Post has been successfully added.";
						$result->free();
					} else {
						echo 'Post was unsuccessful, press back and try again.';
						$result->free();
					}
					$mysqli->close();
				}
			?>
		</div>
	</body>
</html>