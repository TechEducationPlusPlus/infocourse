$.material.init();
if ($.cookie("username") !== undefined) {
	$("#admin").html("<a href=\"/admin\">Administration</a>");
	$("#logout").html("<a href=\"/logout.php\">Logout</a>");
}
