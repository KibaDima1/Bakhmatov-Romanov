<?php
	class Tour
	{
		public $id;
		public $country;
		public $town;
		public $hotel;
		public $stars;
		public $date_tour;
		public $cost;
		public $days;
		public $about;
		
		function __construct($id, $c, $t, $h, $s, $d, $cost, $days, $a) {
			$this->id = $id;
			$this->country = $c;
			$this->town = $t;
			$this->hotel = $h;
			$this->stars = $s;
			$this->date_tour = $d;
			$this->cost = $cost;
			$this->days = $days;
			$this->about = $a;
		}
		
		function toStr() {
			return sprintf("%s г. %s %s (%d зв.) %.2f у.е.", $this->country, $this->town, $this->hotel, $this->stars, $this->cost);
			//return $this->country . " г. " . $this->town . " " . $this->hotel . ' (' . $this->stars . " зв.) " . $this->cost . " у.е."; 
		}
	}
?>