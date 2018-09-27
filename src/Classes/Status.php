<?php

namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Status extends Bitrix
{
    /**
     * Возвращает список элементов справочника по фильтру.
     * Является реализацией списочного метода для элементов справочников.
     * Обратите внимание, что в данной реализации параметры "select" и "navigation"
     * не поддерживаются.
     *
     * @return void
     */
    public function statusList()
    {
        $action = 'crm.status.list.json';
        $data['fields'] = [];

        $res = $this->send($data,$action);

        return $res;
    }
}