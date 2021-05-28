<?php
namespace RusaDrako\calendar;

/**
 *
 */
class week extends _abstract {

	/** */
	protected function _setting() {
		$int_date = \strtotime($this->_date);
		$weekday = date('w', $int_date);
		$weekday = $weekday ? $weekday : 7;
		$int_first_day = $int_date - ($weekday - 1) * 24*60*60;
		for ($i=0; $i < 7; $i++) {
			$this->_item[] = $this->obj_calendar->getDay(date($this->obj_calendar->formatDate(), $int_first_day + $i * 24 * 60 * 60));
		}
	}



/**/
}
