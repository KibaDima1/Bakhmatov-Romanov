<?php
require_once 'exceptions.php';
require_once 'sql.php';
require_once 'users.php';

class UsersDAO
{
	public static function get_list()
	{
		$arr = array();
		try {
			$mysqli = SqlDriver::get_connection();
			if (!($stmt = $mysqli->prepare("SELECT * from users")))
				throw new MySQLiPrepareException();
			$stmt->execute();
			$stmt->bind_result($id, $fname, $sname, $tname, $is_admin, $login, $pass);
			while ($stmt->fetch()) {
				$arr[$id] = new User($id, $fname, $sname, $tname, $is_admin, $login, $pass);
			}
			$stmt->close();
		} catch (Exception $err) {
			throw $err;
			//echo sprintf('Ошибка: %s\n', $err->getMessage());
		} finally {
			$mysqli->close();
		}
		return $arr;
	}

	public static function get_one($id)
	{
		try {
			$mysqli = SqlDriver::get_connection();
			if (!($stmt = $mysqli->prepare("select * from users where id=?")))
				throw new MySQLiPrepareException();
			// TODO


		} catch (Exception $err) {
			throw $err;
			//echo sprintf('Ошибка: %s\n', $err->getMessage());
		} finally {
			$mysqli->close();
		}
	}

	public static function insert($user)
	{
		$res = -1;
		try {
			$mysqli = SqlDriver::get_connection();
			if (!($stmt = $mysqli->prepare("INSERT INTO users (fname,sname,tname,is_admin,login,pass) VALUES (?,?,?,false,?,MD5(?))")))
				throw new MySQLiPrepareException();
			$stmt->bind_param('sssss', $user->fname, $user->sname, $user->tname, $user->login, $user->pass);
			$stmt->execute();
			$res = $stmt->affected_rows;
			if ($res < 1)
				throw new MySQLiQueryException();
			$stmt->close();
		} catch (Exception $err) {
			throw $err;
			//echo sprintf('Ошибка: %s\n', $err->getMessage());
		} finally {
			$mysqli->close();
		}
		return $res;
	}


	public static function update($user)
	{
		$res = -1;
		try {
			$mysqli = SqlDriver::get_connection();
			// TODO

		} catch (Exception $err) {
			throw $err;
			//echo sprintf('Ошибка: %s\n', $err->getMessage());
		} finally {
			$mysqli->close();
		}
		return $res;
	}

	public static function delete($id)
	{
		$res = -1;
		try {
			$mysqli = SqlDriver::get_connection();
			if (!($stmt = $mysqli->prepare("DELETE from users where id=?")))
				throw new MySQLiPrepareException();
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$res = $stmt->affected_rows;
			if ($res < 1)
				throw new MySQLiQueryException();
			$stmt->close();
		} catch (Exception $err) {
			throw $err;
			//echo sprintf('Ошибка: %s\n', $err->getMessage());
		} finally {
			$mysqli->close();
		}
		return $res;
	}

	public static function auth($login, $pass)
	{
		$item = null;
		try {
			$mysqli = SqlDriver::get_connection();

			if (!($stmt = $mysqli->prepare("SELECT id,fname,sname,tname,is_admin FROM users where login=? and pass=MD5(?)")))
				throw new MySQLiPrepareException();
			$stmt->bind_param("ss", $login, $pass);
			$stmt->bind_result($id, $fName, $sName, $tName, $is_admin);
			$stmt->execute();
			if ($stmt->fetch())
				$item = new User($id, $fName, $sName, $tName, $is_admin, $login, $pass);
			$stmt->close();
		} catch (Exception $err) {
			throw $err;
			//echo sprintf('Ошибка: %s\n', $err->getMessage());
		} finally {
			$mysqli->close();
		}
		return $item;
	}
}
