<?php

include_once 'connection.php';

Class Transact{
	public $last_insert_id = "";
	public function insert($qry,$param){
		$msg = "";
		try
		{
		    $database = new Connection();
		    $db = $database->openConnection();
		    $stm = $db->prepare($qry) ;
		    $stm->execute($param);
		    $this->last_insert_id = $db->lastInsertId();
		    $msg = "success";
		}
		catch (PDOException $e)
		{
		    $msg = "There is some problem in connection: " . $e->getMessage();
		}

		return $msg;

	}

	public function getLastInsertId(){
		
		$msg = $this->last_insert_id;
		return $msg;

	}

	public function select($qry){

		$msg = "";

		try
		{
		    $database = new Connection();
		    $db = $database->openConnection();
		    $sql = $qry;
		    $msg = $db->query($sql);
		    return $msg->fetchAll();
		    
		}
		catch (PDOException $e)
		{
		    $msg = "failed";
		}

		return $msg;

	}

	public function update($qry){

		$msg = "";

		try
		{
		     $database = new Connection();
		     $db = $database->openConnection();
		     $sql = $qry ;
		     $affectedrows  = $db->exec($sql);
		   if(isset($affectedrows))
		    {
		       $msg = "success";
		    }          
		}
		catch (PDOException $e)
		{
		    $msg = "There is some problem in connection: " . $e->getMessage();
		}

		return $msg;
	}

	public function delete($qry){

		$msg = "";

		try
		{
		     $database = new Connection();
		     $db = $database->openConnection();
		     $sql = $qry ;
		     $affectedrows  = $db->exec($sql);
		   if(isset($affectedrows))
		    {
		       $msg = "success";
		    }          
		}
		catch (PDOException $e)
		{
		    $msg = "There is some problem in connection: " . $e->getMessage();
		}

		return $msg;
	}
		
	public function procedure($qry,$param){
		$msg = "";
		try
		{
		$database = new Connection();
		$db = $database->openConnection();
		$stm = $db->prepare($qry);
		$stm->execute($param);
		$stm->closeCursor();
		 
		 $row = $db->query("SELECT @result AS result")->fetch(PDO::FETCH_ASSOC); 
		 if ($row) { return $row !== false ? $row['result'] : null; }

		 }
		catch (PDOException $e)
		{
		$msg = "There is some problem in connection: " . $e->getMessage();
		}

		 return $msg;

	}

	public function procedure2($qry,$param){
		$msg = "";
		try
		{
		$database = new Connection();
		$db = $database->openConnection();
		$stm = $db->prepare($qry) ;
		$stm->execute($param);

		$stm->closeCursor();
		$msg = $db->query($sql);
		return $msg->fetchAll();

		}
		catch (PDOException $e)
		{
		$msg = "There is some problem in connection: " . $e->getMessage();
		}

		return $msg;

	}
	

}

?>