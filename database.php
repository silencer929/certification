<?php
/**
 * 
 */
require_once "config.php";
class Database
{
	private string $server='';
	private string $dbname='';
	private string $password="";
	private string $username='';
	private $pdo;
	private  $stmt;
	public array $data=[];
	public int $rows =0;
	public static $instance;
	private function __construct()
	{
		$this->server= server;
		$this->dbname=dbname;
		$this->username=username;
		$this->password=password;
	}
	public static function get_instance()
	{
		try {
			if(!self::$instance){
				self::$instance= new Database();
			}
			else{
				throw new Exception("another instance is already running");
			}
		} catch (Exception $e) {
			echo $e->message();
		}
	}
	private function open_connection()
	{
		try {
			$options=array(
			PDO::ATTR_PERSISTENT=>true,
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
		);
		$this->pdo= new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->username, $this->password,$options);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	public function execQuery($query, $arr=[])
		{
			try {
				$this->open_connection();
				if($this->pdo){
					$this->stmt= $this->pdo->prepare($query);
					foreach ($arr as $key => &$value) {
						$this->stmt->bindparam($key, $value);
					}
					return $this->stmt->execute();
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
	public function load_data()
		{
			$this->get_rows();
		if($this->stmt){
			$this->rows= $this->stmt->rowCount();
		}
		if($this->rows < 1){
			return [];
		}
		if($this->rows == 1){
			$this->data[0]=$this->stmt->fetch(PDO::FETCH_ASSOC);
			return $this->data;
		}
		if($this->rows > 1){
			$this->data=$this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return $this->data;
		}
	public function get_rows() :int
	{
		return $this->rows;
	}
}

  ?>