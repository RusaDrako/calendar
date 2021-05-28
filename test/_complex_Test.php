<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../src/autoload.php');
//require_once(__DIR__ . '/mock/test_item.php');





/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class _complex_Test extends TestCase {
	/** */
	private $class_name = 'RusaDrako\calendar\calendar';
	private $date = '2021-05-01';
//	private $arr_data = ['id' => 99, 'data_1' => "data 1 - 99", 'data_2' => "data 2 - 99"];
//	private $token = '0123456789ABCDEF';
	/** Тестируемый объект */
//	private $_test_object = null;
	/** Тестируемый объект */
	private $_test_data_mock = null;



	/** Вызывается перед каждым запуском тестового метода */
	protected function setUp() : void {
		$class_name = $this->class_name;
		$this->_test_object = new $class_name();
	}



	/** Вызывается после каждого запуска тестового метода */
	protected function tearDown() : void {}



	/** Генератор заглушки элемента */
	public function get_record($date, $data) {
		$result = $this->_test_object->getRecord();
		$int_date = \strtotime($date);
		$result->setDate(
			(int) date('Y', $int_date),
			(int) date('m', $int_date),
			(int) date('d', $int_date),
			(int) date('H', $int_date),
			(int) date('i', $int_date),
			(int) date('s', $int_date)
		);
		$result->setRecord($data);
		return $result;
	}



	/** */
	public function test_record() {
		$result = $this->_test_object->getRecord();
		$result->setDate(2021, 5, 2, 13, 55, 56);
		$data = [1 => 234, 2=> 654];
		$result->setRecord($data);
		$this->assertIsObject($result, 'Проверка на объект');
		$this->assertTrue(\is_a($result, 'RusaDrako\calendar\record'), 'Класс элемента не найден');
		$this->assertEquals($result->DATE, '2021-05-02', 'Не совпадает значение');
		$this->assertEquals($result->TIME, '13:55:56', 'Не совпадает значение');
		$this->assertEquals($result->RECORD, $data, 'Не совпадает значение');
	}



	/** */
	public function test_day() {
		$result = $this->_test_object->getDay($this->date);
		$this->assertIsObject($result, 'Проверка на объект');
		$this->assertTrue(\is_a($result, 'RusaDrako\calendar\day'), 'Класс элемента не найден');
		$this->assertEquals($result->DATE, '2021-05-01', 'Не совпадает значение');
		$this->assertEquals($result->WEEKDAY, 6, 'Не совпадает значение');
		$this->assertEquals($result->NAME, 'суббота', 'Не совпадает значение');
		$this->assertEquals($result->NAME_SHORT, 'сб', 'Не совпадает значение');

		$this->assertEquals($result->countRecord(), 0, 'Не совпадает значение');
		for ($i=0; $i < 5; $i++) {
			$result->addRecord($this->get_record($this->date, $i));
		}
		$this->assertEquals($result->countRecord(), 5, 'Не совпадает значение');/**/

		$result_arr = $result->getItemArr();
		$this->assertTrue(\is_array($result_arr), 'Не массив');
		$this->assertEquals(\count($result_arr), 5, 'Не совпадает значение');

		for ($i=0; $i < 5; $i++) {
			$result->addRecord($this->get_record($this->date, $i));
		}
		$this->assertEquals($result->countRecord(), 10, 'Не совпадает значение');/**/

		$this->assertEquals($result->countRecord(), 10, 'Не совпадает значение');/**/
		$this->assertEquals($result->countRecord(), 10, 'Не совпадает значение');/**/

		$result_arr = $result->getItemArr();
		$this->assertTrue(\is_array($result_arr), 'Не массив');
		$this->assertEquals(\count($result_arr), 10, 'Не совпадает значение');
	}



	/** */
	public function test_day_2() {
		$result = $this->_test_object->getDay('2021-05-02');
		$this->assertIsObject($result, 'Проверка на объект');
		$this->assertTrue(\is_a($result, 'RusaDrako\calendar\day'), 'Класс элемента не найден');
		$this->assertEquals($result->DATE, '2021-05-02', 'Не совпадает значение');
		$this->assertEquals($result->WEEKDAY, 7, 'Не совпадает значение');
		$this->assertEquals($result->NAME, 'воскресенье', 'Не совпадает значение');
		$this->assertEquals($result->NAME_SHORT, 'вс', 'Не совпадает значение');
	}



	/** */
	public function test_week() {
		$result = $this->_test_object->getWeek($this->date);
		$this->assertIsObject($result, 'Проверка на объект');
		$this->assertTrue(\is_a($result, 'RusaDrako\calendar\week'), 'Класс элемента не найден');
		$this->assertEquals($result->DATE, '2021-05-01', 'Не совпадает значение');
		$result_arr = $result->getItemArr();
		$this->assertTrue(\is_array($result_arr), 'Не массив');
		$this->assertEquals(\count($result_arr), 7, 'Не совпадает значение');

		# Тест на добавление записей
		$this->assertEquals($result->countRecord(), 0, 'Не совпадает значение');
		for ($i=0; $i < 5; $i++) {
			$result->addRecord($this->get_record($this->date, $i));
		}
		$this->assertEquals($result->countRecord(), 5, 'Не совпадает значение');/**/

		for ($i=0; $i < 10; $i++) {
			$result->addRecord($this->get_record('2021-05-02', $i));
		}
		$this->assertEquals($result->countRecord(), 15, 'Не совпадает значение');/**/


		$result_day_arr = $result->getItemArr();

		$result_day = $result_day_arr[5];
		$this->assertTrue(\is_a($result_day, 'RusaDrako\calendar\day'), 'Класс элемента не найден');
		$this->assertEquals($result_day->DATE, '2021-05-01', 'Не совпадает значение');
		$result_arr = $result_day->getItemArr();
		$this->assertTrue(\is_array($result_arr), 'Не массив');
		$this->assertEquals(\count($result_arr), 5, 'Не совпадает значение');


		$result_day = $result_day_arr[6];
		$this->assertTrue(\is_a($result_day, 'RusaDrako\calendar\day'), 'Класс элемента не найден');
		$this->assertEquals($result_day->DATE, '2021-05-02', 'Не совпадает значение');
		$result_arr = $result_day->getItemArr();
		$this->assertTrue(\is_array($result_arr), 'Не массив');
		$this->assertEquals(\count($result_arr), 10, 'Не совпадает значение');

	}



	/** */
	public function test_month() {
		$result = $this->_test_object->getMonth($this->date);
		$this->assertIsObject($result, 'Проверка на объект');
		$this->assertTrue(\is_a($result, 'RusaDrako\calendar\month'), 'Класс элемента не найден');
		$this->assertEquals($result->DATE, $this->date, 'Не совпадает значение');
		$result_arr = $result->getItemArr();
		$this->assertTrue(\is_array($result_arr), 'Не массив');
		$this->assertEquals(\count($result_arr), 6, 'Не совпадает значение');

		# Тест на добавление записей
		$this->assertEquals($result->countRecord(), 0, 'Не совпадает значение');
		for ($i=0; $i < 5; $i++) {
			$result->addRecord($this->get_record($this->date, $i));
		}
		$this->assertEquals($result->countRecord(), 5, 'Не совпадает значение');/**/

		for ($i=0; $i < 7; $i++) {
			$result->addRecord($this->get_record('2021-05-02', $i));
		}
		$this->assertEquals($result->countRecord(), 12, 'Не совпадает значение');/**/

		$result_week_arr = $result->getItemArr();
		$result_week = $result_week_arr[0];
		$this->assertTrue(\is_a($result_week, 'RusaDrako\calendar\week'), 'Класс элемента не найден');
		$this->assertEquals($result_week->DATE, '2021-04-26', 'Не совпадает значение');

		$result_day_arr = $result_week->getItemArr();

		$result_day = $result_day_arr[5];
		$this->assertTrue(\is_a($result_day, 'RusaDrako\calendar\day'), 'Класс элемента не найден');
		$this->assertEquals($result_day->DATE, '2021-05-01', 'Не совпадает значение');
		$result_arr = $result_day->getItemArr();
		$this->assertTrue(\is_array($result_arr), 'Не массив');
		$this->assertEquals(\count($result_arr), 5, 'Не совпадает значение');


		$result_day = $result_day_arr[6];
		$this->assertTrue(\is_a($result_day, 'RusaDrako\calendar\day'), 'Класс элемента не найден');
		$this->assertEquals($result_day->DATE, '2021-05-02', 'Не совпадает значение');
		$result_arr = $result_day->getItemArr();
		$this->assertTrue(\is_array($result_arr), 'Не массив');
		$this->assertEquals(\count($result_arr), 7, 'Не совпадает значение');
	}



	/** */
	public function test_month_2() {
		$result = $this->_test_object->getMonth('2021-02-01');
		$this->assertIsObject($result, 'Проверка на объект');
		$this->assertTrue(\is_a($result, 'RusaDrako\calendar\month'), 'Класс элемента не найден');
		$this->assertEquals($result->DATE, '2021-02-01', 'Не совпадает значение');
		$result_arr = $result->getItemArr();
		$this->assertTrue(\is_array($result_arr), 'Не массив');
		$this->assertEquals(\count($result_arr), 4, 'Не совпадает значение');
	}



/**/
}
