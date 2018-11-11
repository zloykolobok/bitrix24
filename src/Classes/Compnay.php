<?php
/**
 * Документация: https://dev.1c-bitrix.ru/rest_help/crm/company/index.php
 */
namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Compnay extends Bitrix
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
     * @param int $next
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function companyList(array $order, array $filter, array $select, int $next = 0)
    {
        $action = 'crm.company.list.json';
        $data['order'] = $order;
        $data['filter'] = $filter;
        $data['select'] = $select;
        $data['start'] = $next;


        $res = $this->send($data,$action);

        return $res;
    }
}