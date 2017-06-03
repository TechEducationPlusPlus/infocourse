<?php
	function getCommentsAsJSON (string $link)
	{
		include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

		$dbname = "Infocourse";

		$conn = new MySQL ($dbname);

		$sql = "SELECT * FROM `Comments` WHERE `Link`='" . $link . "'";
		$result = $conn->query($sql);

		$ans = "[";
		
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				$ans = $ans . "{author: {$row ["Author"]}, text: {$row ["Text"]}},";
			}
		}
		$ans = substr ($ans, 0, -1) . "]";
		return $ans;
	}
?>
