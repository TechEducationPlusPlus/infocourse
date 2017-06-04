<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");
    $valid = true;

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "SELECT * FROM Users WHERE `Username`=\"{$_REQUEST['Username']}\" OR `Email`=\"{$_REQUEST["Email"]}\"";
	$result = $conn->query($sql);
	$num_of_users = $conn->query("SELECT * FROM Users")->num_rows;

	if ($result->num_rows > 0) 
	{
		$valid = false;
	} 
	unset($conn);


	if ($valid)
    {
		file_put_contents("php://stdout", "\nPassword: " . $_REQUEST['Password'] . "\n");
		$conn = new MySQL ($dbname);

		$sql  = 'INSERT INTO `Users` (`Username`, `Password`, `Email`, `Name`) VALUES (\'' . 
			    addslashes($_REQUEST["Username"]) . 
				'\', \'' .
			   	md5 ($_REQUEST["Password"]) .
			   	'\', \''. addslashes($_REQUEST["Email"]) . '\', \'' . addslashes($_REQUEST ["Name"]) . '\')';
		$result = $conn->query($sql);
		unset($conn);

		session_start();
		$_SESSION['userid'] = $num_of_users + 1;
		$_SESSION['name'] = $_REQUEST["Name"];

        header('location: /index.php');
    }
    else
    {
        header("location: /login.php?type=fail");
    }
?>
