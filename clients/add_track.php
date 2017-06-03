<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$conn -> query ('INSERT INTO `Tracks`(`ID`, `Name`, `Folder`, `ExamLink`, `Author`) VALUES ("' . $_POST["name"] . '","' . $_POST ["name"] . '","' . $_POST ["link"] . '","' . $_POST["exam"] . '", "' . $_POST["author"] . '");');
	
	echo "<script> window.location.href = \"/admin\"; </script>";
?>
