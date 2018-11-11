<?php
/**
 * Документация: https://dev.1c-bitrix.ru/rest_help/crm/cdeals/index.php
 */
namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Deal extends Bitrix
{
    /**
     * Создаёт новую сделку.
     *
     * @param array $fields - Набор полей - массив вида array("поле"=>"значение"[, ...]),
     * содержащий значения полей сделки.
     *
     * @param bool $event - Набор параметров. REGISTER_SONET_EVENT - произвести регистрацию события
     * добавления сделки в живой ленте. Дополнительно будет отправлено уведомление ответственному
     * за сделку.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealAdd(array $fields, bool $event = true)
    {
        $action = 'crm.deal.add.json';
        $data['fields'] = $fields;
        if($event){
            $event = 'Y';
        } else {
            $event = 'N';
        }
        $data['PARAMS'] = ['REGISTER_SONET_EVENT' => $event];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Добавляет контакт к указанной сделке.
     *
     * @param int $id - Идентификатор сделки.
     * @param array $fields - Объект со следующими полями:
     *     CONTACT_ID - идентификатор контакта (обязательное поле)
     *     SORT - индекс сортировки
     *     IS_PRIMARY - флаг первичного контакта
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealContactAdd(int $id,array $fields)
    {
        $action = 'crm.deal.contact.add.json';
        $data['id'] = $id;
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Удаляет контакт из указанной сделки.
     *
     * @param int $id - ID сделки
     * @param int $contactId - ID контакта
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealContactDelete(int $id, int $contactId)
    {
        $action = 'crm.deal.contact.delete.json';
        $data['id'] = $id;
        $data['fields']['CONTACT_ID'] = $contactId;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает для связи сделка-контакт описание полей, используемых методами семейства
     * crm.deal.contact.*, то есть crm.deal.contact.items.get, crm.deal.contact.items.set,
     * crm.deal.contact.add и т.д.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealContactFields()
    {
        $action = 'crm.deal.contact.fields.json';
        $data['fields'] = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Очищает набор контактов, связанных с указанной сделкой.
     *
     * @param int $id - ID сделки
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealContactItemsDelete(int $id)
    {
        $action = 'crm.deal.contact.items.delete.json';
        $data['id'] = $id;
        $data['fields'] = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает набор контактов, связанных с указанной сделкой.
     *
     * @param int $id - ID сделки
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealContactItemsGet(int $id)
    {
        $action = 'crm.deal.contact.items.get.json';
        $data['id'] = $id;
        $data['fields'] = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Устанавливает набор контактов, связанных с указанной сделкой.
     *
     * @param int $id - ID сделки
     * @param array $items - Набор контактов в виде массива объектов со следующими полями:
     *     CONTACT_ID - идентификатор контакта (обязательное поле)
     *     SORT - индекс сортировки
     *     IS_PRIMARY - флаг первичного контакта
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealContactItemsSet(int $id, array $items)
    {
        $action = 'crm.deal.contact.items.set.json';
        $data['id'] = $id;
        $data['items'] = $items;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Удаляет сделку и все связанные с ней объекты.
     *
     * @param int $id - ID сделки
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealDelete(int $id)
    {
        $action = 'crm.deal.delete.json';
        $data['id'] = $id;
        $data['fields'] = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает описание полей сделки, в том числе пользовательских.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealFields()
    {
        $action = 'crm.deal.fields.json';
        $data['fields'] = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает сделку по идентификатору.
     *
     * @param int $id - ID сделки
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealGet(int $id)
    {
        $action = 'crm.deal.get.json';
        $data['id'] = $id;
        $data['fields'] = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает список сделок по фильтру. Является реализацией списочного метода для сделок.
     *
     * При выборке используйте маски:
     *     "*" - для выборки всех полей (без пользовательских и множественных)
     *     "UF_*"- для выборки всех пользовательских полей (без множественных)
     * @param array $order -
     * @param array $filter
     * @param array $select
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealList(array $order, array $filter, array $select, int $next = 0)
    {
        $action = 'crm.deal.list.json';
        $data['order'] = $order;
        $data['filter'] = $filter;
        $data['select'] = $select;
        $data['start'] = $next;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает товарные позиции сделки.
     *
     * @param int $id - ID сделки
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealProductrowsGet(int $id)
    {
        $action = 'crm.deal.productrows.get.json';
        $data['id'] = $id;
        $data['fields'] = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Устанавливает (создаёт или обновляет) товарные позиции сделки.
     *
     * @param int $id - ID сделки
     * @param array $rows - Товарные позиции - массив вида
     * array(array("поле"=>"значение"[, ...])[, ...]), где "поле" может принимать значения
     * из возвращаемых методом crm.productrow.fields.
     * Товарные позиции сделки, существующие до момента вызова метода, будут заменены новыми.
     * После сохранения будет произведён пересчёт суммы сделки.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealProductrowSet(int $id, array $rows)
    {
        $action = 'crm.deal.productrows.set.json';
        $data['id'] = $id;
        $data['rows'] = $rows;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Обновляет существующую сделку.
     *
     * @param int $id - ID сделки
     * @param array $fields - Набор полей - массив вида array("обновляемое поле"=>"значение"[, ...]),
     * где "обновляемое поле" может принимать значения из возвращаемых методом crm.deal.fields.
     * @param bool $event - Набор параметров. REGISTER_SONET_EVENT - произвести регистрацию события изменения сделки
     * в живой ленте. Дополнительно будет отправлено уведомление ответственному за сделку.
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealUpdate(int $id, array $fields, bool $event)
    {
        $action = 'crm.deal.update.json';
        $data['id'] = $id;
        $data['fields'] = $fields;
        if($event){
            $event = 'Y';
        } else {
            $event = 'N';
        }
        $data['PARAMS'] = ['REGISTER_SONET_EVENT' => $event];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Создаёт новое пользовательское поле для сделок.
     * Системное ограничение на название поля - 20 знаков.
     * К названию пользовательского поля всегда добавляется префикс UF_CRM_,
     * то есть реальная длина названия - 13 знаков.
     *
     * @param array $fields - Набор полей - массив вида array("поле"=>"значение"[, ...]),
     * содержащий описание пользовательского поля.
     * fields:
     *    {
     *    "FIELD_NAME": "MY_STRING",
     *    "EDIT_FORM_LABEL": "Моя строка",
     *    "LIST_COLUMN_LABEL": "Моя строка",
     *    "USER_TYPE_ID": "string",
     *    "XML_ID": "MY_STRING",
     *    "SETTINGS": { "DEFAULT_VALUE": "Привет, мир!" }
     *    }
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealUserfieldAdd(array  $fields)
    {
        $action = 'crm.deal.userfield.add.json';
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }


    /**
     * Возвращает пользовательское поле сделок по идентификатору.
     *
     * @param int $id - ID сделки
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealUserfieldGet(int $id)
    {
        $action = 'crm.deal.userfield.get.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает список пользовательских полей сделок по фильтру.
     *
     * @param array $order - Поля сортировки.
     * @param array $filter - Поля фильтра.
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealUserfieldList(array $order, array $filter)
    {
        $action = 'crm.deal.userfield.list.json';
        $data['order'] = $order;
        $data['filter'] = $filter;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Обновляет существующее пользовательское поле сделок.
     *
     * @param int $id - ID сделки
     * @param array $fields - Набор полей - массив вида array("обновляемое поле"=>"значение"[, ...]), где "обновляемое поле"
     * может принимать значения из возвращаемых методом crm.userfield.fields.
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealUserfieldUpdate(int $id, array $fields)
    {
        $action = 'crm.deal.userfield.update.json';
        $data['id'] = $id;
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Удаляет пользовательское поле сделок.
     *
     * @param int $id - ID поля
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function dealUserfieldDelete(int $id)
    {
        $action = 'crm.deal.userfield.delete.json';
        $data['id'] = $id;
        $data['fields'] = [];

        $res = $this->send($data,$action);

        return $res;
    }
}