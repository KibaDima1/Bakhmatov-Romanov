<?php
	session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Главная</title>
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
			<?php
				if(isset($_SESSION['user_id']))
					echo '<a href="sign_out.php">Выйти</a>';
				else {
					echo '<a href="sign_in.php">Войти</a>';
					echo '<a href="register.php">Регистрация</a>';
				}
			?>
		</div>

		<ul id="menu">
		<li><a href="main.php">Главная</a></li>
		<li><a href="tours.php">Туры</a></li>
		</ul>
	</div>
	<div id="header">
		<div id="smenu"><div class="corner1"></div>
		<div class="corner2"></div>
		</div>
	</div>
	<div id="wrap_bg"><div id="contentwrap">

		<div id="body_area">

			<h2>Мы развиваем те направления, которые интересны туристам круглый год:</h2>
			<ul>
				<li>Экскурсионные туры</li>
				<li>Отдых на море</li>
				<li>Горнолыжные туры</li>
				<li>Образовательные туры</li>
				<li>Отдых и лечение</li>
				<li>Круизы по всему миру</li>
				<li>Рыбалка</li>
				<li>Свадебные туры</li>
			</ul>
			
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
