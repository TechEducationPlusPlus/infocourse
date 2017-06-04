$.material.init();
$("#langToggle").on ('click', function () {
	$.ajax({
		url: "/change_lang.php",
	}).done(function() {
		window.location.reload(false);
	});
});
