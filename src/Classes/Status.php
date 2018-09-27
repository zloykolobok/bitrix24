<?php

namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Status extends Bitrix
{
    /**
     * Возвращает список элементов справочника по фильтру.
     * Является реализацией списочного метода для элементов справочников.
     * Обратите внимание, что в данной реализации параметры
     * "select" и "navigation" не поддерживаются.
     *
     * @return void
     */
    public function statusList(array $order, array $filter)
    {
        $action = 'crm.status.list.json';
        $data['order'] = $order;
        $data['filter'] = $filter;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает описание полей справочника.
     *
     * @return void
     */
    public function statusFields()
    {
        $action = 'crm.status.fields.json';
        $data['fields'] = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает элементы справочника по его символьному идентификатору, упорядоченные по полю "SORT"
     *
     * @param [type] $entityId
     * @return void
     */
    public function statusEntityItems($entityId)
    {
        $action = 'crm.status.entity.items.json';
        $data['entityId'] =$entityId;

        $res = $this->send($data,$action);

        return $res;
    }
}