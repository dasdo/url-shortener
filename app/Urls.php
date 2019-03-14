<?php namespace App;

use Config;
use Auth;
use App\Libreries\Shortener;

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
        'updated_at', 'id', 'user_id'
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
     */
    public static function short(String $url) : Urls
    {
        $short = new Shortener($url);
        $code = $short->getCode();
        $short_url = Config::get('app.url')."/".$code;
        return self::create([
            'code' => $code,
            'url' => $url,
            'hits' => 0,
            'user_id' => Auth::id(),
            'short_url' => $short_url,
        ]);
    }

    public static function redirect($code)
    {
        $url = self::where('code', $code)->first();
        if (!$url) {
            return redirect()->to('/');
        }
        return redirect()->away($url->url);
    }

    public static function best()
    {
        return self::take(100)
                     ->orderBy('hits', 'desc')
                     ->get();
    }
}
