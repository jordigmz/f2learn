<?php

use f2learn\app\exceptions\AppException;
use f2learn\core\App;
use f2learn\core\Request;

try {
    require __DIR__ . '/../core/bootstrap.php';

    App::get('router')->direct(Request::uri(), Request::method());

} catch (AppException $appException) {
    $appException->handleError();
}