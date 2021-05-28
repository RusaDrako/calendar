<?php
namespace RusaDrako\calendar;

/**
 *
 */
class calendar {

	private $_obj_local = null;
	private $_arr_days = [];


	/** */
	public function __construct() {
		$this->setLocal(new localization\ru());
	}


	/** */
	public function setLocal(localization\_localization $obj) {
		$this->_obj_local = $obj;
	}



	/** */
	public function getLocal() {
		return $this->_obj_local;
	}



	/** Возвращает формат даты */
	public function formatDate() {
		return $this->_obj_local->formatDate();
	}



	/** Возвращает объект месяца */
	public function getPeriodWeek($date_start, $date_finish) {
		$obj = new period_week([$date_start, $date_finish], $this);
		return $obj;
	}



	/** Возвращает объект месяца */
	public function getMonth($date) {
		$obj = new month($date, $this);
		return $obj;
	}



	/** Возвращает объект недели */
	public function getWeek($date) {
		$obj = new week($date, $this);
		return $obj;
	}



	/** Возвращает объект дня */
	public function getDay($date) {
		$date = date($this->formatDate(), \strtotime($date));
		if (!isset($this->_arr_days[$date])) {
			$this->_arr_days[$date] = new day($date, $this);
		}
		return $this->_arr_days[$date];
	}



	/** Возвращает объект дня */
	public function getRecord() {
		$obj = new record($this);
		return $obj;
	}



	/** Возвращает объект дня */
	public function addRecord($record) {
		if (isset($this->_arr_days[$record->DATE])) {
			return $this->_arr_days[$record->DATE]->addRecord($record);
		}
		return false;
	}



	/** Возвращает количество событий */
	public function countRecord() {
		$count = 0;
		foreach ($this->_arr_days as $v) {
			$count += $v->countRecord();
		}
		return $count;
	}



/**/
}
