<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = ('INSERT INTO `Seminars`(`ID`, `Name`, `Link`, `Source`,`Label`,`ExamLink`,`Author`) VALUES ("' . $_POST["name"] . '","' . $_POST["name"] . '","/seminars/' . urlencode($_POST["name"]) . '","' . $_POST ["source"] . '","' . $_POST["label"] . '","' . $_POST["exam"] . '","' . $_POST["author"] . '");');

	$conn->query ($sql);

	echo $sql;
	
	echo "<script> window.location.href = \"/admin\"; </script>";
?>
