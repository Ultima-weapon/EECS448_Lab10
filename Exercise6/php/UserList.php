<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu","andrewford","ohFaex3f","andrewford");
	if($mysqli->connect_errno){
		echo 'Unable to connect to the database.';
		$mysqli->close();
		exit();
	}
	$query = "SELECT user_id FROM Users";
	if($result = $mysqli->query($query)){
		while ($row = $result->fetch_assoc()){
			echo "<option value='" . $row['user_id'] . "'>" . $row['user_id'] . "</option>";
		}
		$result->free();
	}
	$mysqli->close();
?>