<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "SELECT * FROM `News` ORDER BY `Num` DESC LIMIT 3";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{
		$indicators="";
		$items="";
		$index=0;
		while($row = $result->fetch_assoc()) 
		{
			if ($index == 0)
				$indicatiors = $indicatiors . '<li data-target="#carousel-news" data-slide-to="'.$index.'" class="indicator-item active"></li>';
			else
				$indicatiors = $indicatiors . '<li data-target="#carousel-news" data-slide-to="'.$index.'" class="indicator-item"></li>';

			if ($index == 0)
				$items = $items . ' <div class="news item active"> <div class="content"><a href="/news"> <img src="'.$row["img"].'" alt="'.$row["alt"].'"> </a> <div> <h3 class="post-title" title="'.$row["alt"].'"> <a href="/news">'.$row["alt"].'</a> </h3> <p class="home-page-news-description">'.$row["full_info"].'</p> </div></div> <p class="dots">&bull; &bull; &bull;</p> </div>';
			else
				$items = $items . ' <div class="news item"> <div class="content"><a href="/news"> <img src="'.$row["img"].'" alt="'.$row["alt"].'"> </a> <div> <h3 class="post-title" title="'.$row["alt"].'"> <a href="/news">'.$row["alt"].'</a> </h3> <p class="home-page-news-description">'.$row["full_info"].'</p> </div></div> <p class="dots">&bull; &bull; &bull;</p> </div>';
			$index ++;
		}
		echo '<div id="carousel-news" class="carousel slide news-slider" data-ride="carousel"> <ol class="carousel-indicators news-indicatiors"> '.$indicatiors.' </ol> <div class="carousel-inner" role="listbox"> '.$items.' </div> </div><script>$(\'#carousel-news\').carousel(); </script>';
	}
?>
