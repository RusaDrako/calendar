# RusaDrako\\RD_Calendar
Календарь

## Подключение

Для подключения библиотеки к проекту подключите файл `src/autoload.php`

## Доступные классы

| Псевдоним | Полное имя класса |
| :---: | :--- |
| RD_Calendar | RusaDrako\\calendar\\calendar |
| RD_Calendar_Local | RusaDrako\\calendar\\localization\\_localization |


## Доступные объекты

| Объект | Описание | Получение |
| :---: | :--- | :--- |
| `calendar` | Общие настройки календаря и его фасад | ` $calendar = new \RD_Calendar();` |
| `month` | Класс для формирования объекта месяца | `$month = $calendar->getMonth($date);` |
| `week` | Класс для формирования объекта недели | `$week = $calendar->getWeek($date);` |
| `day` | Класс для формирования объекта дня | `$day = $calendar->getDay($date);` |
| `record` | Класс для формирования объекта записи | `$record = $calendar->getRecord();` |

- **$date** - дата, входящая в получаемый фиксированный период


## Начало работы

``` $calendar = new \RD_Calendar();```



## Локализация календаря

Подключение локализаций календаря

```php
	$calendar->setLocal($local);
```

- **$local** - объект, наследующий класс `RD_Calendar_Local`



## Объект record

Объект записи в календаре

| Метод | Описание |
| :--- | :--- |
| setDate($Y, $M, $D, $H = 0, $min = 0, $sec = 0) | Устанавливает дату и время записи |
| setRecord($data) | Устанавливает данные записи |


```php
	$record->setDate(2021, 5, 21, 13, 0, 0);
	$record->setRecord(123);
```


## getItemArr()

Возвращает массив подчинённых элементов объекта

| Объект | Тип элемента в массиве |
| :--- | :--- |
| day | record |
| week | day |
| month | week |

```php
	$records = $day->getItemArr();
```


## addRecord(record $item)

Пытается добавить объект `record` в соответствующую дату в календаре (ищет совпадение по $record->DATE)

Метод доступен в классах `day`, `week`, `month`, `calendar`


```php
	$week->addRecord(record $item);
```


## countRecord()

Возвращает кол-во записей `record` входящие в указанный период.

Метод доступен в классах `day`, `week`, `month`, `calendar`

```php
	$count = $month->countRecord(record $item);
```
