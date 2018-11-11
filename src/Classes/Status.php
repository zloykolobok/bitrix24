<?php
/**
 * Документация: https://dev.1c-bitrix.ru/rest_help/crm/auxiliary/status/index.php
 */
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

    /**
     * Создаёт новый элемент в указанном справочнике.
     *
     * @param array $fields
     * @return mixed
     */
    public function statusAdd(array $fields)
    {
        $action = 'crm.status.add.json';
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Удаляет элемент справочника
     * Набор параметров. FORCED - флаг принудительного удаления системных элементов.
     * По умолчанию - N. Если удаляемый элемент является системным,
     * то он не будет удалён. Если будет передано значение Y, то этот элемент будет удалён
     * в любом случае.
     *
     * @param int $id
     * @param string $params
     * @return mixed
     */
    public function statusDelete(int $id, string $params = 'N')
    {
        $action = 'crm.status.delete.json';
        $data['id'] = $id;
        $data['params']['FORCED'] = $params ;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает описание типов справочников.
     * Результат - массив вида array(array("ID"=>"символьный идентификатор справочника",
     * "NAME":"название справочника")[, ...]).
     *
     * @return mixed
     */
    public function statusEntityTypes()
    {
        $action = 'crm.status.entity.types.json';
        $data = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает элемент справочника по идентификатору.
     *
     * @param int $id
     * @return mixed
     */
    public function statusGet(int $id)
    {
        $action = 'crm.status.get.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Обновляет существующий элемент справочника.
     *
     * @param int $id
     * @param array $fields
     * @return mixed
     */
    public function statusUpdate(int $id, array $fields)
    {
        $action = 'crm.status.update.json';
        $data['id'] = $id;
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }
}