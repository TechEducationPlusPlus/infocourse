<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");
    $valid = false;
	$ID = "invalid username or email or password";
	$number = "invalid username or email or password";
	$name = "invalid username or email or password";
	$email = "invalid username or email or password";

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "SELECT * FROM Users WHERE `Username`=\"{$_REQUEST['ID']}\" OR `Email`=\"{$_REQUEST["ID"]}\"";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$row = $result->fetch_assoc();
		if ($row["Username"] == $_REQUEST["ID"] || $row["Email"] == $_REQUEST["ID"])
		{
			$name = $row["Name"];
			$email = $row["Email"];
			$ID = $row["Username"];
			$number = $row["ID"];
			$valid = ($row["Password"] == md5($_REQUEST["Password"]));
		}
	} 
	unset($conn);

	if ($valid)
    {
		$_SESSION['userid'] = $number;
		$_SESSION['name'] = $name;

        header('location: /');
    }
    else
    {
		header("location: /login.php?type=fail");
    }
?>
