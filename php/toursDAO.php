<?php
require_once 'exceptions.php';
require_once 'sql.php';
require_once 'tours.php';

class ToursDAO
{
	public static function get_list()
	{
		$arr = array();
		try {
			$mysqli = SqlDriver::get_connection();
			if (!($stmt = $mysqli->prepare("SELECT * from tour")))
				throw new MySQLiPrepareException();
			$stmt->execute();
			$stmt->bind_result($id, $country, $town, $hotel, $stars, $date_tour, $cost, $days, $about);
			while ($stmt->fetch()) {
				$arr[$id] = new Tour($id, $country, $town, $hotel, $stars, $date_tour, $cost, $days, $about);
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
		$item = array();
		try {
			$mysqli = SqlDriver::get_connection();
			if (!($stmt = $mysqli->prepare("SELECT * from tour where id=?")))
				throw new MySQLiPrepareException();
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($id, $country, $town, $hotel, $stars, $date_tour, $cost, $days, $about);
			if ($stmt->fetch()) {
				$item = new Tour($id, $country, $town, $hotel, $stars, $date_tour, $cost, $days, $about);
			}
			$stmt->close();
		} catch (Exception $err) {
			throw $err;
			//echo sprintf('Ошибка: %s\n', $err->getMessage());
		} finally {
			$mysqli->close();
		}
		return $item;
	}

	public static function insert($tour)
	{
		try {
			$mysqli = SqlDriver::get_connection();
			if (!($stmt = $mysqli->prepare("INSERT into tour (country,town,hotel,stars,date_tour,cost,days,about) values (?,?,?,?,?,?,?,?)")))
				throw new MySQLiPrepareException();
			$stmt->bind_param("sssisdisi",  $tour->country, $tour->town, $tour->hotel, $tour->stars, $tour->date_tour, $tour->cost, $tour->days, $tour->about);
			$stmt->execute();
			if ($stmt->affected_rows < 1)
				throw new MySQLiQueryException();
			header('Location: ../tours.php');
			$stmt->close();
		} catch (Exception $err) {
			throw $err;
			//echo sprintf('Ошибка: %s\n', $err->getMessage());
		} finally {
			$mysqli->close();
		}
	}

	public static function update($tour)
	{
		try {
			$mysqli = SqlDriver::get_connection();
			if (!($stmt = $mysqli->prepare("UPDATE tour set country=?,town=?,hotel=?,stars=?,date_tour=?,cost=?,days=?,about=? where id=?")))
				throw new MySQLiPrepareException();
			$stmt->bind_param("sssisdisi",  $tour->country, $tour->town, $tour->hotel, $tour->stars, $tour->date_tour, $tour->cost, $tour->days, $tour->about, $tour->id);
			$stmt->execute();
			if ($stmt->affected_rows > 0)
				throw new MySQLiQueryException();
			header('Location: ../tours.php');
			$stmt->close();
		} catch (Exception $err) {
			throw $err;
			//echo sprintf('Ошибка: %s\n', $err->getMessage());
		} finally {
			$mysqli->close();
		}
	}

	public static function delete($id)
	{
		try {
			$mysqli = SqlDriver::get_connection();
			if (!($stmt = $mysqli->prepare("DELETE FROM `tour` WHERE id=?")))
				throw new MySQLiPrepareException();
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$res = $stmt->affected_rows;
			if ($res < 1)
				throw new MySQLiQueryException();
			header('Location: ../tours.php');
			$stmt->close();
		} catch (Exception $err) {
			throw $err;
			//echo sprintf('Ошибка: %s\n', $err->getMessage());
		} finally {
			$mysqli->close();
		}
	}
}
