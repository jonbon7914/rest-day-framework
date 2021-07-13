<?php

Class tools{

	public function Random() {

		$random_chars = "";
		$characters = array(
		"A","B","C","D","E","F","G","H","J","K","L","M",
		"N","P","Q","R","S","T","U","V","W","X","Y","Z",
		"1","2","3","4","5","6","7","8","9");

		$keys = array();

		while(count($keys) < 11) {
			$x = mt_rand(0, count($characters)-1);
			if(!in_array($x, $keys)) {
			   $keys[] = $x;
			}
		}

		foreach($keys as $key){
		   $random_chars .= $characters[$key];
		}
		return $random_chars;
	}	

	public function nowDate() {

		date_default_timezone_set('Asia/Manila');
		
		$now = new DateTime();		

		return $now->format('Y-m-d');
	}	
	
	public function now() {

		date_default_timezone_set('Asia/Manila');
		
		$now = new DateTime();		

		return $now->format('Y-m-d H:i:s');
	}

	public function nowPlusMonth($start, $month) {

		date_default_timezone_set('Asia/Manila');
		$now = new DateTime($start);	
		$now = $now->format('Y-m-d H:i:s');
		$str = "+". $month ." months";
		$now = date('Y-m-d H:i:s', strtotime($str, strtotime($now)));

		return $now;
	}
	
	public function nowCurrentDate() {

		date_default_timezone_set('Asia/Manila');
		
		$now = new DateTime();		

		return $now->format('d');
	}	

	public function nowGetLastDayOfMonth() {

		date_default_timezone_set('Asia/Manila');
		
		$now = new DateTime();		

		return $now->format('Y-m-t');
	}	

	public function nowGet15thDayOfNextMonth() {

		date_default_timezone_set('Asia/Manila');
		
		$now = new DateTime();
		$interval = new DateInterval('P1M');
		$now->add($interval);

		return $now->format('Y-m-15');
	}	
	
	public function getDayOfWeekNow() {

		date_default_timezone_set('Asia/Manila');
		
		$now = new DateTime();		

		return $now->format('N');
	}

	public function getNextDateFromNow() {

		date_default_timezone_set('Asia/Manila');
		
		$now = new DateTime();		
		$now->modify($next);
		
		return $now->format('Y-m-d');
	}

	public function log($function, $log){
		error_log($function . " :=: " . $log);
	}

}

 ?>