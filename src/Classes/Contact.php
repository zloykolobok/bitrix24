<?php

namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Contact extends Bitrix
{
    /**
     * Возвращает список контактов по фильтру.
     * Является реализацией списочного метода для контактов.
     * При выборке используйте маски:
     *  "*" - для выборки всех полей (без пользовательских и множественных)
     *  "UF_*"- для выборки всех пользовательских полей (без множественных)
     * Маски для выборки множественных полей нет.
     * Для выборки множественных полей укажите нужные в списке выбора
     * ("PHONE", "EMAIL" и так далее).
     * Для получения списка компаний, привязанных к контакту используйте
     * метод crm.contact.company.items.get.
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
    public function contactList(array $order, array $filter, array $select, int $next = 0)
    {
        $action = 'crm.contact.list.json';
        $data['order'] = $order;
        $data['filter'] = $filter;
        $data['select'] = $select;
        $data['start'] = $next;


        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает контакт по идентификатору.
     * Для получения списка компаний, привязанных к контакту используйте метод
     * crm.contact.company.items.get.
     *
     * @param int $id
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function contactGet(int $id)
    {
        $action = 'crm.contact.get.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает описание полей контакта, в том числе пользовательских.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function contactFields()
    {
        $action = 'crm.contact.fields.json';
        $data = [];

        $res = $this->send($data,$action);

        return $res;
    }

}