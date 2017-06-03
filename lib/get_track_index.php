<?php
	echo str_replace ("{{title}}", $course, file_get_contents(__DIR__ . '/prototype/course_index.php'));
?>
