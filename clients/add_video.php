<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);
	$sql = 'INSERT INTO `Videos`(`ID`, `Course`, `Link`, `Source`) VALUES ("' . $_POST ["name"] . '","' . $_POST ["course"] . '","' . $_POST ["link"] . '", "' . $_POST ["source"] . '");';
	$result = $conn -> query ($sql);

	echo "<script> window.history.back(); </script>";
?>

