<?php header('Content-Type: text/html; charset=utf-8');

require 'database.php';

$count = 0;
//work 100%
if($_GET['search_tip'] == 'title' && $_GET['search_by']=='fr') {   //Тип поиска - таких может быть бесконечно много - передается с autocomplete

	$query_new = $database->setRequest("SELECT cast(`datetime_end` AS date) AS `full_date` FROM `users`  WHERE cast(`datetime_end` AS date ) LIKE '%" . strval($_GET['term']) . "%'
	UNION
	SELECT cast(`datetime_begin` AS date) AS `full_date` FROM `users` WHERE cast(`datetime_begin` AS date) LIKE '%" . strval($_GET['term']) . "%'");
	while ($podrow = $query_new->fetch(PDO::FETCH_LAZY)) {
	//формируем ассоциативный массив результата поиска
	$return_arr[] = array(
	'value' => $podrow['full_date']);
	$count++;
	}
	if ($count == 0) $return_arr[0] = array('value' => 'По вашему запросу ничего не найдено');
		echo json_encode($return_arr, JSON_UNESCAPED_UNICODE);     //возвращает результаты поиска скрипту
} 
elseif
//work 100%
($_GET['search_tip'] == 'title' && $_GET['search_by']=='sr') {   //Тип поиска - таких может быть бесконечно много - передается с autocomplete
	$query_new = $database->setRequest("SELECT DISTINCT `number_shifts` FROM `receipt` WHERE `number_shifts` LIKE '" . strval($_GET['term']) . "%' ORDER BY `number_shifts` LIMIT 100");
	while ($podrow = $query_new->fetch(PDO::FETCH_LAZY))    {
	//формируем ассоциативный массив результата поиска
	$return_arr[] = array(
	'value' => $podrow['number_shifts']);
	$count++;
	}
	if ($count == 0) $return_arr[0] = array('value' => 'По вашему запросу ничего не найдено');
		echo json_encode($return_arr, JSON_UNESCAPED_UNICODE);     //возвращает результаты поиска скрипту
} 
elseif //work 100%
($_GET['search_tip'] == 'title' && $_GET['search_by']=='cd') {   //Тип поиска - таких может быть бесконечно много - передается с autocomplete
	$query_new = $database->setRequest("SELECT month(`datetime_begin`) AS `month` FROM `users` WHERE month(`datetime_begin`) LIKE '%" . strval($_GET['term']) . "%' UNION SELECT month(`datetime_end`) AS `month` FROM `users` WHERE month(`datetime_end`) LIKE '%" . strval($_GET['term']) . "%'");
	while ($podrow = $query_new->fetch(PDO::FETCH_LAZY))    {
	//формируем ассоциативный массив результата поиска
	$return_arr[] = array(
	'value' => $podrow['month']);
	$count++;
	}
	if ($count == 0) $return_arr[0] = array('value' => 'По вашему запросу ничего не найдено');
		echo json_encode($return_arr, JSON_UNESCAPED_UNICODE); //возвращает результаты поиска скрипту
}
?>