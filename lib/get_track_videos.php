<?php
	$ans = str_replace ("{{title}}", $course, file_get_contents(__DIR__ . '/prototype/course_videos.php'));

	function get ($id)
	{
		$ans = "";
		$dirs = array_filter(glob('courses/' . $id . '/videos/*'), 'is_dir');
		//print_r ($dirs);
		foreach ($dirs as $key => $value)
		{
			$value = substr ($value, 9 + strlen ($id) + 7);
			$decoded = urldecode ($value);
			$ans = $ans . "<div class=\"col-md-4\" style=\"background-color: #fff; box-shadow: 0 0 10px #808080; margin: 10px; padding: 1px 10px 1px; border-radius: 25px\"> <h2>{$decoded}</h2> <p><a href=\"/courses/{$id}/videos/{$value}/\" role=\"button\" class=\"btn btn-secondary\">View details »</a></p> </div>";
		}
		return $ans;
	}

	file_put_contents("php://stdout", "\n" . get ($course) . "\n");
	echo str_replace ("{{video}}", get($course), $ans);
?>
