# url-shortener

## Require
php ^7.1.3

## install

```ssh
    git clone git@github.com:dasdo/url-shortener.git
    cd url-shortener
    composer install
    cp .env.example .env 
    php artisan migrate
    php artisan key:generate
    php artisan serve
```

## others

Inserts Guest Users and first Url <`Danger! this removes the data from the user table and urls`>

```ssh
    php artisan db:seed --class=DatabaseSeeder
```

## Test

Run test

```ssh
phpunit
```

## URL API

Get all the urls

```ssh
GET /api/urls
```

**Sample response:**

```json
[
    {
        "id":1,
        "short_url": "http://localhost/7f6d604f",
        "url": "https://www.google.com/maps",
        "hits": 0
    },
    {
        "id":2,
        "short_url": "http://127.0.0.1:8000/4332eda7",
        "url": "http://mcanime.net",
        "hits": 1
    }
]
```

Get url by id

```ssh
GET /api/urls/<id>
```
**Sample response:**

```json
{
    "id":1,
    "short_url": "http://localhost/7f6d604f",
    "url": "https://www.google.com/maps",
    "hits": 0
}
```

Get best `100` urls

```ssh
GET /api/urls/best
```

**Sample response:**

```json
[
     {
        "id":1,
        "short_url": "http://localhost/7f6d604f",
        "url": "https://www.google.com/maps",
        "hits": 0
    },
    {
        "id":2,
        "short_url": "http://127.0.0.1:8000/4332eda7",
        "url": "http://mcanime.net",
        "hits": 1
    }
]
```

Short a link

```ssh
POST /api/urls  {url:"http://example.com"}
```

**Sample response:**

Success

```json
{
    "id":1,
    "short_url": "http://localhost/7f6d604f",
    "url": "https://www.google.com/maps",
    "hits": 0
}
```

`Failed`

```json
{
  "exception": "record not found"
}
```

Delete urls

```ssh
DELETE /api/urls/<id>
```

**Sample response:**

Success

```json
{
    "url delete"
}
```

Failed

```json
{
    "exception": "Error Processing Request"
}
```

## JS implement

Short url

```javascript
$.post("/api/urls", {url:url},function(data) {
    console.log(data.short_url);
})
.fail(function() {
    console.log(data.exception);
});
```

Get all the urls

```javascript
$.get("/api/urls", function(data) {
    console.log(data);
})
.fail(function() {
    console.log(data.exception);
});
```

Get url by id

```javascript
$.get("/api/urls/1", function(data) {
    console.log(data);
})
.fail(function() {
    console.log(data.exception);
});
```

Get best `100` urls

```javascript
$.get("/api/urls/best", function(data) {
    console.log(data);
})
.fail(function() {
    console.log(data.exception);
});
```

Delete url

```javascript
$.delete("/api/urls/1", function(data) {
    console.log(data);
})
.fail(function() {
    console.log(data.exception);
});
```

## algorithm

```php
<?php
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
```