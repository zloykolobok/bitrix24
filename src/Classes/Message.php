<?php
/**
 * Документация: https://dev.1c-bitrix.ru/rest_help/im/im_notify.php
 */
namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Message extends Bitrix
{
    /**
     * Отправляет заданному пользователю уведомление.
     *
     * @param integer $to - Идентификатор получателя сообщения
     * @param string $message - Текст сообщения. Поддерживает BUIS и другие BB-коды (кроме видео).
     * Не поддерживает html, для переноса строк используйте #BR#
     * @param string $type - Доступны значения: SYSTEM либо USER.
     * Если значение не указано то по умолчанию параметр работает как USER.
     * Если указано значение SYSTEM, то сообщение будет не от какого то пользователя, а от приложения.
     * @return void
     */
    public function imNotify(int $to, string $message, $type = 'USER')
    {
        $action = 'im.notify.json';
        $data['to'] = $to;
        $data['message'] = $message;
        $data['type'] = $type;

        $res = $this->send($data,$action);

        return $res;
    }
}