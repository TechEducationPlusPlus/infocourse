<html lang="en"><head><meta charset="utf-8"/><meta http-equiv="X-UA-Compatible" content="IE=edge"/><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/><meta name="description" content="The core aim of our project is to create online learning management system that combines best practices in organizing training so that it will be interesting, useful and much easier for the students. The most important part of our project is to fertilize future programmers, showing them that it is not as difficult as it sounds. This will happen through brief and extensive online practical competitions taken their levels, with certificates and prizes for the best ones."/><meta name="author" content="TechEdu++"/><meta name="keywords" content="Learning, Online, System, Presentations, Videos, Exam"/><meta name="distribution" content="web"/><meta name="robots" content="index, follow"/><meta name="google-site-verification" content="eCU54DH_8vQnzWO0Q3fXoQmalvA3rCjiXSH6mZdDgkg"/><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/><link rel="icon" href="/favicon.png"/><title>Студентска система :: TechEdu ++</title><link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700"/><link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons"/><link rel="stylesheet" href="/css/bootstrap.min.css"/><link rel="stylesheet" href="/css/bootstrap-material-design.min.css"/><link rel="stylesheet" href="/css/ripples.min.css"/><link rel="stylesheet" href="/css/snackbar.min.css"/><link rel="stylesheet" href="/css/extension.css"/><link href="/css/jumbotron.css" rel="stylesheet"/><meta property="og:url" content="https://www.facebook.com/TechEducationGroup/"/><meta property="og:type" content="website"/><link rel="stylesheet" href="/news/d9757859af.css"/><link rel="stylesheet" href="/node_modules/font-awesome/css/font-awesome.min.css"/><div id="fb-root"></div><script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><style type="text/css">.carousel .item {
    height: 700px !important;
}
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
	width: 70%;
	margin: auto;
}

.spacing {
	height: 100px;
}

article {
	padding: 0 15% 0 15%;
}

.logo {
	font-size: 3em;
}

.item header .logo img {
    max-height: 250px;
    max-width: 550px;
}

article>header {
	font-size: 25pt;
}

article>header>p {
	font-size: 0.4em;
}

article>header>summary {
	font-size: 0.5em;
}
#myCarousel {
	background-color: white;
	height: auto !important;
} 
#myCarousel article>aside {
	font-size: 1.5em;
	float: left;
}
#all article {
	border-top: 5px solid #eee;
	padding-top: 5px;
	padding-bottom: 5px;
}
#all article>header {
	display:inline-block;
	margin-right:10px;
	width: 45%;
}
#all article>aside {
	padding-top: 240px;
	vertical-align: top;
	font-size: 1.5em;
	position: relative;
	/*left: 50%;*/
	display:inline-block;
	text-align: left;
	width: 45%;
}

article.hideMe:after {
	vertical-align: -100px;
	font-size: 1.5em;
	text-decoration: underline;
	content:"For more information click here.";
}

#row
{
	border: 2px solid gray;
}
#joke
{
	text-align: left;
}

