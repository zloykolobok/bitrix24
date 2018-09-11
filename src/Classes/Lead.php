<?php

namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Lead extends Bitrix
{
    /**
     * Возвращает список лидов по фильтру. Является реализацией списочного метода для лидов.
     * При выборке используйте маски:
     * "*" - для выборки всех полей (без пользовательских и множественных)
     * "UF_*"- для выборки всех пользовательских полей (без множественных)
     * Маски для выборки множественных полей нет.
     * Для выборки множественных полей укажите нужные в списке выбора ("PHONE", "EMAIL" и так далее).
     *
     * @param array $order
     * @param array $filter
     * @param array $select
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadList(array $order, array $filter, array $select)
    {
        $action = 'crm.lead.list.json';
        $data['order'] = $order;
        $data['filter'] = $filter;
        $data['select'] = $select;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Создаёт новый лид.
     *
     * @param array $fields - Набор полей - массив вида array("поле"=>"значение"[, ...]), содержащий значения полей лида.
     * @param bool $event - Набор параметров. REGISTER_SONET_EVENT - произвести регистрацию события добавления лида в живой ленте. Дополнительно будет отправлено уведомление ответственному за лид.
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadAdd(array $fields, bool $event = true)
    {
        $action = 'crm.lead.add.json';
        $data['fields'] = $fields;
        $data['params'] = ['REGISTER_SONET_EVENT' => (int)$event];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Удаляет лид и все связанные с ним объекты.
     *
     * @param $id
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadDelete(int $id)
    {
        $action = 'crm.lead.delete.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает описание полей лида, в том числе пользовательских.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadFields()
    {
        $action = 'crm.lead.fields.json';
        $data = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает лид по идентификатору.
     *
     * @param $id
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadGet(int $id)
    {
        $action = 'crm.lead.get.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает товарные позиции лида.
     *
     * @param $id
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadProductRowGet(int $id)
    {
        $action = 'crm.lead.productrows.get.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Устанавливает (создаёт или обновляет) товарные позиции лида.
     *
     * @param int $id
     * @param array $rows - массив вида array(array("поле"=>"значение"[, ...])[, ...]),
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadProductRowsSet(int $id, array $rows)
    {
        $action = 'crm.lead.productrows.set.json';
        $data['id'] = $id;
        $data['rows'] = $rows;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Обновляет существующий лид.
     *
     * @param int $id
     * @param array $fields - массив вида array("обновляемое поле"=>"значение"[, ...]),
     * @param bool $event - REGISTER_SONET_EVENT - произвести регистрацию события изменения
     * лида в живой ленте. Дополнительно будет отправлено уведомление ответственному за лид.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadUpdate(int $id, array $fields, bool $event = true)
    {
        $action = 'crm.lead.update.json';
        $data['id'] = $id;
        $data['fields'] = $fields;
        $data['REGISTER_SONET_EVENT'] = (int)$event;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Создаёт новое пользовательское поле для лидов.
     * Системное ограничение на название поля - 20 знаков.
     * К названию пользовательского поля всегда добавляется префикс UF_CRM_,
     * то есть реальная длина названия - 13 знаков.
     *
     * @param array $fields
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadUserFieldAdd(array $fields)
    {
        $action = 'crm.lead.userfield.add.json';
        $data = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Удаляет пользовательское поле лидов.
     *
     * @param int $id
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadUserFieldDelete(int $id)
    {
        $action = 'crm.lead.userfield.delete.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает пользовательское поле лидов по идентификатору.
     *
     * @param int $id
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadUserFieldGet(int $id)
    {
        $action = 'crm.lead.userfield.get.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает список пользовательских полей лидов по фильтру.
     *
     * @param array $order
     * @param array $filter
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function leadUserFieldList(array $order, array $filter)
    {
        $action = 'crm.lead.userfield.list.json';
        $data['order'] = $order;
        $data['filter'] = $filter;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Обновляет существующее пользовательское поле лидов.
     *
     * @param int $id
     * @param array $fields - массив вида array("поле"=>"значение"[, ...])
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function lead(int $id, array $fields)
    {
        $action = 'crm.lead.userfield.update.json';
        $data['id'] = $id;
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    //TODO: перенести
    public function productRowFields()
    {
        $action = 'crm.productrow.fields.json';
        $data = [];

        $res = $this->send($data,$action);

        return $res;
     }
}