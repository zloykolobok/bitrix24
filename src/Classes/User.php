<?php
/**
 * Документация: https://dev.1c-bitrix.ru/rest_help/users/index.php
 */

namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class User extends Bitrix
{
    /**
     * Получение списка названий полей пользователя.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function userFields()
    {
        $action = 'user.fields.json';
        $data = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Получение информации о текущем пользователе.
     *
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function userCurrent()
    {
        $action = 'user.current.json';
        $data = [];

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Приглашает пользователя. Возможно только от имени пользователя с правами
     * приглашения пользователей.
     * В случае успеха пользователю будет выслано стандартное приглашение на портал.
     * Если нужно добавить пользователя экстранета,
     * то в полях передать необходимо передать: EXTRANET: Y и SONET_GROUP_ID: [...].
     * Если нужно добавить пользователя интранета, то передаётся: UF_DEPARTMENT: [...].
     *
     * @param array $fields
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function userAdd(array $fields)
    {
        $action = 'user.add.json';
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Обновляет данные пользователя.
     * Возможно только от имени пользователя с правами приглашения пользователей.
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
    public function userUpdate(int $id, array $fields)
    {
        $action = 'user.update.json';
        $data['id'] = $id;
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Получение фильтрованного списка пользователей. Метод вернет всех пользователей за исключением:
     * ботов, пользователей для e-mail, пользователей для Открытых Линий,
     * пользователей Реплики.
     * Дополнительно можно указывать любые параметры из user.fields для фильтрации по их значениям.
     * Кроме основных полей, доступны дополнительные:
     * UF_DEPARTMENT - принадлежность к структуре компании;
     * UF_PHONE_INNER - внутренний телефонный номер;
     * IS_ONLINE - [Y/N] - позволяет показать только авторизованных или нет пользователей.
     * NAME_SEARCH - быстрый поиск по персональным данным.
     * Параметры фильтрации могут принимать значение массивов.
     *
     * @param array $filter
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function userGet(array $filter)
    {
        $action = 'user.get.json';
        $data['filter'] = $filter;

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Метод для получения списка пользователей с ускоренным поиском
     * по персональным данным (имя, фамилия, отчество, название подразделения, должность).
     * Работает в двух режимах: быстро с помощью Fulltext Index и более медленный
     * вариант через правый LIKE (поддержка определяется автоматически).
     *
     * Массив может содержать поля в любом сочетании:
     *   NAME - имя
     *   LAST_NAME - фамилия
     *   SECOND_NAME - отчество
     *   WORK_POSITION - должность
     *   UF_DEPARTMENT_NAME - название подразделения
     *   Или FIND - поле которое будет искать во всех перечисленных полях
     *   Это аналог режима старого CUser::GetList в котором можно было задать фильтр
     *   NAME_SEARCH и получить результат)
     *
     * @param array $filter
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function userSearch(array $filter)
    {
        $action = 'user.search.json';
        $data['filter'] = $filter;

        $res = $this->send($data,$action);

        return $res;
    }

}