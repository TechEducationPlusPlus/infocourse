const pages = [
	{fb: "TechEduPP", category: "TechEdu++"},
	{fb: "SoftwareUniversity", category: "SoftUni"},
	{fb: "devbulgaria", category: "DEV.BG"},
	{fb: "CoderDojoBulgaria", category: "CoderDojo"},
	{fb: "HSSIMI", category: "Other"},
	{fb: "vrexpressbg", category: "Other"},
];

const uniqueCategories = Array.from (new Set (pages.map (x => x.category)));

const urls = {
	TechEduPP: "https://techedu.bg",
	SoftwareUniversity: "https://softuni.bg",
	devbulgaria: "http://dev.bg",
	CoderDojoBulgaria: "https://www.coderdojobulgaria.com/",
	HSSIMI: "http://www.math.bas.bg/omi/hssimi/",
	vrexpressbg: "http://www.vrexpress.bg/",
};

window.events = {};

String.prototype.format = function() {
    var s = this,
        i = arguments.length;

    while (i--) {
        s = s.replace(new RegExp('\\{' + i + '\\}', 'gm'), arguments[i]);
    }
    return s;
};

function formatDate (str) {

	let d = new Date(str);
	let hours = d.getHours().toString();
	let minutes = d.getMinutes().toString();
	if (hours.length == 1) hours = "0" + hours;
	if (minutes.length == 1) minutes = "0" + minutes;
	return d.getDate()  + "-" + ["януари", "февруари", "март", "април", "май", "юни", "юли", "август", "септември", "октомври", "ноември", "декември"][(d.getMonth())] + "-" + d.getFullYear() + " " + hours + ":" + minutes;
}

$(document).ready (function () {
	$.when(pages.reduce(function(ajaxes, x) {
		window.events[x.category] = {};
		return ajaxes.concat([
			$.ajax({
				type: "GET",
				url: "https://graph.facebook.com/v2.10/" + x.fb + "/events",
				data: {
					"access_token": "1818518568468396|7efb3cfa259f9a9ab888f52197491b7c",
					"since": "now",
				},
				success: function(result, status) {
					let response = result.data;
					window.events[x.category]["upcoming"] = [];
					if (response.length != 0)
						$.when (response.reduce(function(pics, fbevent) {
								return pics.concat([
										$.ajax({
											type: "GET",
											url: "https://graph.facebook.com/v2.10/" + fbevent.id + "/picture",
											data: {
												"access_token": "1818518568468396|7efb3cfa259f9a9ab888f52197491b7c",
												"redirect": "false",
												"fields": "url",
												"type": "large"
											},
											success: function(urlPicture, status) {
												let add_event = fbevent;
												//console.log (add_event);
												//console.log (urlPicture);
												if (add_event.place === undefined) {
													add_event.place = {name: "Няма данни", location: {latitude: 0, longitude: 0}};
												}
												if (add_event.place.location === undefined) {
													add_event.place.location = {latitude: 0, longitude: 0};
												}
												add_event ["picture"] = urlPicture.data.url;
												add_event ["organizator"] = x.fb;
												window.events[x.category]["upcoming"].push(add_event);
											}
										})
								]);
						}, [])).done(function () { console.log (x.category + " " + window.events[x.category]["upcoming"]); });
					window.events[x.category]["upcoming"] = window.events[x.category]["upcoming"].reverse();
				}
			}),
			$.ajax({
				type: "GET",
				url: "https://graph.facebook.com/v2.10/" + x.fb + "/events",
				data: {
					"access_token": "1818518568468396|7efb3cfa259f9a9ab888f52197491b7c",
					"until": "now",
				},
				success: function(result, status) {
					let response = result.data;
					window.events[x.category]["past"] = [];
					if (response.length != 0)
						$.when (response.reduce(function(pics, fbevent) {
								return pics.concat([
										$.ajax({
											type: "GET",
											url: "https://graph.facebook.com/v2.10/" + fbevent.id + "/picture",
											data: {
												"access_token": "1818518568468396|7efb3cfa259f9a9ab888f52197491b7c",
												"redirect": "false",
												"fields": "url",
												"type": "large"
											},
											success: function(urlPicture, status) {
												let add_event = fbevent;
												//console.log (add_event);
												//console.log (urlPicture);
												if (add_event.place === undefined) {
													add_event.place = {name: "Няма данни", location: {latitude: 0, longitude: 0}};
												}
												if (add_event.place.location === undefined) {
													add_event.place.location = {latitude: 0, longitude: 0};
												}
												add_event ["picture"] = urlPicture.data.url;
												add_event ["organizator"] = x.fb;
												window.events[x.category]["past"].push(add_event);
											}
										})
								]);
						}, [])).done(function () { console.log (x.category + " " + window.events[x.category]["past"]); });
				}
			})
		]);
	}, [])).done(function () { 
	} );
	$( document ).ajaxStop(function() {
		$("#spinner").attr ("style", "display: none;");
		$("#all").attr ("style", "display: block;");
		
		for (let i of uniqueCategories) {
			$("#buttons").html ($("#buttons").html () + `
					<a href="#" onclick="visualization('${i}');" class="btn btn-default btn-raised">${i} <span class="badge">${window.events[i].past.length + window.events[i].upcoming.length}</span></a>
			`);
		}
	});

});

