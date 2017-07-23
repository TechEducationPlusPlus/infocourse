<?php
	$jokes = 72;
	file_put_contents("php://stdout", "\nRequested: Router: " . $_SERVER['REQUEST_URI'] . "\n");
	if (preg_match ("/\/seminars\/.*/", $_SERVER['REQUEST_URI']) != 0)
	{
		include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

		$dbname = "Infocourse";

		$conn = new MySQL ($dbname);

		$URI = $_SERVER["REQUEST_URI"];
		file_put_contents("php://stdout", "\nRequested: Router: " . $URI . "\n");
		$sql = "SELECT * FROM `Seminars` WHERE `Link`=\"{$URI}\"";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) 
		{
			$row = $result->fetch_assoc ();
			$file = file_get_contents('./lib/prototype/video_prototype.php', FILE_USE_INCLUDE_PATH);
			echo 
				str_replace (
					"{{number}}", $conn->query("SELECT * FROM `Comments` WHERE `LINK`=\"" . $URI . "\"")->num_rows,  
					str_replace (
						"{{name}}", $_COOKIE["name"],  
						str_replace (
							"{{params}}", $URI,
							str_replace (
								"{{label}}", $row["Label"],  
								str_replace (
									"{{title}}", $row["Name"],  
									str_replace (
										"{{link}}", $row["Source"], 
										$file
									)
								)
							)
						)
					)
				); 
		}

		
	}
	else if (preg_match ("/\/courses\/.*\/videos\/.*/", $_SERVER['REQUEST_URI']) != 0)
	{
		include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

		$dbname = "Infocourse";

		$conn = new MySQL ($dbname);

		$URI = $_SERVER["REQUEST_URI"];
		file_put_contents("php://stdout", "\nRequested: Router: " . $URI . "\n");
		$sql = "SELECT * FROM `Videos` WHERE `Link`=\"{$URI}\"";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) 
		{
			$row = $result->fetch_assoc ();

			$ai = new MySQL ("AIT");
			$ai->query("INSERT INTO `Visits` (`IdUser`, `Type`, `IdResource`) VALUES ('{$_SESSION["userid"]}','2','{$row["UniqueID"]}')");

			file_get_contents("http://ait.techedu.bg/?type=update");

			$file = file_get_contents('./lib/prototype/video_prototype.php', FILE_USE_INCLUDE_PATH);
			file_put_contents("php://stdout", "\nRequested: Router: Lable: " . $row["Label"] . "\n");
			echo 
				str_replace (
					"{{number}}", $conn->query("SELECT * FROM `Comments` WHERE `LINK`=\"" . $URI . "\"")->num_rows,  
					str_replace (
						"{{name}}", $_COOKIE["name"],  
						str_replace (
							"{{params}}", $URI,  
							str_replace (
								"{{label}}", $row["Label"],  
								str_replace (
									"{{title}}", $row["ID"],  
									str_replace (
										"{{link}}", $row["Source"], 
										$file
									)
								)
							)
						)
					)
				); 
		}

		
	}
	else if (preg_match ("/\/courses\/.*/", $_SERVER['REQUEST_URI']) != 0)
	{
		include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

		$dbname = "Infocourse";

		$conn = new MySQL ($dbname);

		$URI = substr ($_SERVER["REQUEST_URI"], 9);
		file_put_contents("php://stdout", "\nRequested: Router: " . $URI . "\n");
		$sql = "SELECT * FROM `Videos` WHERE `Course`=\"{$URI}\"";
		$result = $conn->query($sql);
		$all = "";

		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc ())
			{
				$all = $all . "<div class=\"course-item col-md-4 equal\">";
				$all = $all . "<h2>{$row["ID"]}</h2>";
				if ($row["Source"] != "#")
					$all = $all . "<a href=\"{$row["Link"]}\" role=\"button\" class=\"btn btn-raised active\">Видео »</a>";
				if ($row["ExamLink"] != "#")
					$all = $all . "<a href=\"{$row["ExamLink"]}\" role=\"button\" class=\"btn btn-raised btn-success\">Домашно »</a>";
				$all = $all . "</div>";
			}
		}
		
		$file = file_get_contents('./lib/prototype/track_view_prototype.php', FILE_USE_INCLUDE_PATH);
		echo 
			str_replace ("{{title}}", $conn->query ("SELECT * FROM `Courses` WHERE `Link`='" . $_SERVER['REQUEST_URI'] . "'")->fetch_assoc ()["ID"],
			str_replace ("{{all}}", $all, str_replace("{{plan}}", "", $file))); 

		
	}
	else if (preg_match ("/\/tracks\/.*/", $_SERVER['REQUEST_URI']) != 0)
	{
		include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

		$dbname = "Infocourse";

		$conn = new MySQL ($dbname);

		$URI = substr ($_SERVER["REQUEST_URI"], 8);
		file_put_contents("php://stdout", "\nRequested: Router: " . $URI . "\n");
		$sql = "SELECT * FROM `Courses` WHERE `Track`=\"{$URI}\"";
		$result = $conn->query($sql);
		$all = "";

		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc ())
			{
				$all = $all . "<div class=\"course-item col-md-4 equal\">";
				$all = $all . "<h2>{$row["ID"]}</h2>";
				$all = $all . "<a href=\"{$row["Link"]}\" role=\"button\" class=\"btn btn-raised active\">Видеа »</a>";
				if ($row["ExamLink"] != "#")
					$all = $all . "<a href=\"{$row["ExamLink"]}\" role=\"button\" class=\"btn btn-raised btn-success\">Изпит »</a>";
				$all = $all . "</div>";
			}
		}
		
		$file = file_get_contents('./lib/prototype/track_view_prototype.php', FILE_USE_INCLUDE_PATH);
		$file = str_replace ("{{title}}", $URI, str_replace ("{{all}}", $all, $file)); 
		try {
			echo str_replace ("{{plan}}", file_get_contents('https://raw.githubusercontent.com/TechEducationPlusPlus/Resources/master/presentations/' . $URI . '/README.md'), $file);  
		}
		catch (Exception $e) {
			echo str_replace ("{{plan}}", '', $file);  
		}
		
	}
	else
	{
		$_GET['_uri'] = $_SERVER['REQUEST_URI'] . '.php';
		
	}
?>
