<?php
include_once("core/main.php");

class selectReportType extends Main{
	public function doTask(){
		$qry = $this->transact->select("SELECT * FROM test_table");
		return $qry;
	}
}

 ?>