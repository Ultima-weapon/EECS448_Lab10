<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu","andrewford","ohFaex3f","andrewford");
	if($mysqli->connect_errno){
		echo 'Unable to connect to the database.';
		$mysqli->close();
		exit();
	}
	$query = "SELECT author_id, post_id, content FROM Posts ORDER BY author_id ASC, post_id ASC";
	if($result = $mysqli->query($query)){
		echo "<table><colgroup><col class='w1'><col class='w'><col><col class='w'></colgroup><thead>";
		echo "<tr><b><th>author_id</th><th>post_id</th><th>content</th><th>Delete?</th></tr></b></thead><tbody>";
		while ($row = $result->fetch_assoc()){
			echo '<tr><td>' . $row["author_id"] . '</td><td>' . $row["post_id"] . '</td><td>' . $row["content"] . '</td>';
			echo '<td><input type="checkbox" name="' . $row["post_id"] . '" value="1"></td></tr>';
		}
		echo "</tbody></table>";
		$result->free();
	}
	$mysqli->close();
?>