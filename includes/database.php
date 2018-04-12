<?php

/**
 * @Author: gwindblaids
 * @Date:   2018-03-29 16:25:07
 * @Last Modified by:   gwindblaids
 * @Last Modified time: 2018-04-12 12:25:54
 */
	class Database {
		public $db = '';
		public function __construct() {
			$this->db = new PDO("mysql:host=localhost;dbname=course_work;charset=utf8;", "gwindblaids", "GwindblaidsEdik9344");
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			

		}
		public function setRequest ($request) {
			try {
			$query = $this->db->query($request);
			return $query;
			} catch (PDOException $e) {
				echo $e->getMessage();
				$this->db->closeCursor();
			}
		}

		function __destruct() {
			$this->db=null;
		}
	}
	$database = new Database;
 ?>