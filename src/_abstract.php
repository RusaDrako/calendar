<?php
namespace RusaDrako\calendar;

/**
 *
 */
abstract class _abstract {

	protected $_date = null;
	protected $_item = [];

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
		$arr['ITEM'] = $this->_item;
		return $arr;
	}



	/** */
	public function __get($name) {
		switch ($name) {
			case 'DATE':
				return $this->_date;
				break;
			case 'ITEM':
				return $this->_item;
				break;
		}
		throw new \Exception("Отсутствует свойство " . get_called_class() . "->{$name}", 1);
	}



	/** */
	public function getItemArr() {
		return $this->_item;
	}



	/** */
	public function addRecord(record $item) {
		return $this->obj_calendar->addRecord($item);
	}



	/** */
	public function countRecord() {
		$count = 0;
		foreach ($this->_item as $v) {
			$count += $v->countRecord();
		}
		return $count;
	}



	/** */
	abstract protected function _setting();



/**/
}
