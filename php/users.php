<?php
	class User
	{ 
		public $id;
		public $fname, $sname, $tname;
		public $is_admin;
		public $login, $pass;
		
		function __construct($i, $f, $s, $t, $a, $l, $p) {
			$this->id = $i;
			$this->fname = $f;
			$this->sname = $s;
			$this->tname = $t;
			$this->is_admin = $a;
			$this->login = $l;
			$this->pass = $p;
		}
		
		function toStr() {
			return sprintf("%s %s %s", $this->fname, $this->sname, $this->tname);
			//return $this->fname . " " . $this->sname . " " . $this->tname; 
		}
	}
?>