<?php
namespace RusaDrako\calendar;

/**
 *
 */
class day extends _abstract {

	protected $_int_date = null;

	/** */
	public function __construct($date, $obj) {
		parent::__construct($date, $obj);
		$this->_int_date = strtotime($date);
	}



	/** */
	protected function _setting() {}



	/** Подготовка данных к var_dump() и серилизации JSON (JsonSerializable)
	 * @param array $arr Исходный массив для вывода
	 */
	protected function __preparationData($arr) {
		$arr['DATE'] = null;
		$arr['WEEKDAY'] = $this->WEEKDAY;
		$arr['NAME'] = $this->NAME;
		$arr['NAME_SHORT'] = $this->NAME_SHORT;
		$arr = parent::__preparationData($arr);
		return $arr;
	}



	/** */
	public function __get($name) {
		switch ($name) {
			case 'WEEKDAY':
				$w = date('w', $this->_int_date);
				return $w;
				break;
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



	/** Возвращает имя дня */
	public function getName() {
		return $this->obj_calendar->getLocal()->getWeekDayName((int) $this->WEEKDAY);
	}



	/** Возвращает короткое имя дня */
	public function getNameShort() {
		return $this->obj_calendar->getLocal()->getWeekDayNameShort((int) $this->WEEKDAY);
	}



	/** */
	public function addRecord(record $record) {
		if ($record->DATE == $this->_date) {
			$this->_record[] = $record;
			return true;
		};
		return false;
	}



	/** */
	public function countRecord() {
		return count($this->_record);
	}



/**/
}
