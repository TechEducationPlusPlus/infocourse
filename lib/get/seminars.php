<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "SELECT * FROM `Seminars`";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			echo "<article class=\"course-item col-md-4\">";
			echo "<h2>{$row["Name"]}</h2>";
			echo "<a href=\"{$row["Link"]}\" role=\"button\" class=\"btn btn-raised active\">Към видеото »</a>";
			if ($row["ExamLink"] != "#")
				echo "<a href=\"{$row["ExamLink"]}\" role=\"button\" class=\"btn btn-raised btn-success\">Към изпита »</a>";
			echo "</article>";
		}
	}
?>
