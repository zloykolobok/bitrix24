# Пакет для работы с Bitrix24 через webhook
## Установка
С помощью composer: <br />
```php
composer require 'zloykolobok/bitrix24'
```
## Пример использования
### Пример 1
Мы хотим получить создать новый Лид:
```php
$oBitrix = new \Zloykolobok\Bitrix24\Classes\Lead();
$oBitrix->setUrl($url);
$oBitrix->setTimeout($timeout);

$fields = [
    'TITLE' => 'Новый лид',
    'NAME' => 'Роман',
    'LAST_NAME' => 'Николаенков',
    'EMAIL' => ['VALUE' => 'rnikolaenkv@yandex.ru', 'VALUE_TYPE' => 'WORK'],
];
```
где:
 * $url - адрес на вебхук, созданный в битрикс24
 * $timeout - время в секундах на выполнение запроса
 * $fields - массив полей для лида <br />
и отправляем запрос:
```php
$res = $oBitrix->leadAdd($fields);
```
Если все хорошо, то в ответе мы получим ID только, что созданного Лида
### Пример 2
Мы хотим получить Лида по его ID
```php
$oBitrix = new \Zloykolobok\Bitrix24\Classes\Lead();
$oBitrix->setUrl($url);
$oBitrix->setTimeout($timeout);
$res = $oBitrix->leadGet($id);
```
где:
 * $url - адрес на вебхук, созданный в битрикс24
 * $timeout - время в секундах на выполнение запроса
 * $id - ID лида <br />
И в ответ мы получим список значений полей для лида
## Поддерживаемые запросы
 * Activity - для работы с делами
 * Company - для работы с компаниями
 * Deal - для работы с сделками
 * Disk - для работы с файлами
 * Lead - для работы с лидами
 * Livefeedmessage - для работы с лентой CRM
 * Product - для работы с товарами
 * Status - для работы со справочниками
 * User - для работы с пользователями
Все методы в классах с комментариями.
(по мере возможности буду добавлять запросы)
## Документация по REST Битрикс24
https://dev.1c-bitrix.ru/rest_help/
## Связаться с автором
 * Email: rnikolaenkov@yandex.ru
 * Блог: https://web-programming.com.ua
