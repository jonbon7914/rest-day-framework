<?php
include_once("core/main.php");

class deleteReportType extends Main{
	public function doTask(){
		return $this->transact->select("DELETE FROM test_table");
	}
}

 ?>