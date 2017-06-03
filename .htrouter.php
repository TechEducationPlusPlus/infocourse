<?php
		session_start();
	set_time_limit (10);
	file_put_contents("php://stdout", "\nRequested: " . $_SERVER['REQUEST_URI'] . "\n");
	$url = parse_url($_SERVER['REQUEST_URI']);
	if (file_exists(__DIR__ . $_SERVER['REQUEST_URI']) || isset($url['query']))
	{
		$_GET['_uri'] = $_SERVER['REQUEST_URI'];
		return false;
	}
	else if (!file_exists(__DIR__ . $_SERVER['REQUEST_URI']))
	{
		include (__DIR__ . "/router.php");
	}
?>
