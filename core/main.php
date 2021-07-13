<?php

abstract class Main{
	public $json,$type,$transact,$tool;

	public function __construct($type, $json){
		$this->json = $json;
		$this->type = $type;

		$this->transact = new Transact();
		$this->tools = new Tools();

	}

	abstract public function doTask();

}
 ?>
