<?php

/**
 * @Author: gwindblaids
 * @Date:   2018-03-29 18:17:48
 * @Last Modified by:   gwindblaids
 * @Last Modified time: 2018-04-09 22:17:12
 */
if (isset($_POST['query']) && !empty($_POST['query']) && isset($_POST['select_table'])) {
			//fr
			if ($_POST['select_table']=='fr') {

				echo "<br>First query";
				$query = $database->setRequest("SELECT COUNT(*) AS `COUNT`, cast(`datetime_begin` AS time) AS `begin`, cast(`datetime_end` AS time) AS `end` FROM `users` WHERE cast(`datetime_end` AS date)='" .$_POST['query'] . "' OR cast(`datetime_begin` AS date)='".$_POST['query'] ."' GROUP BY `datetime_begin`, `datetime_end` HAVING COUNT(*) > 1 ORDER BY `COUNT` LIMIT 1");

?>
<table border="1px" class = "table_dark" align="center">
<?php
				echo "<th>Кол-во клиентов</th><th>Время начала сеанса</th><th>Время конца сеанса</th>";
				while ($row = $query->fetch(PDO::FETCH_LAZY)) {
					
					echo "<tr>";
					   	foreach ($row as $key => $value) {
					   		if ($key!='queryString')
					   		echo "<td>" . $value . "</td>";
					   	}
					echo "</tr>";
					}
			}

			if ($_POST['select_table']=='sr') {
				echo "<br><center>Данные операторов с номером смены " . $_POST['query'] . "</center><br>";
				$query = $database->setRequest("SELECT full_name_operator, adress, phone FROM receipt WHERE number_shifts=" . $_POST['query']);
?>
<table border="1px" class = "table_dark" align="center">
<?php
				
				echo "<th>ФИО</th> <th>Адрес</th><th>Телефон</th>";
				while ($row = $query->fetch(PDO::FETCH_LAZY)) {
					
					echo "<tr>";
					   	foreach ($row as $key => $value) {
					   		if ($key!='queryString')
					   		echo "<td>" . $value . "</td>";
					   	}
					echo "</tr>";
					}
			}



			
			if ($_POST['select_table']=='cd') {
				echo "<br>Create diagramm query";
				//$query = $database->setRequest("");
			}
}
?>
</table>