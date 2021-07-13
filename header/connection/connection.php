<?php 

include("const.php");

Class Connection{
	
	private $use_ssl = USE_SSL;
	private $server = "mysql:host=". MYSQL_HOST .";port=". SSH_MYSQL_PORT .";dbname=" . MYSQL_DB;
	private $user = MYSQL_USERNAME;
	private $pass = MYSQL_PASS;

	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
	protected $con;

    public function openConnection(){	


		try
			{
				//Values can be changed on const.php
				$this->server = "mysql:host=". LOCAL_MYSQL_HOST .";dbname=" . LOCAL_MYSQL_DB;
				$this->user = LOCAL_MYSQL_USERNAME;
				$this->pass = LOCAL_MYSQL_PASS;
				$this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
				return $this->con;

				//The connection below can be used for seperated database like digitalocean mysql manager
				// $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES => false);
				// $this->server = "mysql:host=private-db-mysql-sgp1.onhost.com;dbname=motor;charset=utf8;port=25060";
				// $this->user = "user";
				// $this->pass = "password";
				// $this->con = new PDO($this->server, $this->user,$this->pass,$this->options);

				// return $this->con;

			}
		catch (PDOException $e)
			{
				echo "There is some problem in connection: " . $e->getMessage();
			}

    }

	public function closeConnection() {
	     $this->con = null;
	}

	}

?>