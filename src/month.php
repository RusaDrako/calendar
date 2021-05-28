<?php
namespace RusaDrako\calendar;

/**
 *
 */
class month extends _abstract {

	/** Подготовка данных к var_dump() и серилизации JSON (JsonSerializable)
	 * @param array $arr Исходный массив для вывода
	 */
	protected function __preparationData($arr) {
		$arr['DATE'] = null;
		$arr['NAME'] = $this->NAME;
		$arr['NAME_SHORT'] = $this->NAME_SHORT;
		$arr = parent::__preparationData($arr);
		return $arr;
	}



	/** */
	public function __get($name) {
		switch ($name) {
			case 'NAME':
				$w = $this->getName();
				return $w;
				break;
			case 'NAME_SHORT':
				$w = $this->getNameShort();
				return $w;
				break;
		}
		return parent::__get($name);
	}



	/** Возвращает имя месяца */
	public function getName() {
		return $this->obj_calendar->getLocal()->getMonthName((int) date('m', \strtotime($this->_date)));
	}



	/** Возвращает короткое имя месяца */
	public function getNameShort() {
		return $this->obj_calendar->getLocal()->getMonthNameShort((int) date('m', \strtotime($this->_date)));
	}



	/** */
	protected function _setting() {
		$int_date = \strtotime($this->_date);
		$first_day = date('Y-m-01', $int_date);
		$month = date('m', $int_date);
		$int_first_day = \strtotime($first_day);
		$weekday = date('w', $int_date);
		$int_day = $int_first_day - ($weekday - 1) * 24  * 60 * 60;
		do {
			$_date = date($this->obj_calendar->formatDate(), $int_day);
			$this->_record[] = $this->obj_calendar->getWeek($_date);
			$int_day = $int_day + 7 * 24 * 60 * 60;
		} while (date('m', $int_day) == $month);
	}



/**/
}
