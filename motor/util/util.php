<?php

class utilReportType extends Main{
	public function doTask(){
		return $this->transact->select("SELECT * FROM test_table");
	}
}

 ?>