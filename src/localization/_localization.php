<?php
namespace RusaDrako\calendar\localization;

/**
 *
 */
class _localization {

	protected $format_date = 'Y-m-d';

	/** */
	public function formatDate() {
		return $this->format_date;
	}



	protected $week_day_name = [
		'1' => 'понедельник',
		'2' => 'вторник',
		'3' => 'среда',
		'4' => 'четверг',
		'5' => 'пятница',
		'6' => 'суббота',
		'7' => 'воскресенье',
	];

	/** */
	public function getArrayWeekDayName() {
		return $this->week_day_name;
	}

	/** */
	public function getWeekDayName(int $num) {
		if ($num == 0) { $num = 7;}
		return $this->week_day_name[$num];
	}



	protected $week_day_name_shrot = [
		1 => 'пн',
		2 => 'вт',
		3 => 'ср',
		4 => 'чт',
		5 => 'пт',
		6 => 'сб',
		7 => 'вс',
	];

	/** */
	public function getArrayWeekDayNameShort() {
		return $this->week_day_name_shrot;
	}

	/** */
	public function getWeekDayNameShort(int $num) {
		if ($num == 0) { $num = 7;}
		return $this->week_day_name_shrot[$num];
	}



	protected $month_name = [
		1 => 'январь',
		2 => 'февраль',
		3 => 'март',
		4 => 'апрель',
		5 => 'май',
		6 => 'июнь',
		7 => 'июль',
		8 => 'август',
		9 => 'сентябрь',
		10 => 'октябрь',
		11 => 'ноябрь',
		12 => 'декабрь',
	];

	/** */
	public function getArrayMonthName() {
		return $this->month_name;
	}

	/** */
	public function getMonthName(int $num) {
		return $this->month_name[$num];
	}



	protected $month_name_short = [
		1 => 'янв',
		2 => 'фев',
		3 => 'мар',
		4 => 'апр',
		5 => 'май',
		6 => 'июн',
		7 => 'июл',
		8 => 'авг',
		9 => 'сен',
		10 => 'окт',
		11 => 'ноя',
		12 => 'дек',
	];

	/** */
	public function getArrayMonthNameShort() {
		return $this->month_name_short;
	}

	/** */
	public function getMonthNameShort(int $num) {
		return $this->month_name_short[$num];
	}



/**/
}
