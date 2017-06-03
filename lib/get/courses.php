<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "SELECT * FROM `Courses`";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			echo "<article class=\"course-item col-md-4\">";
			echo "<h2>{$row["ID"]} <a href=\"{$row["Link"]}\"><i class=\"fa fa-arrow-circle-right right-arrow\" aria-hidden=\"true\"></i></a></h2>";
			echo "<p>Част от трака '<strong>{$row["Track"]}</strong>'</p>"; 
			if ($row["ExamLink"] != "#")
				echo "<a href=\"{$row["ExamLink"]}\" role=\"button\" class=\"btn btn-raised btn-success\">Към изпита »</a>";
			else
				echo "<p>Курсът няма изпит все още.</p>"; 
			echo "</article>";
		}
	}
?>
