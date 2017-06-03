<?php
	unset($_COOKIE["username"]);
    setcookie('username', null, -1, '/');
	header('location: /admin');
?>
