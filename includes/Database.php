<?php
namespace VIRGIN;
/**
 * @package     RomanNumerals
 * @author      Henry Sabiti
 */

class Database {
	private $_connection;
	private static $_instance; //The single instance
	private $_host 		= "localhost";
	private $_username 	= "db_user";
	private $_password 	= "db_pwd";
	private $_database 	= "db";

	const NO_DATA_AVAILABLE = 'NO Data Available, please Seed Database';
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	// Constructor
	private function __construct() {
		global $config;
		$this->_host 	 = $config['db_host'];
		$this->_username = $config['db_user'];
		$this->_password = $config['db_pwd'];
		$this->_database = $config['db'];

		$this->_connection = new \mysqli($this->_host, $this->_username,
			$this->_password, $this->_database);
	
		// Error handling
		if(mysqli_connect_error()) {
		    throw new \Exception("Database Connectivity Failed :- " . mysqli_connect_error());
		}
	}

	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }

	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
}