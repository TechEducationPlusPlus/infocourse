<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "SELECT * FROM `Seminars` WHERE `Name` = \"{$_REQUEST["name"]}\"";
	$row = $conn->query ($sql) -> fetch_assoc (); 

	echo "{\"name\":\"{$row["Name"]}\",\"link\":\"{$row["Link"]}\",\"source\":\"{$row["Source"]}\",\"label\":\"{$row["Label"]}\",\"exam\":\"{$row["ExamLink"]}\",\"author\":\"{$row["Author"]}\"}";
?>
