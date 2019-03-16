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

success

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