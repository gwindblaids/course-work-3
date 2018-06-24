<?php header("Content-type: text/xml;charset=utf8;");

require "database.php";
// из-за структуры бд пришлось прибегнуть к методу подсчета дней активности для каждого пользователя
$begin_seans = $database->setRequest("SELECT `datetime_begin` as `begin`, `id` as `begin_id` FROM `users` WHERE `datetime_begin` LIKE '%" . strval($_GET['textRequest']) . "%'");

$end_seans = $database->setRequest("SELECT `datetime_end` as `end`, `id` as `end_id` FROM `users` WHERE `datetime_end` LIKE '%" . strval($_GET['textRequest']) . "%'");

while (($row_b = $begin_seans->fetch(PDO::FETCH_LAZY)) or ($row_e = $end_seans->fetch(PDO::FETCH_LAZY))) {
	
}

$period = new DatePeriod(
     new DateTime('2010-10-01'),
     new DateInterval('P1D'),
     new DateTime('2010-10-05')
);

// описание диаграммы в xml
echo "<chart caption='Статистика посещений за заданный месяц с разбивкой по дням' subcaption='" . strval($_GET['textRequest']) . "' xaxisname='День' yaxisname='Колличество клиентов' palettecolors='#008ee4' bgalpha='0' borderalpha='20' canvasborderalpha='0' theme='fint' useplotgradientcolor='0' plotborderalpha='10' placevaluesinside='1' rotatevalues='1' valuefontcolor='#ffffff' captionpadding='20' showaxislines='1' axislinealpha='25' divlinealpha='10'>";

foreach ($period as $key => $day->format("d") $count_users as $day_number => $value_day) {
	echo "<set label='".strval($day)."' value='".strval($value_day)."' />";
}
// конец диаграммы
echo "</chart>";
?>