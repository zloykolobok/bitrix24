<?php
/**
 * Документация: https://dev.1c-bitrix.ru/rest_help/crm/company/index.php
 */

namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Company extends Bitrix
{
    /**
     * Возвращает список компаний по фильтру. Является реализацией списочного метода для компаний.
     * При выборке используйте маски:
     * "*" - для выборки всех полей (без пользовательских и множественных)
     * "UF_*"- для выборки всех пользовательских полей (без множественных)
     * Маски для выборки множественных полей нет. Для выборки множественных полей укажите
     * нужные в списке выбора ("PHONE", "EMAIL" и так далее).
     *
     * @param array $order
     * @param array $filter
     * @param array $select
     * @param int   $next
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function companyList(array $order = [], array $filter = [], array $select = [], int $next = null)
    {
        return $this->send([
            'order'  => $order,
            'filter' => $filter,
            'select' => $select,
            'start'  => $next,
        ], 'crm.company.list.json');
    }

    /**
     * Возвращает компанию по идентификатору.
     *
     * @see https://dev.1c-bitrix.ru/rest_help/crm/company/crm_company_get.php
     *
     * @param int $id
     *
     * @return mixed
     */
    public function companyGet(int $id)
    {
        return $this->send(['id' => $id], 'crm.company.get.json');
    }

    /**
     * Возвращает описание полей компании, в том числе пользовательских.
     *
     * @see https://dev.1c-bitrix.ru/rest_help/crm/company/crm_company_fields.php
     *
     * @return void
     */
    public function companyFields()
    {
        return $this->send([], 'crm.company.fields.json');
    }

    /**
     * Обновляет существующую компанию.
     *
     * @see https://dev.1c-bitrix.ru/rest_help/crm/company/crm_company_update.php
     *
     * @param integer $id
     * @param array $fields
     * @param array $params
     *
     * @return void
     */
    public function companyUpdate(int $id, array $fields, array $params)
    {
        return $this->send(['id' => $id, 'fields' => $fields, 'params' => $params], 'crm.company.update.json');
    }

    /**
     * Возвращает набор контактов, связанных с указанной компанией.
     *
     * @see https://dev.1c-bitrix.ru/rest_help/crm/company/crm_company_contact_items_get.php
     *
     * @param int $id - Идентификатор компании.
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function companyContactItemsGet(int $id)
    {
        return $this->send(['id' => $id], 'crm.company.contact.items.get.json');
    }
}