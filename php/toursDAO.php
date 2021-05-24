<?php
	require_once 'sql.php';
	require_once 'tours.php';

	class ToursDAO 
	{
		public static function get_list() {
			$arr = array();
			try {
				$mysqli = SqlDriver::get_connection();
				if (!($stmt = $mysqli->prepare("SELECT * from tour"))) 
					throw new Exception($mysqli->error);
				$stmt->execute();
				$stmt->bind_result($id, $country, $town, $hotel, $stars, $date_tour, $cost, $days, $about);
				while($stmt->fetch()) {
					$arr[$id] = new Tour($id, $country, $town, $hotel, $stars, $date_tour, $cost, $days, $about );
				}
				$stmt->close();

			} catch(Exception $err) {
				echo 'Ошибка: ' .  $err->getMessage() . "\n";
			}
			finally {
				$mysqli->close();
			}
			return $arr;
			
		}
		
		public static function get_one($id) {
			$item = array();
			try {
				$mysqli = SqlDriver::get_connection();
				if (!($stmt = $mysqli->prepare("SELECT * from tour where id=?"))) 
					throw new Exception($mysqli->error);
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$stmt->bind_result($id, $country, $town, $hotel, $stars, $date_tour, $cost, $days, $about);
				if($stmt->fetch()) {
					$item = new Tour($id, $country, $town, $hotel, $stars, $date_tour, $cost, $days, $about );
				}
				$stmt->close();

			} catch(Exception $err) {
				echo 'Ошибка: ' .  $err->getMessage() . "\n";
			}
			finally {
				$mysqli->close();
			}
			return $item;
		}
		
		public static function insert($user) {
			try {
				if (!($stmt = $mysqli->prepare("INSERT into tour (country,town,hotel,stars,date_tour,cost,days,about) values (?,?,?,?,?,?,?,?)"))) 
					throw new Exception($stmt->error);
				$stmt->execute();

				if($stmt->affected_rows < 1)
					throw new Exception('Не получилось');
				header('Location: ../tours.php');
				$stmt->close();
			} 
			catch(Exception $err) {
				echo 'Ошибка: ' .  $err->getMessage() . "\n";
			}
			finally {
				$mysqli->close();
			}
		}
		
		public static function update($user) {
			try {
				$mysqli = SqlDriver::get_connection();
				if (!($stmt = $mysqli->prepare("UPDATE tour set country=?,town=?,hotel=?,stars=?,date_tour=?,cost=?,days=?,about=? where id=?")))
					throw new Exception($stmt->error);
				$stmt->bind_param("sssisdisi",  );
				$stmt->execute();
				if($stmt->affected_rows > 0) 
						throw new Exception('Не получилось');
				header('Location: ../tours.php');
				$stmt->close();
			} 
			catch(Exception $err) {
				echo 'Ошибка: ' .  $err->getMessage() . "\n";
			}
			finally {
				$mysqli->close();
			}
		}
		
		public static function delete($id) {
			try {
				$mysqli = SqlDriver::get_connection();
				if (!($stmt = $mysqli->prepare("DELETE FROM `tour` WHERE id=?")))
					throw new Exception($stmt->error);
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$res = $stmt->affected_rows;
				if($res < 1) 
					throw new Exception('Не получилось');
				header('Location: ../tours.php');
				$stmt->close();
			} 
			catch(Exception $err) {
				echo 'Ошибка: ' .  $err->getMessage() . "\n";
			}
			finally {
				$mysqli->close();
			}
		}
	}
?>