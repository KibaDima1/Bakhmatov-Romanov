<?php
    require_once '../php/usersDAO.php';

	session_start();

    if(isset($_POST['submit'])) {
        $user = new User(0, $_POST['fname'], $_POST['sname'], $_POST['tname'], false, $_POST['login'], $_POST['pass']);
        $res = UsersDAO::insert($user);
        if($res == -1)
            header("Location: register.php");
        else 
            header("Location: main.php");
        exit;
    }
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
	<script src="../js/jquery.js"></script>
	<script src="../js/main.js"></script>
</head>
<body>
<div id="page">
	<div id="top">
		<div id="logo"><img src="../images/logotip.jpg" width="90" height="83" alt=""></div>
		<div id="company_name">The sun's rays</div><div id="company_name_sh">The sun's rays</div>

		<ul id="menu">
		</ul>
	</div>
	<div id="header">
		<div id="smenu"><div class="corner1"></div>
			<div class="corner2"></div>
		</div>
	</div>
	<div id="wrap_bg">
		<div id="contentwrap">
			<div id="body_area">
				
				<form id="form_auth" action="" method="post">
					<h2>Пожалуйста, укажите ваши данные</h2>
					<div><p>Логин <input name="login" type="text"> </p></div>
					<div><p>Пароль <input name="pass" type="password"></p></div>
					<div><p>Фамилия <input name="fname" type="text"></p></div>
					<div><p>Имя <input name="sname" type="text"></p></div>
					<div><p>Отчество <input name="tname" type="text"></p></div>
					<div><p><input id="regBtn" type="submit" name="submit" value="Войти"/></p></div>
				</form>
				
				
			</div>
			<div id="sidebar">

			</div>
	  </div>

	</div>
	<div class="bottom"></div>
</div>
<div id="footer">© 2010 Travel Agency. All Rights Reserved</div>
</body>
</html>
