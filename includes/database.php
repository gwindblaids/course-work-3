<?php

/**
 * @Author: gwindblaids
 * @Date:   2018-03-29 16:25:07
 * @Last Modified by:   gwindblaids
 * @Last Modified time: 2018-04-16 18:15:54
 */
	class MyDatabase {
		public $db = '';
		public function __construct() {
			$this->db = new PDO("mysql:host=localhost;dbname=course_work;charset=utf8;", "root", "");
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
	$database = new MyDatabase;
