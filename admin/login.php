<html lang="en"><head><meta charset="utf-8"/><meta http-equiv="X-UA-Compatible" content="IE=edge"/><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/><meta name="description" content="The core aim of our project is to create online learning management system that combines best practices in organizing training so that it will be interesting, useful and much easier for the students. The most important part of our project is to fertilize future programmers, showing them that it is not as difficult as it sounds. This will happen through brief and extensive online practical competitions taken their levels, with certificates and prizes for the best ones."/><meta name="author" content="TechEdu++"/><meta name="keywords" content="Learning, Online, System, Presentations, Videos, Exam"/><meta name="distribution" content="web"/><meta name="robots" content="index, follow"/><meta name="google-site-verification" content="eCU54DH_8vQnzWO0Q3fXoQmalvA3rCjiXSH6mZdDgkg"/><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/><link rel="icon" href="/favicon.png"/><title>Студентска система :: TechEdu ++</title><link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700"/><link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons"/><link rel="stylesheet" href="/css/bootstrap.min.css"/><link rel="stylesheet" href="/css/bootstrap-material-design.min.css"/><link rel="stylesheet" href="/css/ripples.min.css"/><link rel="stylesheet" href="/css/snackbar.min.css"/><link rel="stylesheet" href="/css/extension.css"/><link href="/css/jumbotron.css" rel="stylesheet"/><meta property="og:url" content="https://www.facebook.com/TechEducationGroup/"/><meta property="og:type" content="website"/><link rel="stylesheet" href="/news/d9757859af.css"/><link rel="stylesheet" href="/node_modules/font-awesome/css/font-awesome.min.css"/><div id="fb-root"></div><script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script></head><body><nav class="navbar navbar-static-top navbar-default"><div class="container"><div class="nav-header"><button type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand">TechEdu ++</a></div><div class="navbar-collapse collapse navbar-responsive-collapse"><ul class="nav navbar-nav"><li><a href="/">Начало</a></li><li><a href="/news">Новини</a></li><li><a href="/companies.php">Компании</a></li><li><a href="https://chat.techedu.cf">Форум</a></li><li><a href="/aboutus.php">За нас</a></li></ul><ul class="nav navbar-nav navbar-right"><li><a href="/login.php">Login</a></li></ul></div></div></nav><div style="/*height: 110%; */width: 100%; background-image: url('/maia.png');" class="jumbotron"><div class="container"><center><img style="background-color: rgba(0,0,0,0);" src="/img/logo.png"/><h1 class="display-3"><span>Administration</span></h1></center></div></div><div class="container"><div class="panel panel-primary"><div class="panel-heading"><h4><span>Tracks  </span><a style="color: white;" href="#" onclick="add_track();" data-toggle="modal" data-target="#createTrack"><span aria-hidden="true" class="glyphicon glyphicon-plus"></span></a></h4></div><div class="panel-body"><?php include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/admin/get/tracks.php");	?></div></div><div class="panel panel-primary"><div class="panel-heading"><h4><span>Seminars  </span><a style="color: white;" href="#" onclick="add_seminar();" data-toggle="modal" data-target="#createSeminar"><span aria-hidden="true" class="glyphicon glyphicon-plus"></span></a></h4></div><div class="panel-body"><?php include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/admin/get/seminars.php");	?></div></div></div><div id="dialog" class="container"></div><footer><div class="container container-holder"><ul class="row"><li class="col-md-3 col-sm-12 col-xs-12 footer-list-wrapper"><h3 class="list-title">TechEdu ++</h3><hr/><ul class="footer-list"><li><a href="/aboutus.php">За нас</a></li><li><a href="/aboutus.php#trainers">Лектори</a></li><li><a href="/aboutus.php#authors">Автори на проекта</a></li></ul></li><li class="col-md-3 col-sm-12 col-xs-12 footer-list-wrapper"><h3 class="list-title">Курсове &amp; Семинари</h3><hr/><ul class="footer-list"><li><a href="/trainings/tracks">Тракове</a></li><li><a href="/trainings/courses">Курсове</a></li><li><a href="/trainings/seminars">Семинари</a></li></ul></li><li class="col-md-3 col-sm-12 col-xs-12 footer-list-wrapper"><h3 class="list-title">Партньори</h3><hr/><ul class="footer-list"><li><a target="_blank" href="https://delta.bg/">Delta.BG</a></li><li><a target="_blank" href="http://www.vrexpress.bg/">VR Express</a></li><li><a target="_blank" href="https://consent.io/">Consent.io</a></li><li><a target="_blank" href="http://www.igreet.co/">iGreet</a></li></ul></li><li class="col-md-3 col-sm-12 col-xs-12 footer-list-wrapper"><ul class="social"><li><a href="https://facebook.com/TechEducationGroup/" target="_blank" class="icon-btn"><span class="fa fa-2x fa-facebook"></span></a></li><li><a href="https://www.youtube.com/channel/UCT1g_MbzP5UJauAqmvNq1aQ" target="_blank" class="icon-btn"><span class="fa fa-2x fa-youtube-play"></span></a></li><li><a href="http://github.com/TechEducationPlusPlus/" target="_blank" class="icon-btn"><span class="fa fa-2x fa-github"></span></a></li></ul><div class="all-rights-reserved"><p>&copy; 2017 TechEdu ++</p><p>Всички права запазени.</p><p> <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/2.5/in/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/2.5/in/88x31.png"/></a></p></div></li></ul></div></footer><script src="/js/jquery.min.js"></script><script src="/js/tether.min.js"></script><script src="/js/bootstrap.min.js"></script><script src="/js/material.min.js"></script><script src="/js/ripples.min.js"></script><script src="/js/snackbar.min.js"></script><script src="/js/jquery.nouislider.min.js"></script><script src="/js/main.js"></script><script src="/js/admin/main.js"></script></body></html>