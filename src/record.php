<?php
namespace RusaDrako\calendar;

/**
 *
 */
class record {

	protected $_date = null;
	protected $_time = null;
	protected $_record = null;

	protected $obj_calendar = null;



	/** */
	public function __construct($obj) {
		$this->obj_calendar = $obj;
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
		$arr['TIME'] = $this->_time;
		$arr['RECORD'] = $this->_record;
		return $arr;
	}



	/** */
	public function __get($name) {
		switch ($name) {
			case 'DATE':
				return $this->_date;
				break;
			case 'TIME':
				return $this->_time;
				break;
			case 'RECORD':
				return $this->_record;
				break;
		}
		throw new \Exception("Отсутствует свойство " . get_called_class() . "->{$name}", 1);
	}



	/** */
	public function setDate($Y, $M, $D, $H = 0, $min = 0) {
		$int_date      = strtotime("{$Y}-{$M}-{$D} {$H}:{$min}");
		$this->_date   = date($this->obj_calendar->formatDate(), $int_date);
		$this->_time   = date('H:i', $int_date);
	}



	/** */
	public function setRecord($data) {
		$this->_record = $data;
	}



/**/
}
