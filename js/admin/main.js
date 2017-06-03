if ($.cookie("username") == undefined)
	window.onload = function(e){ 
		document.getElementById("dialog").innerHTML = `
			<div class="modal fade" role="dialog" id="Login">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Login</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="/clients/add_track.php" method="POST">
								<div class="form-group">
									<label for="name" class="col-md-2 control-label">Username</label>
									<div class="col-md-10">
										<input class="form-control" id="name" name="name" placeholder="Username" type="text">
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-md-2 control-label">Password</label>
									<div class="col-md-10">
										<input class="form-control" id="password" name="password" placeholder="Password" type="password">
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" onclick="checkUser();">Login</button>
						</div>
					</div>
				</div>
			</div>
			`;
		$('#Login').modal('show');
	};
else
	window.onload = initUser ();
function get_permissions (username_param)
{
	Object.defineProperty (window,'username',{ value : username_param, writable: false });
	$.ajax({
			method: "POST",
			url: "/clients/get_permissions.php",
			data: {
				name: window.username
			},
			success: function(res) {
				Object.defineProperty (window,'PERMISSIONS',{ value : JSON.parse(res), writable: false });
				console.log (window.PERMISSIONS);
			}
	});
}
function checkUser ()
{
	get_permissions(($("#name").val()));
	$('#Login').modal('hide');
	$('#usernameLog').html("Username: " + window.username);
	$.cookie('username', window.username, { expires: 1, path: '/' });
}
function initUser ()
{
	get_permissions($.cookie("username"));
	$('#Login').modal('hide');
	$('#usernameLog').html("Username: " + window.username);
}
function add_track ()
{
	if (PERMISSIONS.createTrack == "allowed")
		document.getElementById("dialog").innerHTML = `
			<div class="modal fade" role="dialog" id="createTrack">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Add Track</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="/clients/add_track.php" method="POST">
								<input class="form-control" id="author" required name="author" value="` + window.username + `" type="hidden">
								<div class="form-group">
									<label for="name" class="col-md-2 control-label"></label>
									<div class="col-md-10">
										<input class="form-control" id="name" name="name" placeholder="Name of track" type="text">
										<small>This name must be unique</small>
									</div>
								</div>
								<div class="form-group">
									<label for="exam" class="col-md-2 control-label">Exam</label>
									<div class="col-md-10">
										<input class="form-control" id="exam" name="exam" placeholder="Exam/Homework" value="#" type="text">
										<small>It must be link to judge system. (for example judge.techedu.cf)</small>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Add track</button>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			`;
	else
		document.getElementById("dialog").innerHTML = `
			<div class="modal fade" role="dialog" id="createTrack">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Add Track</h4>
						</div>
						<div class="modal-body">
							<h1 class="text-danger">This user have no permissions to create new tracks.</h1>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			`;
}
function add_seminar ()
{
	if (PERMISSIONS.createSeminar == "allowed")
		document.getElementById("dialog").innerHTML = `
			<div class="modal fade" role="dialog" id="createSeminar">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Add Seminar</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="/clients/add_seminar.php" method="POST">
								<input class="form-control" id="author" required name="author" value="` + window.username + `" type="hidden">
								<div class="form-group">
									<label for="name" class="col-md-2 control-label"></label>
									<div class="col-md-10">
										<input class="form-control" id="name" required name="name" placeholder="Name of seminar" type="text">
										<small>This name must be unique</small>
									</div>
								</div>
								<div class="form-group">
									<label for="source" class="col-md-2 control-label">Source</label>
									<div class="col-md-10">
										<input class="form-control" id="source" required name="source" placeholder="Source of video of this seminar" type="text">
										<small>This source must be iframe link (for example, from YouTube)</small>
									</div>
								</div>
								<div class="form-group">
									<label for="label" class="col-md-2 control-label">Label</label>
									<div class="col-md-10">
										<input class="form-control" id="label" name="label" placeholder="Label of video" type="text">
										<small>Label can contain information about lectors.</small>
									</div>
								</div>
								<div class="form-group">
									<label for="exam" class="col-md-2 control-label">Exam</label>
									<div class="col-md-10">
										<input class="form-control" id="exam" name="exam" placeholder="Exam/Homework" value="#" type="text">
										<small>It must be link to judge system. (for example judge.techedu.cf)</small>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Add this seminar</button>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			`;
	else
		document.getElementById("dialog").innerHTML = `
			<div class="modal fade" role="dialog" id="createSeminar">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">Add Seminar</h4>
						</div>
						<div class="modal-body">
							<h1 class="text-danger">This user have no permissions to create new seminars.</h1>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			`;
}

