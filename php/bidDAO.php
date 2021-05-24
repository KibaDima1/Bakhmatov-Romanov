<?php
	require_once 'sql.php';
	require_once 'tours.php';
	require_once 'users.php';
	require_once 'bid.php';
	require_once 'toursDAO.php';

	class BidDao {
		public static function get_list() {
			$arr = array();
			try {
				$mysqli = SqlDriver::get_connection();
				if (!($stmt = $mysqli->prepare("SELECT * from bid"))) 
					throw new Exception($mysqli->error);
				$stmt->execute();
				$stmt->bind_result($id, $tour_id, $users_id, $date_bid);
				while($stmt->fetch()) {
					$arr[$id] = new Bid($id, $tour_id, $users_id, $date_bid);
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

		public static function get_by_user($user_d) {
			$arr = array();
			try {
				$mysqli = SqlDriver::get_connection();
				if (!($stmt = $mysqli->prepare("SELECT id, tour_id from bid where users_id=?"))) 
					throw new Exception($mysqli->error);
				$stmt->bind_param("i", $user_d);
				$stmt->execute();
				$stmt->bind_result($bid_id, $tour_id);
				while($stmt->fetch()) {
					$arr[$bid_id] = ToursDAO::get_one($tour_id);
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
			try {
				$mysqli = SqlDriver::get_connection();
				

			} catch(Exception $err) {
				echo 'Ошибка: ' .  $err->getMessage() . "\n";
			}
			finally {
				$mysqli->close();
			}
		}
		
		public static function insert($bid) {
			$res = -1;
			try {
				$mysqli = SqlDriver::get_connection();
				if (!($stmt = $mysqli->prepare("INSERT INTO bid (tour_id, users_id, date_bid) VALUES (?,?,NOW())"))) 
					throw new Exception($mysqli->error); 
				$stmt->bind_param('ii', $bid->tour_id, $bid->user_id);
				$stmt->execute();
				$res = $stmt->affected_rows;
				if($res < 1)
					throw new Exception("Не удалось");

			} catch(Exception $err) {
				echo 'Ошибка: ' .  $err->getMessage() . "\n";
			}
			finally {
				$mysqli->close();
			}
			return $res;
		}

		
		public static function update($user) {
			$res = -1;
			try {
				$mysqli = SqlDriver::get_connection();

			} catch(Exception $err) {
				echo 'Ошибка: ' .  $err->getMessage() . "\n";
			}
			finally {
				$mysqli->close();
			}
			return $res;
		}
		
		public static function delete($id) {
			$res = -1;
			try {
				$mysqli = SqlDriver::get_connection();
				if (!($stmt = $mysqli->prepare("DELETE from bid where id=?"))) 
					throw new Exception($mysqli->error); 
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$res = $stmt->affected_rows;
				if($res < 1)
					throw new Exception("Не удалось");

			} catch(Exception $err) {
				echo 'Ошибка: ' .  $err->getMessage() . "\n";
			}
			finally {
				$mysqli->close();
			}
			return $res;
		}
	}
?>