<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "AIT";

	$conn = new MySQL ($dbname);

	file_get_contents("http://ait.techedu.bg/?type=update");
?>
