<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = 'SELECT * FROM `Trainers` WHERE `Username`="' . $_POST["name"] . '"';
	$result = $conn -> query ($sql);
	if ($result->num_rows == 1)
	{
		$row = $result->fetch_assoc ();
		echo $row["Permissions"];
	}
	else
	{
		echo '{"modifySeminars": "not allowed", "createTrack": "not allowed", "createSeminar": "not allowed"}';
	}
?>
