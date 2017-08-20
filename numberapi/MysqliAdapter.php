<?php
	namespace NumberApi;
	
	class MysqliAdapter extends StorageAdapter
	{
		
		/**
		 *  Implementation of StorageAdapter to work with MySQL databases using mysqli extension
		 *	Connection params are hardcoded as consts but why not as it is just a small test task.
		 */
		
		const DB_USER = "*";
		const DB_PASS = "*";
		const DB_NAME = "*";
		const DB_HOST = "localhost";
		
		/**
		 * @var \mysqli
		 */ 
		private $mysqli;

		public function __construct()
		{
			$this->mysqli = new \mysqli(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME);
			if ($this->mysqli->connect_errno) {
				throw new \Exception("Connection to database is failed");
			}
		}

		/**
		 * @param int $id
		 *
		 * @return array|null
		 */
		public function find(/*int*/ $id)
		{
			$dbResult = $this->mysqli->prepare('SELECT * FROM number WHERE id = ?');
			$dbResult->bind_param("s", $id);
			$dbResult->execute();
			$dbResult->bind_result($result['id'], $result['value']);
			$dbResult->fetch();
			
			if ($result == false) {
				return null;
			}
			else {
				return $result;
			}
		}
		/**
		 * @param int $value
		 *
		 * @return array|null
		 */
		public function save(/*int*/ $value) 
		{
			$dbResult = $this->mysqli->prepare('INSERT INTO number (value) VALUES (?)');  
			$dbResult->bind_param("s", $value);
			$dbResult->execute();
			if ($dbResult->errno != 0) {
				throw new \Exception('Cannot add data to database');
			}
			else {
				$result['id'] = $this->mysqli->insert_id;
				$result['value'] = $value;
				return $result;
			}
		}
	} 

	