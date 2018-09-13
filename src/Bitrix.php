<?php

namespace Zloykolobok\Bitrix24;

use Zloykolobok\Bitrix24\Exception\BitrixException;
use Zloykolobok\Bitrix24\Exception\EmptyException;
use Zloykolobok\Bitrix24\Exception\UrlException;
use Zloykolobok\Bitrix24\Exception\TimeoutException;
use Zloykolobok\Bitrix24\Exception\BitrixErrorException;
use Zloykolobok\Bitrix24\Exception\ConnectionException;

abstract class Bitrix
{
    protected $url;
    protected $timeout;

    public function __construct()
    {
//        dd($this->getUrl());

    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = preg_replace("#/$#", "", $url);
    }

    public function setTimeout($time)
    {
        $this->timeout = $time;
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    protected function send(array $data, $action)
    {
        if(!extension_loaded('curl')) throw new BitrixException('cURL extension must be installed to use this library');
        if(!$this->getUrl()) throw new UrlException('Необходимо задать url');
        if(!$this->getTimeout()) throw new TimeoutException('Необходимо задать timeout');

        $url = $this->getUrl().'/'.$action;

        $data = http_build_query($data);

        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_USERAGENT, __CLASS__ );
        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
        curl_setopt( $ch, CURLOPT_POST, true );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $this->timeout );
        curl_setopt( $ch, CURLOPT_TIMEOUT, $this->timeout );

        $res = curl_exec( $ch );

        if($res === false) throw new ConnectionException(curl_error($ch));

        $res = json_decode($res);

        if($res == null) throw new EmptyException('Empty response from portal');
        if(isset($res->error)) throw new BitrixErrorException($res->error_description);

        return $res;
    }
}