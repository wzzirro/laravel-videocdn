# VideoCDN wrapper for Laravel

### Publish config

```
$ php artisan vendor:publish
```

### Usage

DI:

```PHP
<?php
use Illuminate\Support\Facades\Route;
use Wzzirro\VideoCdn\VideoCdnManager;

Route::get('/',  function (VideoCdnManager $videoCdn) 
{ 
    $translations = $videoCdn->translations->list();
    return var_dump($translations);
});

?>
```

