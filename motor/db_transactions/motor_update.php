<?php
include_once("core/main.php");

class updateReportType extends Main{
	public function doTask(){
		return $this->transact->update("UPDATE test_table SET age = 1 WHERE id = " . $this->json->id);
	}
}

 ?>