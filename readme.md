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
use wzzirro\videocdn\VideoCdn;

Route::get('/',  function (VideoCdn $videoCdn) 
{ 
    $translations = $videoCdn->translations->list();
    var_dump($translations);
});

?>
```

