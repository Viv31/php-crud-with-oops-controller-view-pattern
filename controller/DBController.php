<?php
class database{
	private $db_host;
	private $db_user;
	private $db_password;
	private $db_name;

	protected function connect(){
		$this->db_host = 'localhost';
		$this->db_user = 'root';
		$this->db_password = '';
		$this->db_name = 'CRUD-OOPS-PHP';
		$conn = new mysqli($this->db_host,$this->db_user,$this->db_password,$this->db_name);
		return $conn;
	}
}
class DBController extends database{

	public function fetchData($table,$fields='*'){
		$sql="select $fields from $table ";
		 $result =$this->connect()->Query($sql);
		 //print_r($result);
		 if($result->num_rows > 0){
		 	$records = array();
		 	while($row =$result->fetch_assoc() ){
		 		//print_r($row);
		 		 $records[] = $row;
		 	}
		 	return $records;
		 }

	}

	public function insertData($table,$data_arr){
		if($data_arr!=''){
			foreach ($data_arr as $key => $value) {
				$column_name[] = $key;
				$column_val[] = $value;
			}
			$column = implode(',',$column_name);
			$values = implode("','",$column_val);
			$values = "'".$values."'";
			$insert_data ="INSERT INTO $table($column) values($values)";
			$res = $this->connect()->query($insert_data);

		}
		

	}

	public function DeleteData($table,$id){
		$delete_data = " DELETE FROM $table WHERE id = $id ";
		$result = $this->connect()->query($delete_data);

	}

	public function getDataforUpdate($table,$id){
		$get_data_for_update = " SELECT * FROM $table WHERE id = $id ";
		$result = $this->connect()->query($get_data_for_update);
		if($result->num_rows > 0){
			$records = array();
			while($row = $result->fetch_assoc()){
				$records[] = $row;

			}
			return $records;

		}

	}

	public function UpdateData($table,$data_arr,$id){
		if($data_arr!=''){
			$update_query = " UPDATE $table SET ";
			$count = count($update_query);
			$i = 1;
			foreach($data_arr as $k => $v) {
				if($i == $count){
					$update_query.="$k='$v'";
				}else{
					$update_query.="$k='$v', ";

				}
				$i++;
			}
			$update_query.= "WHERE id = $id";
			$result = $this->connect()->query($update_query);

		}
	}

}

?>