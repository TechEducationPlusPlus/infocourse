<?php
	$news = "<article>
		<header>
			<div class=\"logo\"> <img class=\"img-responsive\" src=\"{{img}}\"> </div> {{title}}
			<summary>
				{{when}}
			</summary>
		</header>
		<aside>
			{{info}}
		</aside>
	</article>";
	
	$news = str_replace(PHP_EOL, '', $news);
	
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	if (!isset($_REQUEST["page"]))
		$_REQUEST["page"] = "0";

	$first = intval($_REQUEST["page"]) * 5;
	$last = intval($_REQUEST["page"]) * 5 + 4;

	$result = $conn->query("SELECT * FROM `News` LIMIT {$first},{$last}");

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			echo str_replace(
					"{{img}}", 
					$row["img"],
					str_replace(
						"{{title}}",
						$row["title"],
						str_replace(
							"{{when}}",
							$row["when"],
							str_replace(
								"{{info}}",
								$row["full_info"],
								$news
							)
						)
					)
				);
		}
	}
?>
