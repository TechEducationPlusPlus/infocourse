<?php

	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);
	
	$uri = addslashes($_REQUEST['link']);
	$last_number = $_REQUEST['got'];

	if (
		isset ($_REQUEST ['author']) &&
		isset ($_REQUEST ['text'])
	   )
	{
		file_put_contents("php://stdout", "\nRequested: POST: " . $_SERVER['REQUEST_URI'] . "\n");
		$author = addslashes($_REQUEST ['author']);
		if ($author == '' || ctype_space($author))
		{
			//cheating
		}
		else
		{
			$text = addslashes(strip_tags (trim(preg_replace("/\"/", "&#34;", preg_replace('/\'/', '&#39;', preg_replace('/\r\n|\r|\n/', '<br>', $_REQUEST ['text'])))), "<i><b><u><br><p><a><quoteMe><ul><li><code>"));
			$time = date('d M Y,   H:i');
			$code = addslashes(md5 ($author . $text . $uri));

			$conn->query ("INSERT INTO `Comments` (`ID`, `Author`, `Text`, `Link`, `Time`) VALUES ('{$code}','{$author}','{$text}','{$uri}','{$time}')");
		}
	}
	
	file_put_contents("php://stdout", "\nRequested: GET all: " . $_SERVER['REQUEST_URI'] . "\n");

	$sql = "SELECT * FROM `Comments` WHERE `Link`='" . $uri . "' LIMIT {$last_number},18446744073709551615";
	$result = $conn->query($sql);

	$ans = "{";
	
	if ($result->num_rows > 0) 
	{
		$id = 0;
		while($row = $result->fetch_assoc()) 
		{
			$ans = $ans . "\"{$id}\": {\"author\": \"{$row ["Author"]}\", \"text\": \"{$row ["Text"]}\", \"time\": \"{$row ["Time"]}\"},";
			$id = $id + 1;
		}
		$ans = substr ($ans, 0, -1);
	}
	$ans = $ans . "}";
	file_put_contents("php://stdout", "\nRequested: GET all: " . $ans . "\n");
	echo $ans;
?>
