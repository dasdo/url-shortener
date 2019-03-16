<?php namespace App\Libreries;

use App\Urls;

/**
 * Class to handle the necessary operations of the link shortener
 */
class Shortener
{
    public $url;
    public function __construct(String $url)
    {
        $this->url = $url;
    }

    public function getCode()
    {
        $code = substr(md5(uniqid(mt_rand(), true)), 0, 8);
        $url = Urls::where('code', $code)->first();

        if(!$url){
            return $code;
        }
        return $this->getCode();
    }
}
