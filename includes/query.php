<?php

/**
 * @Author: gwindblaids
 * @Date:   2018-03-29 18:17:48
 * @Last Modified by:   gwindblaids
 * @Last Modified time: 2018-04-03 18:45:02
 */
if (isset($_POST['query']) && !empty($_POST['query'])) {
		if (isset($_POST['select_table'])) {
			
			if ($_POST['select_table']=='sr') {

				echo "<br>Second query";
				$query = $database->setRequest("SELECT * FROM `users`");

?>
<table border="1px" class = "table_dark" align="center">
<?php
				$row = $query->fetch();
				$keys= array_keys($row);
				foreach ($keys as $key => $value) {
					if (!is_numeric($value)) echo "<th>" . $value . "</th>";
				}
				while ($row = $query->fetch(PDO::FETCH_LAZY)) {
					
					echo "<tr>";
					   	foreach ($row as $key => $value) {
					   		if ($key!='queryString')
					   		echo "<td>" . $value . "</td>";
					   	}
					echo "</tr>";
					}
			}	
			if ($_POST['select_table']=='fr') {
				echo "<br>First query";
				//$query = $database->setRequest("");
			}
		}
}
?>
</table>