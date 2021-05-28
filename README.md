# RusaDrako\\RD_Calendar
Календарь

## Подключение

Для подключения библиотеки к проекту подключите файл `src/autoload.php`

## Начало работы

```php
	$calendar = new \RD_Calendar();
```

## Псевдонимы классов

| Псевдоним | Полное имя класса |
| :--- | :--- |
| **RD_Calendar** | RusaDrako\\calendar\\calendar |
| **RD_Calendar_Local** | RusaDrako\\calendar\\localization\\_localization |


## Используемые классы

| Класс | Описание | Получение |
| :--- | :--- | :--- |
| `calendar` | Класс календаря. Общие настройки. Методы формирования объектов. | ` $calendar = new \RD_Calendar();` |
| `month` | Класс для формирования объекта месяца | `$month = $calendar->getMonth($date);` |
| `week` | Класс для формирования объекта недели | `$week = $calendar->getWeek($date);` |
| `day` | Класс для формирования объекта дня | `$day = $calendar->getDay($date);` |
| `record` | Класс для формирования объекта записи | `$record = $calendar->getRecord();` |
| `localization` | Класс локализации календаря (язык, формат) | `$local = new RD_Calendar_Local();` |

- **$date** - дата, входящая в получаемый фиксированный период


## Локализация календаря

Подключение локализаций календаря

```php
	$calendar->setLocal($local);
```

- **$local** - объект, наследующий класс `RD_Calendar_Local`



## Класс `record`

Класс записи в календаре

| Метод | Описание |
| :--- | :--- |
| setDate($Y, $M, $D, $H = 0, $min = 0, $sec = 0) | Устанавливает дату и время записи |
| setRecord($data) | Устанавливает данные записи |


```php
	$record->setDate(2021, 5, 21, 13, 0, 0);
	$record->setRecord(123);
```


## Метод getItemArr()

Возвращает массив подчинённых элементов объекта

| Объект | Тип элемента в массиве |
| :--- | :--- |
| day | record |
| week | day |
| month | week |

```php
	$days = $week->getItemArr();
	$records = $day->getItemArr();
```


## Метод addRecord(record $item)

Пытается добавить объект `record` в соответствующую дату в календаре (ищет совпадение по $record->DATE)

Метод доступен в классах `day`, `week`, `month`, `calendar`


```php
	$week->addRecord(record $record);
```


## Метод countRecord()

Возвращает кол-во записей `record` входящие в указанный период.

Метод доступен в классах `day`, `week`, `month`, `calendar`

```php
	$count = $month->countRecord();
```
