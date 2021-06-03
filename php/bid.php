<?php
	class Bid
	{
		public $id;
		public $tour_id;
		public $user_id;
		public $date_bid;
		
		public function __construct($id, $tour_id, $user_id, $date_bid) {
			$this->id = $id;
			$this->tour_id = $tour_id;
			$this->user_id = $user_id;
			$this->$date_bid = $date_bid;
		}
		
		public function toStr() {
			return sprintf('Тур: %s Клиент: %d Дата: %s', $this->tour_id, $this->user_id, $this->date_bid);
			//return 'Тур: ' . $this->tour_id . ' Клиент: ' . $this->user_id . ' Дата: ' . $this->date_bid;
		} 
	}
?>