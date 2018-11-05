<?php
/**
 * Created by PhpStorm.
 * User: romchik
 * Date: 05.11.2018
 * Time: 18:48
 */

namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Activity extends Bitrix
{
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
        $action = 'crm.activity.list';
        $data['order'] = $order;
        $data['filter'] = $filter;
        $data['select'] = $select;

        $res = $this->send($data,$action);

        return $res;
    }
}