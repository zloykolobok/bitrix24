<?php
/**
 * Документация: https://dev.1c-bitrix.ru/rest_help/crm/contacts/index.php
 */
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

    /**
     * Создаёт новый контакт.
     * Одно из полей: NAME или LAST_NAME обязательно должно быть заполнено.
     *
     * @param array $fields - Набор полей - массив вида array("поле"=>"значение"[, ...]),
     * содержащий значения полей контакта.
     * @param array $params - Набор параметров. REGISTER_SONET_EVENT - произвести регистрацию
     * события добавления контакта в живой ленте.
     * Дополнительно будет отправлено уведомление ответственному за контакт.
     * Пример: $params = ["REGISTER_SONET_EVENT" => "Y" ]
     * @return mixed
     */
    public function contactAdd(array $fields, array $params )
    {
        $action = 'crm.contact.add.json';
        $data['fileds'] = $fields;
        $data['params'] = $params;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Добавляет компанию к указанному контакту.
     *
     * @param int $id - Идентификатор контакта.
     * @param array $fields - Объект со следующими полями:
     *     COMPANY_ID - идентификатор компании (обязательное поле)
     *     SORT - индекс сортировки
     *     IS_PRIMARY - флаг первичной компании
     * @return mixed
     */
    public function contactCompanyAdd(int $id, array $fields)
    {
        $action = 'crm.contact.company.add.json';

        $data['id'] = $id;
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Удаляет компанию из указанного контакта.
     *
     * @param int $id - Идентификатор контакта.
     * @param array $fields - Объект со следующими полями:
     *     COMPANY_ID - идентификатор компании (обязательное поле)
     * @return mixed
     */
    public function contactCompanyDelete(int $id, array $fields)
    {
        $action = 'crm.contact.company.delete.json';

        $data['id'] = $id;
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает для связи контакт-компания описание полей
     *
     * @return mixed
     */
    public function contactCompanyFields()
    {
        $action = 'crm.contact.company.fields.json';

        $data = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Очищает набор компаний, связанных с указанным контактом.
     *
     * @param int $id - Идентификатор контакта.
     * @return mixed
     */
    public function contactCompanyItemsDelete(int $id)
    {
        $action = 'crm.contact.company.items.delete.json';

        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает набор компаний, связанных с указанным контактом.
     *
     * @param int $id - Идентификатор контакта.
     * @return mixed
     */
    public function contactCompanyItemsGet(int $id)
    {
        $action = 'crm.contact.company.items.get.json';

        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Устанавливает набор компаний, связанных с указанным контактом.
     *
     * @param int $id - Идентификатор контакта.
     * @param array $items - Набор компаний в виде массива объектов со следующими полями:
     *      COMPANY_ID - идентификатор компании (обязательное поле)
     *      SORT - индекс сортировки
     *      IS_PRIMARY - флаг первичной компании
     * @return mixed
     */
    public function contactCompanyItemsSet(int $id, array $items)
    {
        $action = 'crm.contact.company.items.set.json';

        $data['id'] = $id;
        $data['items'] = $items;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Удаляет контакт и все связанные с ним объекты.
     *
     * @param int $id
     * @return mixed
     */
    public function contactDelete(int $id)
    {
        $action = 'crm.contact.delete.json';

        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Обновляет существующий контакт.
     *
     * @param int $id - Идентификатор контакта.
     * @param array $fields - массив вида array("обновляемое поле"=>"значение"[, ...])
     * @param array $params - Набор параметров. REGISTER_SONET_EVENT -
     * произвести регистрацию события изменения контакта в живой ленте.
     * Дополнительно будет отправлено уведомление ответственному за контакт.
     * @return mixed
     */
    public function contactUpdate(int $id, array $fields, array $params)
    {
        $action = 'crm.contact.update.json';

        $data['id'] = $id;
        $data['fields'] = $fields;
        $data['params'] = $params;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Создаёт новое пользовательское поле для контактов.
     * Системное ограничение на название поля - 20 знаков.
     * К названию пользовательского поля всегда добавляется префикс UF_CRM_,
     * то есть реальная длина названия - 13 знаков.
     *
     * @param array $fields -Набор полей - массив вида array("поле"=>"значение"[, ...]),
     * содержащий описание пользовательского поля.
     * @return mixed
     */
    public function contactUserfieldAdd(array $fields)
    {
        $action = 'crm.contact.userfield.add.json';

        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает пользовательское поле контактов по идентификатору.
     *
     * @param int $id - Идентификатор пользовательского поля.
     * @return mixed
     */
    public function contactUserfieldGet(int $id)
    {
        $action = 'crm.contact.userfield.get.json';

        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает пользовательское поле контактов по идентификатору.
     *
     * @param array $order - Поля сортировки.
     * @param array $filter - Поля фильтра.
     * @return mixed
     */
    public function contactUserfieldList(array $order, array $filter)
    {
        $action = 'crm.contact.userfield.list.json';

        $data['order'] = $order;
        $data['filter'] = $filter;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Обновляет существующее пользовательское поле контактов.
     *
     * @param int $id - Идентификатор пользовательского поля.
     * @param array $fields - Набор полей - массив вида array("обновляемое поле"=>"значение"[, ...])
     * @return mixed
     */
    public function contactUserfieldUpdate(int $id, array $fields)
    {
        $action = 'crm.contact.userfield.update.json';

        $data['id'] = $id;
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Удаляет пользовательское поле контактов.
     *
     * @param int $id - Идентификатор пользовательского поля.
     * @return mixed
     */
    public function contactUserfieldDelete(int $id)
    {
        $action = 'crm.contact.userfield.delete.json';

        $data['id'] = $id;

        $res = $this->send($data,$action);

        return $res;
    }

}