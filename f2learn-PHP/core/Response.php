<?php

namespace f2learn\core;

use f2learn\app\exceptions\AppException;

class Response
{
    /**
     * @param string $nameUrl
     * @param string $layout
     * @param array $data
     * @throws AppException
     */
    public static function renderView(string $nameUrl, string $layout='layout', array $data = [])
    {
        extract($data);

        $app['user'] = App::get('appUser');

        ob_start();

        require __DIR__ . "/../app/views/$nameUrl.view.php";

        $mainContent = ob_get_clean();

        require __DIR__ . "/../app/views/$layout.view.php";
    }
}