<?php

namespace Zloykolobok\Bitrix24\Classes;

use Zloykolobok\Bitrix24\Bitrix;

class Disk extends Bitrix
{
    public function uploadFile(int $id, array $fields, string $content)
    {
        $action = 'disk.storage.uploadfile.json';
        $data['ID'] = $id;
        $data['fields'] = $fields;
        $data['fileContent'] = $content;

        $res = $this->send($data,$action);

        return $res;
    }

    public function getStorage()
    {
        $action = 'disk.storage.getlist.json';
        $data = [];

        $res = $this->send($data,$action);

        return $res;
    }
}