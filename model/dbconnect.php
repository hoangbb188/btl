<?php
include_once 'config.php';
class database
{
	protected $num_rows = 0;
	protected $conn;
	protected $result;
	protected $insert_id;
	protected $q;
	// /**
	// function __construct($hostname,$username,$password,$database){
	// 	$this->conn = new mysqli($hostname,$username,$password,$database) or die("Kết nối thất bại");
	// 	$this->conn->query("SET NAMES utf8");
	// }
	// **/

	protected function ketnoi()
	{
		global $config;
		$this->conn = new mysqli($config['hostname'],$config['username'],$config['password'],$config['database']) or die("Kết nối thất bại");
		$this->conn->query("SET NAMES utf8");
	}

	public function exec($SQLquery)
	{
		$this->ketnoi();
		$this->result = $this->conn->query($SQLquery);
		//echo $SQLquery.'<hr>';
		if(isset($this->result->num_rows)) $this->num_rows = $this->result->num_rows;
		return $this->result;
	}

	public function insert($table,$data)
	{ //$data là mảng
		$data = $this->dinh_dang_insert($data);
		//print_r($data);
		$this->q = "INSERT INTO $table (".$data[0].") VALUES (".$data[1].")";
		//echo '<br>'.$this->q;

		$this->exec($this->q);
		$this->insert_id = ($this->conn->insert_id) ? $this->conn->insert_id : 0;
	}
	public function delete($table,$condition = true)
	{
		$this->q = "DELETE FROM $table WHERE $condition";
		return $this->exec($this->q);
	}

	/*
	public function update($table,$column,$condition = true){
	 	$this->exec("UPDATE $table SET $column WHERE $condition");
	}
	*/

	public function update($table,$data,$condition = true)
	{ //$data là mảng
		$data = $this->dinh_dang_update($data);
		//print_r($data);
		$this->q = "UPDATE $table SET $data WHERE $condition";
		//echo $this->q.'<br>';
	return	$this->exec($this->q);
	}


	public function select($table,$condition = true,$column = "*")
	{
		$this->q = "SELECT $column FROM $table WHERE $condition";
		$this->exec($this->q);
	}
	
	public function getrow()
	{
		return ($this->result->num_rows > 0) ? $this->result->fetch_assoc() : 0;
	}
	
	public function getAllrows()
	{
		if($this->result->num_rows > 0){
			while($row = $this->result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		else return 0;
	}

	private function dinh_dang_insert($arr)
	{
		$data = array();
		$data[0] = implode(", ",array_keys($arr));
		$value = array_values($arr);
		foreach ($value as $key => $gt) {
			$value[$key] = "'$gt'";
		}

		$data[1] = implode(", ", $value);
		return $data;
	}

	private function dinh_dang_update($arr = array())
	{
		$keyandvalue = array();
		foreach ($arr as $key => $gt) {
			array_push($keyandvalue, "$key='$gt'");
		}
		$data = implode(", ", $keyandvalue);
		return $data;
	}
	/*
	private function dinh_dang_dieu_kien($arr = array()){
		$keyandvalue = array();
		foreach ($arr as $key => $gt) {
			array_push($keyandvalue, "$key='$gt'");
		}
		$data = implode(" AND ", $keyandvalue);
		return $data;
	}
	*/
};
?>