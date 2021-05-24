<?php
	class SqlDriver
	{
		static $host = "localhost";
		static $db = "agency";
		static $login = "user";
		static $pass = "user";

		public static function get_connection() {
			$mysqli = new mysqli(self::$host, self::$login, self::$pass, self::$db);
			if ($mysqli->connect_errno)
				throw new Exception($mysqli->connect_error);	
			return $mysqli;
		}
	}
?>