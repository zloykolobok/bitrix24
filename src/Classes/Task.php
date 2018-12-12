<?php
/**
 * Documenttion: https://dev.1c-bitrix.ru/rest_help/tasks/index.php
 */
namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Task extends Bitrix
{

    /**
     * Создает новую задачу. Возвращает идентификатор добавленной задачи.
     * Поля:
     * TITLE - Название задачи.
     * DESCRIPTION - Описание задачи.
     * DEADLINE - Крайний срок.
     * START_DATE_PLAN - Плановая дата начала.
     * END_DATE_PLAN - Плановая дата завершения
     * PRIORITY - Приоритет.
     * ACCOMPLICES - Соисполнители (идентификаторы пользователей).
     * AUDITORS - Наблюдатели (идентификаторы пользователей).
     * TAGS - Теги (при добавлении - просто массив тегов в виде текста).
     * ALLOW_CHANGE_DEADLINE - Флаг "Разрешить ответственному менять крайний срок"
     * TASK_CONTROL - Флаг "Принять работу после завершения задачи".
     * PARENT_ID - Идентификатор родительской задачи.
     * DEPENDS_ON - Идентификатор предыдущей задачи.
     * GROUP_ID - Идентификатор рабочей группы.
     * RESPONSIBLE_ID - Идентификатор ответственного.
     * TIME_ESTIMATE - Плановые трудозатраты.
     * CREATED_BY - Идентификатор постановщика
     * DECLINE_REASON - Причина отклонения задачи.
     * STATUS - Мета-статус задачи.
     * DURATION_PLAN - Планируемая длительность в часах или днях.
     * DURATION_TYPE - Тип единицы измерения в планируемой длительности: days, hours или minutes.
     * MARK - Оценка по задаче (возможные значения P (положительная) и N (отрицательная)).
     * ALLOW_TIME_TRACKING - Флаг включения учета затраченного времени по задаче.
     * ADD_IN_REPORT - Флаг включения задачи в отчет по эффективности.
     * SITE_ID - Идентификатор сайта. По умолчанию в это поле записывается идентификатор сайта, на котором создается задача.
     * MATCH_WORK_TIME - Флаг, который показывает, что даты исполнения и крайний срок должны всегда устанавливаться в рабочее время.
     * UF_CRM_TASK - Цифры это ID соответствующих значений.
     *  Значение L_4 означает привязку к задаче лида с ID = 4.
     *  Можно задавать несколько связей одного типа, например L_4, L_5.
     *  L - лид
     *  C - контакт
     *  CO - компания
     *  D - сделка
     *
     * @param array $taskdata
     * @return void
     */
    public function taskItemAdd(array $taskdata)
    {
        $action = 'task.item.add.json';

        foreach ($taskdata as $key=>$value){
            $data[$key] = $value;
        }

        $res = $this->send($data,$action);

        return $res;
    }

    /**
     * Возвращает массив данных о задаче (TITLE, DESCRIPTION и т.д.). Доступны следующие поля.
     *
     * @param integer $id
     * @return void
     */
    public function taskItemGetdata(int $id)
    {
        $action = 'task.item.getdata.json';
        $data['id'] = $id;
        $data['fields'] = [];

        $res = $this->send($data,$action);

        return $res;
    }
}