<?php
namespace RusaDrako\calendar;

/**
 *
 */
class period_week extends _abstract {

	protected $_date_f;



	/** Специальный конструктор */
	public function __construct($arr_date, $obj) {
		$this->obj_calendar = $obj;
		$this->_date = date($this->obj_calendar->formatDate(), \strtotime($arr_date[0]));
		$this->_date_f = date($this->obj_calendar->formatDate(), \strtotime($arr_date[1]));
		$this->_setting();
	}



	/** */
	protected function _setting() {
		$int_date = \strtotime($this->_date);

		$weekday = date('w', $int_date);
		$weekday = $weekday ? $weekday : 7;
		$int_day = $int_date - ($weekday - 1) * 24 * 60 * 60;
		$int_last_day = \strtotime($this->_date_f);
		do {
			$_date = date($this->obj_calendar->formatDate(), $int_day);
			$this->_item[] = $this->obj_calendar->getWeek($_date);
			$int_day = $int_day + 7 * 24 * 60 * 60;
		} while ($int_day <= $int_last_day);
	}



/**/
}
