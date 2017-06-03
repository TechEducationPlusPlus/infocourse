		$("#comments").hide();
		$("#commentsText").click(function() {
			if ($("#commentsText").attr("class") == "showed") {
				$("#commentsText").attr("class", "my_hidden");
				$("#comments").hide(250);
			} else {
				$("#commentsText").attr("class", "showed");
				$("#comments").show(250);
			}
		});
		var number_of_comments = 0;
		$.ajax(
			{
				method: "POST",
					url: "/post_comment.php",
					data: {
						type: "get",
						got: "0",
						link: window.location.pathname
					},
					success: function(all_posts) {
						let all = JSON.parse(all_posts);
							$("#comments_container").html("");
							for (let x in all) {
								$("#comments_container").html($("#comments_container").html() + "<div id=" + x + "><h4><b><span id=\"author\">" + all[x].author + "</span> <small style='float: right;'><time>" + all[x].time + " </time></small></b></h4><p>" + all[x].text + "</p></div><a class=\"btn btn-primary\" onclick=\"add_reply(" + x + ");\">Reply</a><hr>");
								window.number_of_comments = +x + 1;
							}
						}
				}
			);
		$("#publish").click(function() {
			if ($("#name").val() === "" || $("#name").val() === undefined) {
				let name = prompt("What is your name?");
				$.cookie("name", name, {
					expires: 1,
					path: '/'
				});
				$("#name").val(name);
			}
			$.ajax({
				method: "POST",
					url: "/post_comment.php",
					data: {
						type: "post",
						got: window.number_of_comments,
						author: $("#name").val(),
						text: $("#comment").val(),
						link: window.location.pathname
					},
					success: function(all_posts) {
						//alert (all_posts);
							let all = JSON.parse(all_posts);
							for (let x in all) {
								$("#comments_container").html($("#comments_container").html() + "<div id=" + (1 + window.number_of_comments) + "><h4><b><span id=\"author\">" + all[x].author + "</span> <small style='float: right;'><time>" + all[x].time + " </time></small></b></h4><p>" + all[x].text + "</p></div><a class=\"btn btn-primary\" onclick=\"add_reply(" + (1 + window.number_of_comments) + ");\">Reply</a><hr>");
								window.number_of_comments ++;
							}
						}
				});
			$("#comment").val("");
		});
		
		function add_reply(id)
		{
			let author = $("#" + id + ">h4>b>#author").html();	
			let time = $("#" + id + ">h4>b>small>time").html();	
			let text = $("#" + id + ">p").html();
			//alert(author);
			//alert(time);
			//alert(text);
			let html = "<a href=#" + id + ">Quote: " + author + " at " + time + "</a><p class=quote>" + text + "</p>";
			$("#comment").val($("#comment").val() + html);
		}
