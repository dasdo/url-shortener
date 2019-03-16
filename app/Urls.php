<?php namespace App;

use Config;
use Auth;
use App\Libreries\Shortener;

/**
 * Model to handle conversions of regular links to short
 */
class Urls extends Base
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'code', 'hits', 'user_id', 'created_at', 'deleted_at', 'short_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'user_id', 'created_at', 'deleted_at', 'code'
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    /**
     * Short Links
     * @param string $url
     * @return Urls
     */
    public static function short(String $url) : Urls
    {
        // Validate url
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \Exception("Error Processing Request Invalid Url", 1);
        }
        
        /**
         * if it already exists, we return the short link
         */
        if ($short = self::getByUrl($url)) {
            return $short;
        }

        /**
         * Generate code for short url
         */
        $short = new Shortener($url);
        $code = $short->getCode();
        $short_url = Config::get('app.url')."/".$code;

        //if no loging put gest user
        $userId = Auth::id() | 1;

        return self::create([
            'code' => $code,
            'url' => $url,
            'hits' => 0,
            'user_id' => Auth::id(),
            'short_url' => $short_url,
        ]);
    }

    /**
     * Get short link by url
     * @param String $url
     * @return Urls | Boolean
     */
    public static function getByUrl(String $url)
    {
        $url = self::where('url', $url)->first();
       
        return $url;
    }

    /**
     * Get best 100 short link
     * @return array Urls
     */
    public static function best()
    {
        return self::take(100)
                     ->orderBy('hits', 'asc')
                     ->get();
    }
}
