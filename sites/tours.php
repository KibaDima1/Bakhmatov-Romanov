<?php
	session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Туры</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<link href="../css/temp.css" rel="stylesheet"/>
</head>
<body>
<div id="page">
	<div id="top">
		<div id="logo"><img src="../images/logotip.jpg" width="90" height="83" alt=""></div>
		<div id="company_name">The sun's rays</div><div id="company_name_sh">The sun's rays</div>

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
				
			<h1>Список туров</h1>
				<?php
					require_once '../php/bidDAO.php';
					
					echo '<table>
					<tr><th>Страна</th><th>Город</th><th>Отель</th><th>Стоимость</th><th>Дата поездки</th><th>Звездность</th><th></th></tr>';

					$list = ToursDAO::get_list();
					foreach ($list as $key => $value) {
						echo '<tr>';
						echo '<td>' . $value->country . '</td>';
						echo '<td>' . $value->town . '</td>';
						echo '<td>' . $value->hotel . '</td>';
						echo '<td>' . $value->cost . '</td>';
						echo '<td>' . $value->date_tour . '</td>';
						echo '<td>' . $value->stars . '</td>';
						if(isset($_SESSION['user_id']))
							echo '<td><a href="../php/bidHandler.php?method=insert&id=' . $value->id . '">Записаться</a></td>';
						echo '</tr>';
					}
					echo '</table>';
					
					if(isset($_SESSION['user_id'])) {
						echo '<table>
						<tr><th>Страна</th><th>Город</th><th>Отель</th><th>Стоимость</th><th>Дата поездки</th><th>Звездность</th><th></th></tr>';

						$list = BidDAO::get_by_user($_SESSION['user_id']);
						$sum = 0;
						foreach ($list as $key => $value) {
							echo '<tr>';
							echo '<td>' . $value->country . '</td>';
							echo '<td>' . $value->town . '</td>';
							echo '<td>' . $value->hotel . '</td>';
							echo '<td>' . $value->cost . '</td>';
							$sum += $value->cost;
							echo '<td>' . $value->date_tour . '</td>';
							echo '<td>' . $value->stars . '</td>';
							if(isset($_SESSION['user']))
								echo '<td><a href="../php/bidHandler.php?method=delete&id=' . $key . '">Отписаться</a></td>';
							echo '</tr>';
						}
						echo '</table>';
						echo '<p>Суммарная стоимость: ' . $sum . ' у.е.</p>';
					}
				?>
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
