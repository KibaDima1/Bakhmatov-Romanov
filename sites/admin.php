<?php
	require_once '../php/bidDAO.php';
	require_once '../php/toursDAO.php';
	require_once '../php/usersDAO.php';

	session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Администрация</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<link href="../css/temp.css" rel="stylesheet"/>
</head>
<body>
<div id="page">
	<div id="top">
		<div id="logo"><img src="../images/logotip.jpg" width="90" height="83" alt=""></div>
		<div id="company_name">The sun's rays</div><div id="company_name_sh">The sun's rays</div>

		<div id="registration">
			<a href="main.php">Выйти</a>
		</div>

		<ul id="menu">
		</ul>
	</div>
	<div id="header">
		<div id="smenu"><div class="corner1"></div>
			<div class="corner2"></div>
		</div>
	</div>
	<div id="wrap_bg"><div id="contentwrap">

		<div id="body_area">
				
			<h1>Панель администратора</h1>
			<hr/>
			<form method="post">
				<p>
					<div>
						Выберите таблицу
						<select size="1" id="table_select" name="table_select">
							<option value="-">-</option>
							<option value="users">Пользователи</option>
							<option value="tours">Туры</option>
							<option value="bids">Заявки</option>
						</select>
						<input type="submit" name="submit" value="Посмотреть"/>
					</div>
				</p>
			</form>
			<hr/>
			<?php
				if(isset($_POST['submit'])) {
					$arr = null;
					switch($_POST['table_select']) {
						case "-":
							break;
						case "users":
							$arr = UsersDAO::get_list();
							break;
						case "tours":
							$arr = ToursDAO::get_list();
							break;
						case "bids":
							$arr = BidDAO::get_list();
							break;
					}
					if($arr == null)
						return;
					echo '<table>';
					echo '<tr><th>Объект</th><th></th><th></th><th></th><th></th><th></th></tr>';
					foreach ($arr as $key => $value) {
						echo '<tr>';
						echo '<td colspan="4">' . $value->toStr() . '</td>';
						echo '<td> <a href="../php/adminHandler.php?method=delete&object=' . $_POST['table_select'] . '&id=' . $key . '">Удалить</a></td>';
						echo '<td> <a href="../php/adminHandler.php?method=update&object=' . $_POST['table_select'] . '&id=' . $key . '">Изменить</a></td>';
						echo '</tr>';
					}
					echo '</table>';
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
