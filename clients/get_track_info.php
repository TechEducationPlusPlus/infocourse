<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "SELECT * FROM `Tracks` WHERE `Name` = \"{$_REQUEST["name"]}\"";
	$row = $conn->query ($sql) -> fetch_assoc (); 

	echo "{\"name\":\"{$row["Name"]}\",\"link\":\"{$row["Folder"]}\",\"exam\":\"{$row["ExamLink"]}\",\"author\":\"{$row["Author"]}\"}";
?>
