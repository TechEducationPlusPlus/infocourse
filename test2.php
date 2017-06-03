<?php
  //session_start();
if(isset($_SESSION['userid'])) {
	var_dump($_SESSION);
  }// else {
  //  $_SESSION['viewnum'] = 1;
  //}
?>
<html>
<body>
Hello <?= $_SESSION["userid"] ?>.<br>
This is  <?= $_SESSION['viewnum'] ?> times you have seen a page on this site.<br>
</body>
</html>
