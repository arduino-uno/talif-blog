<?php
/**
*	Author nath4n <hashcat80@gmail.com>
* ClassName: Simple_PHP_CRUD_Class
*
* Description:
*	CRUD Methods ("GET", "PUT", "POST" & "DELETE") for Database Connection
*	Use array of table objects for MySQL operations
*
* Distributed under 'GNU General Public License, Version 3'
* Everyone is permitted to copy and distribute verbatim copies of this license document, but changing it is not allowed.
*/

class Simple_PHP_CRUD_Class {

	public $conn = null;
	public $rows = array();

	/**
	* If connection object is needed use this method and get access to it.
	* Otherwise, use the below methods for insert / update / etc.
	* Make sure the config file is exist ( "db_config.php" ).
	* @return \mysqli
	*/
	public function __construct() {
			// database connection
			try {

				if ( !defined( 'DB_HOST' ) || !defined( 'DB_USERNAME' ) || !defined( 'DB_PASSWORD' ) || !defined( 'DB_DATABASE_NAME' ) )  {
					throw new Exception( "\"db_config.php\" file is required." );
				} else {
					$this->conn = new mysqli( DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME );
					if ( mysqli_connect_errno() ) throw new Exception( mysqli_comysqli_connect_error() );
				}

			} catch ( Exception $exception ) {
				echo "Database could not be connected: " . $exception->getMessage() . "\r\n";
			}

	}

	/**
	* To execute query
	* ( select, insert, update, delete )
	* @param string $query
	* @return array
  */
	public function run_query( $query="select * from items" ) {

		try {

			$req = mysqli_query( $this->conn, $query );
			$this->rows = mysqli_fetch_all( $req, MYSQLI_ASSOC );
			if ( mysqli_num_rows( $req ) > 0 ) {
				return json_encode( $this->rows, JSON_PRETTY_PRINT );
			} else {
				throw new Exception( mysqli_error( $this->conn ) );
			}
		} catch ( Exception $exception ) {
			return "Error description: " . mysqli_error( $this->conn );
		}

		mysqli_close( $this->conn );
		return false;

	}

	/**
	* To select
	*
	* @param string $table
	* @param string $paramType
	* @return array
	*/
	public function select_table( $table="items", $id_key="", $id_val="" ) {

		try {
			$query = "SELECT * FROM $table" . ( $id_key ? " WHERE $id_key='$id_val'" : "" );
			$req = mysqli_query( $this->conn, $query );
			$this->rows = mysqli_fetch_all( $req, MYSQLI_ASSOC );
			if ( mysqli_num_rows( $req ) > 0 ) {
				return json_encode( $this->rows, JSON_PRETTY_PRINT );
			} else {
				throw new Exception( mysqli_error( $this->conn ) );
			}
		} catch ( Exception $exception ) {
			return "Error description: " . mysqli_error( $this->conn );
		}

		mysqli_close( $this->conn );
		return false;

	}

	/**
	* To insert
	*
	* @param string $table
	* @param array $sets
	* @return string
	*/
	public function insert_table( $table="items", $sets=Array() ) {

		$arr_string = $this->arr2string( $sets );

		try {
			$sql = "INSERT INTO $table SET $arr_string";

			if ( mysqli_query( $this->conn, $sql ) ) {
				return "Data Inserted.";
			} else {
				throw new Exception( mysqli_error( $this->conn ) );
			}

		} catch ( Exception $exception ) {
			return $exception->getMessage();
		}

		return false;

	}

	/**
	* To update
	*
	* @param string $table
	* @param array $sets
	* @param string $id_key, $id_val
	* @return string
	*/
	public function update_table( $table="items", $sets=Array(), $id_key="", $id_val="" ) {

		$arr_string = $this->arr2string( $sets );

		try {
			$sql = "UPDATE $table SET $arr_string WHERE $id_key='$id_val'";
			
			if ( mysqli_query( $this->conn, $sql ) ) {
				return "Data Updated.";
			} else {
				throw new Exception( mysqli_error( $this->conn ) );
			}

		} catch ( Exception $exception ) {
			return $exception->getMessage();
		}

		return false;

	}

	/**
	* To delete
	*
	* @param string $table
	* @param string $id_key, $id_val
	* @return string
	*/
	public function delete_table( $table="items", $id_key="", $id_val="" ) {

		try {
			$sql = "DELETE FROM $table WHERE $id_key='$id_val'";

			if ( mysqli_query( $this->conn, $sql ) ) {
				return "Data Deleted.";
			} else {
				throw new Exception( mysqli_error( $this->conn ) );
			}

		} catch ( Exception $exception ) {
			return $exception->getMessage();
		}

		return false;

	}

	/**
	* To get database results records count
	*
	* @param string $table
	* @return array
	*/
	public function get_total_all_records( $table="items" ) {

		try {
			$req = mysqli_query( $this->conn, "SELECT * FROM $table" );
			$this->rows = mysqli_fetch_all( $req, MYSQLI_ASSOC );
			if ( mysqli_num_rows( $req ) > 0 ) {
				return mysqli_num_rows( $req );
			} else {
				throw new Exception( mysqli_error( $this->conn ) );
			}
		} catch ( Exception $exception ) {
			echo "Error description: " . $exception->getMessage();
		}

		mysqli_close( $this->conn );
		return false;
	}

	private function arr2string( $sets=Array() ) {

		array_walk( $sets,
			function (&$v, $k) {
				$v = $k.':'.'"'.$v.'"';
			}
		);

		$arr_string = str_replace( ':', '=', implode( ', ' , $sets ) );
		// $arr_string = str_replace( ':', '=', http_build_query( $sets, null, ',' ) );
		return $arr_string;

	}

	/**
	* To get a new generated ID
	*
	* @param string $table
	* @param string $id_key, $prefix
	* @return string
	*/
	public function get_newid( $table="items", $id_key="", $prefix="FD" ) {

		try {
			$req = mysqli_query( $this->conn, "SELECT RIGHT( MAX( $id_key ), 3 ) max_val FROM $table WHERE $id_key LIKE '$prefix%'" );
			$this->rows = mysqli_fetch_array( $req );
			if ( mysqli_num_rows( $req ) > 0 ) {
				$inc_num = (int)$this->rows[0] + 1;
				$new_id = $prefix . "-00" . (string)$inc_num;
				return $new_id;
			} else {
				throw new Exception( mysqli_error( $this->conn ) );
			}

		} catch ( Exception $exception ) {
			echo "Error description: " . $exception->getMessage();
		}

		mysqli_close( $this->conn );
		return false;
	}

};
