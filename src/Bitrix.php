<?php

namespace Zloykolobok\Bitrix24;

use MongoDB\Driver\Exception\ConnectionTimeoutException;
use Zloykolobok\Bitrix24\Exception\UrlException;
use Zloykolobok\Bitrix24\Exception\TimeoutException;

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
//        dd($this->getUrl());
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

        $res = json_decode($res);

        return $res;
    }
}