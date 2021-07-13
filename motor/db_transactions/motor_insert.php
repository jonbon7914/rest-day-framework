<?php
include_once("core/main.php");

class insertReportType extends Main{
	public function doTask(){
		
		return $this->transact->insert("
			INSERT INTO test_table (
				`age`,
				`status`
			) VALUES (
				:age,
				:status
			)",
			array(
				':age' => $this->json->age,
				':status' => $this->json->status
			)
		);
	}
}

 ?>