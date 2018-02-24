<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Задачник" />
		<meta name="keywords" content="Задачник" />
		<title>Задачник</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
		
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<a href="/">Задачник</a>
				</div>
				<?if(Controller_user::authorized()):?>
					<div class="user_authorized">
						<?=$_SESSION["user"]["username"]?> <a href="/?logout=1">выход</a>
					</div>
				<?endif;?>
				<div id="menu">
					<ul>
						<li class="first active"><a href="/">Главная</a></li>
						<li><a href="/issues">Задачи</a></li>
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page">
				
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
			<div id="page-bottom">
				&copy; <?=date("Y")?> Dmitry Dobrokhvalov
			</div>
		</div>
	</body>
</html>