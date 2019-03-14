<?php namespace App\Libreries;

use App\Urls;

class Shortener
{
    public $url;
    public function __construct(String $url)
    {
        $this->url = $url;
    }

    public function getCode()
    {
        return substr(md5(uniqid(mt_rand(), true)), 0, 8);
    }
}
