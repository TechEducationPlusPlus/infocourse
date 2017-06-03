<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$json = file_get_contents("http://ait.techedu.bg/?type=get&person={$_SESSION["userid"]}&n=3");
	//$json = file_get_contents("http://localhost:80/?type=get&person={$_SESSION["userid"]}&n=3");
	$json = json_decode($json);

	for ($i = 0 ; $i < 3 ; $i ++)
	{
		if ($json [$i][1] == 0)
		{
			$result = $conn->query ("SELECT * FROM `News` WHERE `Num`='{$json [$i][0]}'")->fetch_assoc();
			echo "<div class='course-item col-md-4 equal'><h2>{$result["alt"]}</h2><a href='/news' role='button' class='btn btn-raised active'>Новини »</a></div>";
		}
		else if ($json [$i][1] == 1) // Video
		{
			$result = $conn->query ("SELECT * FROM `Videos` WHERE `UniqueID`='{$json [$i][0]}'")->fetch_assoc();
			echo "<div class='course-item col-md-4 equal'><h2>{$result["ID"]}</h2><br>Част от курса '{$result["Course"]}'<br><a href='{$result["Link"]}' role='button' class='btn btn-raised active'>Видео »</a></div>";
		}
		else if ($json [$i][1] == 2) // Exam
		{
			$result = $conn->query ("SELECT * FROM `Videos` WHERE `UniqueID`='{$json [$i][0]}'")->fetch_assoc();
			echo "<div class='course-item col-md-4 equal'><h2>{$result["ID"]}</h2>Част от курса '{$result["Course"]}'<br><a href='{$result["ExamLink"]}' role='button' class='btn btn-raised active'>Домашно »</a></div>";
		}
	}
?>
