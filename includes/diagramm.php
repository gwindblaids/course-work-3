<?php
if ($_POST['change']=='cd' && !empty($_POST['query'])) {
require 'database.php';
$query = $database->setRequest("SELECT * FROM `users`");
while ($row = $query->fetch(PDO::FETCH_LAZY)) {
 	foreach ($row as $key => $value) {
 		
   	}
}

}
?>