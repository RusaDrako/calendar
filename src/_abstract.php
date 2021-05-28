<?php
namespace RusaDrako\calendar;

/**
 *
 */
abstract class _abstract {

	protected $_date = null;
	protected $_record = [];

	protected $obj_calendar = null;



	/** */
	public function __construct($date, $obj) {
		$this->obj_calendar = $obj;
		$this->_date = date($this->obj_calendar->formatDate(), \strtotime($date));
		$this->_setting();
	}



	/** Подготовка данных к var_dump() */
	public function __debugInfo() {
		$arr = $this->__preparationData([]);
		return $arr;
	}



	/** Подготовка данных к серилизации JSON (JsonSerializable) */
	public function jsonSerialize() {
		$arr = $this->__preparationData([]);
		return $arr;
	}



	/** Подготовка данных к var_dump() и серилизации JSON (JsonSerializable)
	 * @param array $arr Исходный массив для вывода
	 */
	protected function __preparationData($arr) {
		$arr['DATE'] = $this->_date;
		$arr['RECORDS'] = $this->_record;
		return $arr;
	}



	/** */
	public function __get($name) {
		switch ($name) {
			case 'DATE':
				return $this->_date;
				break;
			case 'RECORD':
				return $this->_record;
				break;
		}
		throw new \Exception("Отсутствует свойство " . get_called_class() . "->{$name}", 1);
	}



	/** */
	public function getArr() {
		return $this->_record;
	}



	/** */
	public function addRecord(record $record) {
		return $this->obj_calendar->addRecord($record);
	}



	/** */
	public function countRecord() {
		$count = 0;
		foreach ($this->_record as $v) {
			$count += $v->countRecord();
		}
		return $count;
	}



	/** */
	abstract protected function _setting();



/**/
}