function visualization(key) {
	let output = "";
	for (let x of window.events[key]["upcoming"]) {
		output += `
			<div class="container event active" id="${x.id}">
				<div class="row">
					<div class="col-md-2">
						<div class="row">
							<div class="col-md-12">
								<br>
<!--								<img class="img-responsive" width="100%" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKAAAACgCAMAAAC8EZcfAAAAbFBMVEXd3d0AAADj4+Pn5+c5OTnIyMiHh4fg4ODk5OTc3NzZ2dnOzs50dHRiYmKvr6+goKC6urogICAnJycUFBRwcHBNTU1GRkZpaWmoqKh/f3+zs7PCwsJTU1NAQECQkJA1NTUODg5ZWVl7e3uNjY1aqWYGAAACr0lEQVR4nO2YW3eqMBCFSaKdmIg3LKLUS/H//8fOBOyx2i5I5O3s70W2y50ZcpnJMssAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwMhoa62mb0lWdPanHs07ND23z8vPpjadNvWuLMuT03/osbxDmS1VS+NFks9bWVT0mx7NOxSqLjKCDLOTeZi9qU6vV/SLHss7GMcvWewXCxmqJn5pHm+yWJxY5jZ70qN5h0JTdn8Q2YMslM60vHStycri8Kw86rG8wxOs2VzJ25+V+rSZ/eD14MFIgi7oSY/lHZ6gbHPPZl8q9W4zs+FVMd3snPST1jrUFJLPWG8Ses5miegnbRB1N+ibftTurZlXjuekaZqVjfMmzuC0qqQGkJf91BuEeDtNfGb3Sh3rSG9aghkx/CEhZT/1JViHfT99Z2EjvYkJdmnKJCiX9QYxvPG3ZnFR5ynFel/BbFWYk94gciIv5spZ2mjvC+iKS+pZDmRvEM+reziGwhztTYZqrhOXgwzRG0RXXPP4TJgEbzJuJyOEx94gxAeEO/B3b43xpqKl4OaehgWhRr7ylOJNg1w4hTRwFmZyJtZdgpHeNGa87YvbkvUv8WEjOS0pwZuYn9w5Tjdliod++qCzGZcYPsRnk+BNglZrLmrutuelwRcy6KrrDg863Fyu67bMRHrTcFwlSrI6wG0rD3uKjBxOetbh6iQnd2ejvUmES+V23iKdQvrWsfbLtv8/aSM3K1OF0hzrTUtQrkw3jjIr0vkLXjq1Cc3iQcuprfRqIpsq1vt6gmV47e6bzXImP/ipLU9a4UlKTe5tnDcxwd1dkLOsA7mlFJJd3Y35Qzt+zF2mrzKRJs6bmqH5R7dPKDzf/Vtwp237K3FRrBcAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/D98AbqIOF2u+lPbAAAAAElFTkSuQmCC">
								<img class="img-responsive" width="100%" src="http://icon-park.com/imagefiles/pin_blue.png">
-->
								<img class="img-responsive" width="100%" src="${x.picture}">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12"><center>
								<br>
								<a href="https://facebook.com/events/${x.id}/"><i class="fa fa-facebook fa-2x"></i></a>
							</center></div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-12">
								<h1>${x.name}</h1>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p style="white-space: pre-wrap; word-wrap: normal;">${x.description}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<i class="fa fa-map-marker fa-2x"></i> <a href="#" onclick="showMap(${x.place.location.latitude}, ${x.place.location.longitude}, '${x.place.name}')">${x.place.name}</a>
							</div>
							<div class="col-md-4">
								<i class="fa fa-clock-o fa-2x"></i> <a href="#">${formatDate(x.start_time)}</a>
							</div>
							<div class="col-md-4">
								<i class="fa fa-user-circle fa-2x"></i> <a href="https://facebook.com/${x.organizator}">@${x.organizator}</a> <a href="${urls[x["organizator"]]}"><i class="fa fa-external-link fa-2x"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--<hr>-->
		`;
	}
	for (let x of window.events[key]["past"]) {
		console.log (x);
		output += `
			<div class="container event inactive" id="${x.id}">
				<div class="row">
					<div class="col-md-2">
						<div class="row">
							<div class="col-md-12">
								<br>
<!--								<img class="img-responsive" width="100%" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKAAAACgCAMAAAC8EZcfAAAAbFBMVEXd3d0AAADj4+Pn5+c5OTnIyMiHh4fg4ODk5OTc3NzZ2dnOzs50dHRiYmKvr6+goKC6urogICAnJycUFBRwcHBNTU1GRkZpaWmoqKh/f3+zs7PCwsJTU1NAQECQkJA1NTUODg5ZWVl7e3uNjY1aqWYGAAACr0lEQVR4nO2YW3eqMBCFSaKdmIg3LKLUS/H//8fOBOyx2i5I5O3s70W2y50ZcpnJMssAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwMhoa62mb0lWdPanHs07ND23z8vPpjadNvWuLMuT03/osbxDmS1VS+NFks9bWVT0mx7NOxSqLjKCDLOTeZi9qU6vV/SLHss7GMcvWewXCxmqJn5pHm+yWJxY5jZ70qN5h0JTdn8Q2YMslM60vHStycri8Kw86rG8wxOs2VzJ25+V+rSZ/eD14MFIgi7oSY/lHZ6gbHPPZl8q9W4zs+FVMd3snPST1jrUFJLPWG8Ses5miegnbRB1N+ibftTurZlXjuekaZqVjfMmzuC0qqQGkJf91BuEeDtNfGb3Sh3rSG9aghkx/CEhZT/1JViHfT99Z2EjvYkJdmnKJCiX9QYxvPG3ZnFR5ynFel/BbFWYk94gciIv5spZ2mjvC+iKS+pZDmRvEM+reziGwhztTYZqrhOXgwzRG0RXXPP4TJgEbzJuJyOEx94gxAeEO/B3b43xpqKl4OaehgWhRr7ylOJNg1w4hTRwFmZyJtZdgpHeNGa87YvbkvUv8WEjOS0pwZuYn9w5Tjdliod++qCzGZcYPsRnk+BNglZrLmrutuelwRcy6KrrDg863Fyu67bMRHrTcFwlSrI6wG0rD3uKjBxOetbh6iQnd2ejvUmES+V23iKdQvrWsfbLtv8/aSM3K1OF0hzrTUtQrkw3jjIr0vkLXjq1Cc3iQcuprfRqIpsq1vt6gmV47e6bzXImP/ipLU9a4UlKTe5tnDcxwd1dkLOsA7mlFJJd3Y35Qzt+zF2mrzKRJs6bmqH5R7dPKDzf/Vtwp237K3FRrBcAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/D98AbqIOF2u+lPbAAAAAElFTkSuQmCC"> 
								<img class="img-responsive" width="100%" src="http://icon-park.com/imagefiles/pin_blue.png">
-->
								<img class="img-responsive" width="100%" src="${x.picture}">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12"><center>
								<br>
								<a href="https://facebook.com/events/${x.id}/"><i class="fa fa-facebook fa-2x"></i></a>
							</center></div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-12">
								<h1>${x.name}</h1>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p style="white-space: pre-wrap; word-wrap: normal;">${x.description}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<i class="fa fa-map-marker fa-2x"></i> <a href="#" onclick="showMap(${x.place.location.latitude}, ${x.place.location.longitude}, '${x.place.name}')">${x.place.name}</a>
							</div>
							<div class="col-md-4">
								<i class="fa fa-clock-o fa-2x"></i> <a href="#">${formatDate(x.start_time)}</a>
							</div>
							<div class="col-md-4">
								<i class="fa fa-user-circle fa-2x"></i> <a href="https://facebook.com/${x.organizator}">@${x.organizator}</a> <a href="${urls[x["organizator"]]}"><i class="fa fa-external-link fa-2x"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--<hr>-->
		`;
	}
	$("#news").html(output);
	$("#news").linkify();
}

var map;

function initMap() {
  let myLatLng = new google.maps.LatLng(23.3239467, 42.6954322);

  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: myLatLng
  });
}

function showMap(x, y, name) {
  let myLatLng = new google.maps.LatLng(x, y);

  delete map;

  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: myLatLng
  });
  let marker = new google.maps.Marker({
    position: myLatLng,
	draggable: true,
	animation: google.maps.Animation.BOUNCE,
    map: map,
    title: name
  });
  $("#myModal").modal('show');
  setTimeout (function () {
	  let center = map.getCenter();
	  google.maps.event.trigger(map, 'resize');
	  map.setCenter(center);
  }, 300);
}
