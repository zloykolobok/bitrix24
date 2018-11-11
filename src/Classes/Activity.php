<?php
/**
 * Документация: https://dev.1c-bitrix.ru/rest_help/crm/rest_activity/index.php
 */
namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Activity extends Bitrix
{
    /**
     * Создаёт новое дело.
     *
     * @param array $fields
     * @return mixed
     */
    public function activityAdd(array $fields)
    {
        $action = 'crm.activity.add.json';
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает список активностей по фильтру.
     * (Для получения COMMUNICATIONS его надо явно указать в select.)
     * Является реализацией списочного метода для активностей.
     *
     * @param array $order
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
    public function activityList(array $order, array $filter, array $select)
    {
        $action = 'crm.activity.list.json';
        $data['order'] = $order;
        $data['filter'] = $filter;
        $data['select'] = $select;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает описание коммуникации для активности.
     * Коммуникации хранят номера телефонов в звонках,
     * email-адреса в письмах, имена во встречах.
     *
     * @return mixed
     */
    public function activityCommunicationFields()
    {
        $action = 'crm.activity.communication.fields.json';
        $data = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Удаляет активность.
     *
     * @param int $id
     * @return mixed
     */
    public function activityDelete(int $id)
    {
        $action = 'crm.activity.delete.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает описание полей активности.
     *
     * @return mixed
     */
    public function activityFields()
    {
        $action = 'crm.activity.fields.json';
        $data = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает активность по идентификатору.
     *
     * @param int $id
     * @return mixed
     */
    public function activityGet(int $id)
    {
        $action = 'crm.activity.get.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Обновляет существующую активность.
     *
     * @param int $id
     * @param array $fields
     * @return mixed
     */
    public function activityUpdate(int $id, array $fields)
    {
        $action = 'crm.activity.update.json';
        $data['id'] = $id;
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }
}