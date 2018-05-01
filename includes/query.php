<?php
/**
 * @Author: gwindblaids
 * @Date:   2018-03-29 18:17:48
 * @Last Modified by:   gwindblaids
 * @Last Modified time: 2018-04-09 22:17:12
 */
if (isset($_POST['query']) && !empty($_POST['query']) && isset($_POST['select_table'])) {
	echo "<br>";
			if ($_POST['select_table']=='fr') {
				$query = $database->setRequest("SELECT COUNT(*) AS `COUNT`, cast(`datetime_begin` AS time) AS `begin`, cast(`datetime_end` AS time) AS `end` FROM `users` WHERE cast(`datetime_end` AS date)='" .$_POST['query'] . "' OR cast(`datetime_begin` AS date)='".$_POST['query'] ."' GROUP BY `datetime_begin`, `datetime_end` HAVING COUNT(*) > 1 ORDER BY `COUNT` LIMIT 1");
				if ($query->rowCount()>0) {
					echo "<span class=\"description_query\">Максимальное кол-во клиентов на дату " . $_POST['query'] . "</span>";
				echo '<table border="1px" class = "table_dark" align="center">';
				echo "<tr><th>Кол-во клиентов</th><th>Время начала сеанса</th><th>Время конца сеанса</th></tr>";
				while ($row = $query->fetch(PDO::FETCH_LAZY)) {
					
					echo "<tr>";
					   	foreach ($row as $key => $value) {
					   		if ($key!='queryString')
					   		echo "<td>" . $value . "</td>";
					   	}
					echo "</tr>";
					}
                    // todo сделать коммит
					echo '</table>';
				} else echo "<span class=\"description_query\">К сожалению по вашему запросу  максимальное кол-во клиентов 1.</span>";
			}
			if ($_POST['select_table']=='sr') {
				$query = $database->setRequest("SELECT full_name_operator, adress, phone FROM receipt WHERE number_shifts=" . $_POST['query']);
				if ($query->rowCount()>0) {
				echo "<span class=\"description_query\">Данные операторов с номером смены " . $_POST['query'] . "</span>";
				echo '<table border="1px" class = "table_dark" align="center">';
				echo "<tr><th>ФИО</th> <th>Адрес</th><th>Телефон</th></tr>";
				while ($row = $query->fetch(PDO::FETCH_LAZY)) {
					echo "<tr>";
					   	foreach ($row as $key => $value) {
					   		if ($key!='queryString')
					   		echo "<td>" . $value . "</td>";
					   	}
					echo "</tr>";
					}
					echo '</table>';
				} else echo "<span class=\"description_query\">К сожалению по вашему запросу ничего не найдено.</span>";
			}
			if ($_POST['select_table']=='cd') {
                header("Location: includes/diagram.php?query=" . strval($_POST['query']));
			}
}