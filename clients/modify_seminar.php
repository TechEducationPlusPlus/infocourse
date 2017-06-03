<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "UPDATE `Seminars` SET `Name`=\"{$_REQUEST["name"]}\", `Source`=\"{$_REQUEST["source"]}\",`Label`=\"{$_REQUEST["label"]}\",`ExamLink`=\"{$_REQUEST["exam"]}\" WHERE `Name`=\"{$_REQUEST["oldname"]}\"";
	$conn->query ($sql); 
	echo $sql;
	echo "<script> window.location.href = \"/admin\"; </script>";
?>

