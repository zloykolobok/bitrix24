<?php
/**
 * Документация: https://dev.1c-bitrix.ru/rest_help/
 */
namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Custom extends Bitrix
{
    /**
     * Выполняет кастомный запрос к API. (просто обертка, над методом send)
     *
     * @param array $fields
     * @return mixed
     */
    public function sendRequest(array $data, string $action)
    {
        return $this->send($data,$action);
    }
}