.item {
	height: 650px;
}
.space {
	height: 50px;
}
</style></head><body><nav class="navbar navbar-static-top navbar-default"><div class="container"><div class="nav-header"><button type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand">TechEdu ++</a></div><div class="navbar-collapse collapse navbar-responsive-collapse"><ul class="nav navbar-nav"><li><a href="/">Начало</a></li><li class="active"><a href="/news">Новини</a></li><li><a href="/companies.php">Компании</a></li><li><a href="https://chat.techedu.cf">Форум</a></li><li><a href="/aboutus.php">За нас</a></li></ul><ul class="nav navbar-nav navbar-right"><li><a href="/login.php">Login</a></li></ul></div></div></nav><div class="space"></div><span id="page" style="display: none;"><?php 
if (!isset ($_REQUEST["page"])) 
{ 
echo "1"; 
} 
else 
{ 
echo $_REQUEST["page"]; 
} 
?> </span><div id="top" style="display: none;"> 
<?php 
include ($_SERVER["DOCUMENT_ROOT"] . "/api/news.php");	
?></div><div id="news_container" style="display: none;"> 
<?php 
include ($_SERVER["DOCUMENT_ROOT"] . "/api/news.php");	
?></div><div id="myCarousel" data-ride="carousel" class="carousel slide"><ol class="carousel-indicators"></ol><div role="listbox" class="carousel-inner"></div><a href="#myCarousel" role="button" data-slide="prev" class="left carousel-control"><span aria-hidden="true" class="icon-prev"></span><span class="sr-only">Предишна страница</span></a><a href="#myCarousel" role="button" data-slide="next" class="right carousel-control"><span aria-hidden="true" class="icon-next"></span><span class="sr-only">Следваща страница</span></a></div><div id="all"> </div><hr/><div class="container"><div class="row"><div id="joke" class="col-md-10"><h2> 
<?php 
echo file_get_contents (__DIR__ . "/jokes/" . (rand () % 72 + 1) . ".php"); 
?></h2></div></div></div><ul class="pager"><li class="previous"><a id="prev" href="#">Предишна страница</a></li><li class="next"><a id="next" href="#">Следваща страница</a></li></ul><footer><div class="container container-holder"><ul class="row"><li class="col-md-3 col-sm-12 col-xs-12 footer-list-wrapper"><h3 class="list-title">TechEdu ++</h3><hr/><ul class="footer-list"><li><a href="/aboutus.php">За нас</a></li><li><a href="/aboutus.php#trainers">Лектори</a></li><li><a href="/aboutus.php#authors">Автори на проекта</a></li></ul></li><li class="col-md-3 col-sm-12 col-xs-12 footer-list-wrapper"><h3 class="list-title">Курсове &amp; Семинари</h3><hr/><ul class="footer-list"><li><a href="/trainings/tracks">Тракове</a></li><li><a href="/trainings/courses">Курсове</a></li><li><a href="/trainings/seminars">Семинари</a></li></ul></li><li class="col-md-3 col-sm-12 col-xs-12 footer-list-wrapper"><h3 class="list-title">Партньори</h3><hr/><ul class="footer-list"><li><a target="_blank" href="https://delta.bg/">Delta.BG</a></li><li><a target="_blank" href="http://www.vrexpress.bg/">VR Express</a></li><li><a target="_blank" href="https://consent.io/">Consent.io</a></li><li><a target="_blank" href="http://www.igreet.co/">iGreet</a></li></ul></li><li class="col-md-3 col-sm-12 col-xs-12 footer-list-wrapper"><ul class="social"><li><a href="https://facebook.com/TechEducationGroup/" target="_blank" class="icon-btn"><span class="fa fa-2x fa-facebook"></span></a></li><li><a href="https://www.youtube.com/channel/UCT1g_MbzP5UJauAqmvNq1aQ" target="_blank" class="icon-btn"><span class="fa fa-2x fa-youtube-play"></span></a></li><li><a href="http://github.com/TechEducationPlusPlus/" target="_blank" class="icon-btn"><span class="fa fa-2x fa-github"></span></a></li></ul><div class="all-rights-reserved"><p>&copy; 2017 TechEdu ++</p><p>Всички права запазени.</p><p> <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/2.5/in/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/2.5/in/88x31.png"/></a></p></div></li></ul></div></footer><script src="/js/jquery.min.js"></script><script src="/js/tether.min.js"></script><script src="/js/bootstrap.min.js"></script><script src="/js/material.min.js"></script><script src="/js/ripples.min.js"></script><script src="/js/snackbar.min.js"></script><script src="/js/jquery.nouislider.min.js"></script><script src="/js/main.js"></script><script>let slides = $(".carousel-inner")[0];
let all = $("#all");
let indicators = $(".carousel-indicators")[0];
let topNews = $("#top>article"); 
let articles = $("#news_container>article"); 
{
	let div = document.createElement("div");
	let newElement = topNews[0].cloneNode ("true");
	(newElement).className = "hideMe";
	$(newElement.children[newElement.children.length - 1]).hide();
	div.append(newElement);
	div.innerHTML += '<div class="spacing"> </div>';
	div.className = "item active";
	slides.append(div);
	indicators.innerHTML += ('<li data-target="#myCarousel" data-slide-to="0" class="active"></li>');
}
for (let i = 1; i < 10 && i < topNews.length; i += 1) {
	console.log (i + " < " + topNews.length); 
	let div = document.createElement("div");
	let newElement = topNews[i].cloneNode ("true");
	newElement.className = "hideMe";
	$(newElement.children[newElement.children.length - 1]).hide();
	div.append(newElement);
	div.innerHTML += '<div class="spacing"> </div>';
	div.className = "item";
	slides.append(div);
	indicators.innerHTML += ('<li data-target="#myCarousel" data-slide-to="' + i + '"></li>');
}
for (let i = 0; i < articles.length; i += 1) {
	console.log (i + " <<<< " + articles.length); 
	let newElement = articles[i].cloneNode ("true");
	$(newElement.children[newElement.children.length - 1]).show();
	all.append (newElement);
	all.innerHTML += '<hr>';
}
$(".item article").click(function() {
	if (this.className == "showMe") {
		(this).className = "hideMe";
		$(this.children[this.children.length - 1]).hide(500);
	} else {
		(this).className = "showMe";
		$(this.children[this.children.length - 1]).show(500);
	}
});

let page = Number ($("#page").html());
let next = "/news/" + (page + 1);
let prev = "/news/" + (page - 1);
if (page + 1 > 1)
{
	next = "#";
}
if (page - 1 < 1)
{
	prev = "#";
}
$("#next").attr ("href", next);
$("#prev").attr ("href", prev);</script></body></html>