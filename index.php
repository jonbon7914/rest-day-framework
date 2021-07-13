<?php

include("header/curl.php");
include("header/tools.php");
include("header/connection/transact.php");

//includes router classes
include_once("motor/motor.php");

Class Router{

	public function __construct(){

		$json_return = "There is a problem connecting to this service.";

		if(isset($_GET['action'])){
			$route = $_GET['action'];

			if(file_get_contents('php://input') !== null){
				$json_val = file_get_contents('php://input');

				$json_decoded = json_decode($json_val);
				$result = new \stdClass();
				$result->status = 0;
				
				$json_decoded->values->curl = new \stdClass();
				$result->msg = (new $route)->startTransact($json_decoded->action, $json_decoded->values);
				
				$result->status = 1;
			    if(strpos($json_decoded->action, "select") !== false){
	    			if($result->msg === "failed"){
		    			$result->status = 0;
		    		}
	    		}
	    		
	    		$json_return = $result;

			}

		}

		$json = json_encode($json_return);
		if ($json){
		    echo $json;
		}
		else{
		    echo json_last_error_msg();
		}

	}

}

$router = new Router();

?>