function modify_track(name)
{
	document.getElementById("dialog").innerHTML = "";
	$.ajax({
			method: "POST",
			url: "/clients/get_track_info.php",
			data: {
				name: name
			},
			success: function(res) {
				window.info = JSON.parse(res);
				console.log ("got it")
				if (PERMISSIONS.modifyTracks == "allowed" || window.info.author == window.username)
				{
					document.getElementById("dialog").innerHTML = `
						<div class="modal fade" role="dialog" id="modifyTrack">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h4 class="modal-title">Modify Seminar</h4>
									</div>
									<div class="modal-body">
										<form class="form-horizontal" action="/clients/modify_track.php" method="POST">
											<input class="form-control" id="author" required name="author" value="` + window.username + `" type="hidden">
											<div class="form-group">
												<label for="name" class="col-md-2 control-label"></label>
												<div class="col-md-10">
													<input class="form-control" id="name" name="name" placeholder="Name of track" type="text">
													<small>This name must be unique</small>
												</div>
											</div>
											<div class="form-group">
												<label for="exam" class="col-md-2 control-label">Exam</label>
												<div class="col-md-10">
													<input class="form-control" id="exam" name="exam" value="` + window.info.exam + `" placeholder="Exam/Homework" type="text">
													<small>It must be link to judge system. (for example judge.techedu.cf)</small>
												</div>
											</div>
											<button type="submit" class="btn btn-primary">Update this seminar</button>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						`;
					$("#modifyTrack").modal("show");
				}
				else
				{
					document.getElementById("dialog").innerHTML = `
						<div class="modal fade" role="dialog" id="modifySeminar">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h4 class="modal-title">Modify Seminar</h4>
									</div>
									<div class="modal-body">
										<h1 class="text-danger">This user have no permissions to modify existing seminars.</h1>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						`;
					$("#modifySeminar").modal("show");
				}
			}
	});
}

function modify_seminar(name)
{
	document.getElementById("dialog").innerHTML = "";
	$.ajax({
			method: "POST",
			url: "/clients/get_seminar_info.php",
			data: {
				name: name
			},
			success: function(res) {
				window.info = JSON.parse(res);
				console.log ("got it")
				if (PERMISSIONS.modifySeminar == "allowed" || window.info.author == window.username)
				{
					document.getElementById("dialog").innerHTML = `
						<div class="modal fade" role="dialog" id="modifySeminar">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h4 class="modal-title">Modify Seminar</h4>
									</div>
									<div class="modal-body">
										<form class="form-horizontal" action="/clients/modify_seminar.php" method="POST">
											<input class="form-control" id="oldname" required name="oldname" value="` + window.info.name + `" type="hidden">
											<div class="form-group">
												<label for="name" class="col-md-2 control-label"></label>
												<div class="col-md-10">
													<input class="form-control" id="name" required name="name" value="` + window.info.name + `" placeholder="Name of seminar" type="text">
													<small>This name must be unique</small>
												</div>
											</div>
											<div class="form-group">
												<label for="source" class="col-md-2 control-label">Source</label>
												<div class="col-md-10">
													<input class="form-control" id="source" required name="source" value="` + window.info.source + `" placeholder="Source of video of this seminar" type="text">
													<small>This source must be iframe link (for example, from YouTube)</small>
												</div>
											</div>
											<div class="form-group">
												<label for="label" class="col-md-2 control-label">Label</label>
												<div class="col-md-10">
													<input class="form-control" id="label" name="label" value="` + window.info.label + `" placeholder="Label of video" type="text">
													<small>Label can contain information about lectors.</small>
												</div>
											</div>
											<div class="form-group">
												<label for="exam" class="col-md-2 control-label">Exam</label>
												<div class="col-md-10">
													<input class="form-control" id="exam" name="exam" value="` + window.info.exam + `" placeholder="Exam/Homework" type="text">
													<small>It must be link to judge system. (for example judge.techedu.cf)</small>
												</div>
											</div>
											<button type="submit" class="btn btn-primary">Update this seminar</button>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						`;
					$("#modifySeminar").modal("show");
				}
				else
				{
					document.getElementById("dialog").innerHTML = `
						<div class="modal fade" role="dialog" id="modifySeminar">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h4 class="modal-title">Modify Seminar</h4>
									</div>
									<div class="modal-body">
										<h1 class="text-danger">This user have no permissions to modify existing seminars.</h1>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						`;
					$("#modifySeminar").modal("show");
				}
			}
	});
}
