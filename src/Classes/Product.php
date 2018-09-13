<?php
/**
 * Documentation: https://dev.1c-bitrix.ru/rest_help/crm/products/index.php
 */

namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Product extends Bitrix
{
    /**
     * Создаёт новый товар.
     *
     * @param array $fields - Набор полей - массив вида array("поле"=>"значение"[, ...]),
     * содержащий значения полей товара. Необходимо обязательно указать CURRENCY_ID для установки цены.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function productAdd(array $fields)
    {
        $action = 'crm.product.add.json';
        $data['fields'] = $fields;

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Удаляет товар.
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
    public function productDelete(int $id)
    {
        $action = 'crm.product.delete.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Возвращает описание полей товара.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function productFields()
    {
        $action = 'crm.product.fields.json';
        $data = [];

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Возвращает товар по идентификатору.
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
    public function productGet(int $id)
    {
        $action = 'crm.product.get.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Возвращает список товаров по фильтру.
     * Является реализацией списочного метода для товаров.
     * Ожидается, что в фильтре будет определён параметр CATALOG_ID.
     * В противном случае товары будут выбираться из каталога по умолчанию.
     *
     * @param array $order - сортировка
     * @param array $filter - фильтр
     * @param array $select - Что-бы получить свойства товара нужно в select указать PROPERTY_*
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function productList(array $order, array $filter, array $select)
    {
        $action = 'crm.product.list.json';
        $data['order'] = $order;
        $data['filter'] = $filter;
        $data['select'] = $select;

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Обновляет существующий товар.
     *
     * @param int $id
     * @param array $fields - Набор полей - массив вида array("обновляемое поле"=>"значение"[, ...]),
     * где "обновляемое поле" может принимать значения из возвращаемых методом crm.product.fields.
     * Необходимо обязательно указать CURRENCY_ID для установки цены.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function productUpdate(int $id, array $fields)
    {
        $action = 'crm.product.update.json';
        $data['id'] = $id;
        $data['fields'] = $fields;

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Возвращает список типов свойств товаров.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function productPropertyTypes()
    {
        $action = 'crm.product.property.types.json';
        $data = [];

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Возвращает описание полей для свойств товаров.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function productPropertyFields()
    {
        $action = 'crm.product.property.fields.json';
        $data = [];

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Возвращает описание полей дополнительных настроек свойства товаров пользовательского типа.
     *
     * @param string $propertyType
     * @param string $userType
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function productPropertySettingsFields(string $propertyType, string $userType)
    {
        $action = 'crm.product.property.settings.fields.json';
        $data['propertyType'] = $propertyType;
        $data['userType'] = $userType;

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Возвращает описание полей элемента свойства товаров списочного типа.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function productPropertyEnumerationFields()
    {
        $action = 'crm.product.property.enumeration.fields.json';
        $data = [];

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Создаёт новое свойство товаров.
     *
     * @param array $fields - Набор полей - массив вида array("поле"=>"значение"[, ...]),
     * содержащий описание свойства товаров.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function productPropertyAdd(array $fields)
    {
        $action = 'crm.product.property.add.json';
        $data['fields'] = $fields;

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Возвращает свойство товаров по идентификатору.
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
    public function productPropertyGet(int $id)
    {
        $action = 'crm.product.property.get.json';
        $data['id'] = $id;

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Возвращает список свойств товаров.
     *
     * @param array $order - сортировка ["SORT" => "ASC"]
     * @param array $filter - фильтр
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function productPropertyList(array $order, array $filter)
    {
        $action = 'crm.product.property.list.json';
        $data['order'] = $order;
        $data['filter'] = $filter;

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Обновляет существующее свойство товаров.
     *
     * @param int $id
     * @param array $fields
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function productPropertyUpdate(int $id, array $fields)
    {
        $action = 'crm.product.property.update.json';
        $data['id'] = $id;
        $data['fields'] = $fields;

        $res = $this->send($data,$action);
        return $res;
    }

    /**
     * Удаляет свойство товаров.
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
    public function productPropertyDelete(int $id)
    {
        $action = 'crm.product.property.delete';
        $data['id'] = $id;

        $res = $this->send($data,$action);
        return $res;
    }
}