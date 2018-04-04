<?php

/**
 * @Author: gwindblaids
 * @Date:   2018-03-29 16:25:07
 * @Last Modified by:   gwindblaids
 * @Last Modified time: 2018-03-29 19:46:34
 */
	class Database {
		public $db = '';
		public function __construct() {
			$this->db = new PDO("mysql:host=localhost;dbname=course_work;", "gwindblaids", "GwindblaidsEdik9344");
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

	}
	$database = new Database;
 ?>