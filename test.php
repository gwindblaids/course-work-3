<?php $period = new DatePeriod(
     new DateTime('2010-10-01'),
     new DateInterval('P1D'),
     new DateTime('2010-10-05')
);
foreach ($period as $key => $day $count_users as $day_number => $value_days) {
	$value_day = $value_day->format("d");
	echo "<set label='".strval($value_day)."' value='2' />";
}


?>