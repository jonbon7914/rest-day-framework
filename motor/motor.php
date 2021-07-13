<?php

include_once("motor/db_transactions/motor_select.php");
include_once("motor/db_transactions/motor_delete.php");
include_once("motor/db_transactions/motor_update.php");
include_once("motor/db_transactions/motor_insert.php");
include_once("motor/util/util.php");
include_once("core/util.php");

Class Motor{

	public function startTransact($type, $json){
		$result = (((new utilCheckToken($type,$json))->doTask()));
		if(isset($result->active)){
			if($result->active == "1"){
				return (new (stristr($type,"-",true)))->startTransact($type, $json);
			}
		}else{
			header("HTTP/1.1 401 Unauthorized");
			exit;
		}
	}

}

Class Select{

	public function startTransact($type, $json){
		return (new (ltrim(stristr($type,"-",false), '-'))($type,$json))->doTask();
	}
}

Class Insert{

	public function startTransact($type, $json){
		return (new (ltrim(stristr($type,"-",false), '-'))($type,$json))->doTask();
	}
}

Class Update{

	public function startTransact($type, $json){
		return (new (ltrim(stristr($type,"-",false), '-'))($type,$json))->doTask();
	}
}

Class Delete{

	public function startTransact($type, $json){
		return (new (ltrim(stristr($type,"-",false), '-'))($type,$json))->doTask();
	}
}

Class Util{

	public function startTransact($type, $json){
		return (new (ltrim(stristr($type,"-",false), '-'))($type,$json))->doTask();
	}
}


?>