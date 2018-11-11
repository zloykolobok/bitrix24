<?php
/**
 * Документация: https://dev.1c-bitrix.ru/rest_help/crm/stream/index.php
 */
namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Livefeedmessage extends Bitrix
{
    /**
     * Добавляет сообщение в ленту CRM.
     *
     * @param $fields
     *  $fields['POST_TITLE'] - заголовок сообщения
     *  $fields['MESSAGE'] - текст сообщения
     *  $fields['SPERM'] - Права на просмотр сообщения
     *  $fields['ENTITYTYPEID'] - Тип сущности (число), в которой опубликовано сообщение:
     *          1 - лид;
     *          2 - сделка;
     *          3 - контакт;
     *          4 - компания.
     *  $fields['ENTITYID'] - ID конкретного лида/сделки/контакта/компании, в которой опубликовано сообщение.
     *  $fields['FILES'] - Файлы сообщения.
     *      "FILES": [
     *          ["1.gif", "R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="],
     *          ["2.gif", "..."]
     *      ],
     * @return mixed
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixErrorException
     * @throws \Zloykolobok\Bitrix24\Exception\BitrixException
     * @throws \Zloykolobok\Bitrix24\Exception\ConnectionException
     * @throws \Zloykolobok\Bitrix24\Exception\EmptyException
     * @throws \Zloykolobok\Bitrix24\Exception\TimeoutException
     * @throws \Zloykolobok\Bitrix24\Exception\UrlException
     */
    public function livefeedmessageAdd($fields)
    {
        $action = 'crm.livefeedmessage.add.json';
        $data['fields'] = $fields;

        $res = $this->send($data,$action);

        return $res;
    }
}