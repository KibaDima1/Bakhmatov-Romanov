<?php 
	session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Travel Agency Website</title>
	<meta name="description" content="Business website">
	<meta name="keywords" content="business, website">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<link href="../css/temp.css" rel="stylesheet"/>
	
</head>
<body>
<div id="page">
	<div id="top">
		<div id="logo"><img src="../images/logotip.jpg" width="90" height="83" alt=""></div>
		<div id="company_name">The sun's rays</div>
		<div id="company_name_sh">The sun's rays</div>

		
		<div id="registration">
			
		</div>

		<ul id="menu">
		<li><a href="index.php">Главная</a></li>
		<li><a href="tours.php">Туры</a></li>
		<li><a href="reviews.php">Отзывы</a></li>
		<li><a href="contact_details.php">Контакты</a></li>
		</ul>
	</div>
	<div id="header">
		<div id="smenu"><div class="corner1"></div>
		<div class="corner2"></div>
		</div>
	</div>
	<div id="wrap_bg"><div id="contentwrap">

		<div id="body_area">
			
			<form id="tour" action="" method="post">
				<h2>Пожалуйста, укажите ваши данные</h2>
				<div><p>Страна <input name="country" type="text"> </p></div>
				<div><p>Город <input name="town" type="text"></p></div>
				<div><p>Отель <input name="hotel" type="text"></p></div>
				<div><p>Звездность (1-5) <input name="stars" type="number"></p></div>
				<div><p>Дата тура <input name="date_tour" type="date"></p></div>
				<div><p>Стоимость <input name="cost" type="number"></p></div>
				<div><p>Дней <input name="days" type="number"></p></div>
				<div><p>Описание <input name="about" type="text"></p></div>
				<div><p><input type="submit" name="submit" value="Добавить"/></p></div>
			</form>
			
		</div>

		<div id="sidebar">
		  
		</div>
	</div>

		<div class="bottom"></div>
	</div>
	<div id="footer">© 2010 Travel Agency. All Rights Reserved</div>
</div>
</body>
</html>