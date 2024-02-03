<?php 
	include('constants.php');

	Class Database
	{
		//Տվյալների բազային միանալու ֆունկցիան
		public function db_connect()
		{
			$conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD) or die(mysqli_error()); 
			return $conn;
		}

		//Տվյալների բազան ընտրելու ֆունկցիան
		public function db_select($conn)
		{
			$db_select = mysqli_select_db($conn, DBNAME) or die(mysqli_error());
			return $db_select;
		}

		//Տվյալների բազայից տվյալներ ընտրելու ֆունկցիան
		public function select_data($tbl_name, $where="", $other="")
		{
			$query = "SELECT * FROM $tbl_name";
			if($where != "")
			{
				$query .= " WHERE $where";
			}
			if($other != "")
			{
				$query .= " $other";
			}
			return $query;
		}

		//Տվյալների բազայում գրառում անելու ֆունկցիան
		public function insert_data($tbl_name, $data)
		{
			$query = "INSERT INTO $tbl_name SET $data";
			return $query;
		}

		//Տվյալների բազայում տվյալների թարմացման ֆունկցիան
		public function update_data($tbl_name, $data, $where)
		{
			$query = "UPDATE $tbl_name SET $data WHERE $where";
			return $query;
		}

		//Տվյալների բազայում տվյալների հեռացման ֆունկցիան
		public function delete_data($tbl_name, $where)
		{
			$query = "DELETE FROM $tbl_name WHERE $where";
			return $query;
		}

		//Հարցում կատարելու ֆունկցիան
		public function execute_query($conn,$query)
		{
			$res = mysqli_query($conn,$query) or die(mysqli_error($conn));
			return $res;
		}

		//Տողերի քանակը հաշվարկելու ֆունկցիան
		public function num_rows($res)
		{
			$num_rows = mysqli_num_rows($res);
			return $num_rows;
		}

		//Տվյալների բազայից բոլոր տվյալները ստանալու ֆունկցիան
		public function fetch_data($res)
		{
			$row = mysqli_fetch_assoc($res);
			return $row;
		}
	}
?>