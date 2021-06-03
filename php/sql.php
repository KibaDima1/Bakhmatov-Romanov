<?php

require_once 'exceptions.php';


class SqlDriver
{
	public static function get_connection()
	{
		$filename = "./../app.properties";
		$login = "";
		$pass = "";
		$host = "";
		$db = "";
		if (file_exists($filename) && is_readable($filename)) {
			$fh = fopen($filename, "r");

			if ($fh) {
				while (($line = fgets($fh, 255)) !== false) {
					if (!empty($line)) {
						$params = explode(':', $line);
						if (strcmp($params[0], "login") == 0)
							$login = trim($params[1]);
						else if (strcmp($params[0], "pass") == 0)
							$pass = trim($params[1]);
						else if (strcmp($params[0], "host") == 0)
							$host = trim($params[1]);
						else if (strcmp($params[0], "db") == 0)
							$db = trim($params[1]);
					}
				}

				if (!feof($fh))
					throw new FileReadException();
				fclose($fh);
			} else
				throw new FileOpenException();
		}
		$mysqli = new mysqli($host, $login, $pass, $db);
		if ($mysqli->connect_errno)
			throw new MySQLiConnectException();
		return $mysqli;
	}
}