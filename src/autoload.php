<?php

namespace RusaDrako\calendar;


$arr_load = [
	'_abstract.php',
	'calendar.php',
//	'year.php',
	'period_week.php',
	'month.php',
	'week.php',
	'day.php',
	'record.php',
	'localization\_localization.php',
	'localization\ru.php',
];


foreach($arr_load as $k => $v) {
//	echo __DIR__ . '/' . $v;
//	echo '<hr>';
	require_once(__DIR__ . '/' . $v);
}


require_once('aliases.php');
