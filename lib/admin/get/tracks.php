<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "SELECT * FROM `Tracks`";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			echo "<article class=\"course-item col-md-4\">";
			echo "<h2>{$row["Name"]}</h2>";
			echo "<a href=\"#\" onclick=\"modify_track('{$row["Name"]}');\" data-toggle=\"modal\" data-target=\"#modifyTrack\" class=\"btn btn-raised active\">Modify »</a>";
			echo "</article>";
		}
	}
?>
