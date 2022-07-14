<?php

use f2learn\app\repository\UsuarioRepository;
use f2learn\app\utils\MyLog;
use f2learn\app\utils\MyMail;
use f2learn\core\App;
use f2learn\core\Router;

session_start();

function dameArrayDeIdiomasOrdenado() : array
{
    $langs = array();
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    {
        // dividimos la cadena en piezas (idiomas y prioridades (q))
        preg_match_all(
            '/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i',
            $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);
        if (count($lang_parse[1]))
        {
            // creamos un array de la forma "en" => 0.8
            $langs = array_combine($lang_parse[1], $lang_parse[4]);
            // Si no está la prioridad q la ponemos a 1
            foreach ($langs as $lang => $val)
            {
                if ($val === '') $langs[$lang] = 1;
            }
            // ordenamos el array según el valor de q
            arsort($langs, SORT_NUMERIC);
        }
    }
    return $langs;
}

if (isset($_GET["language"]))
    $language = trim(strip_tags($_GET["language"]));
else
{
    if (isset($_SESSION["language"]))
        $language = $_SESSION["language"];
    else
        $language = "en_GB";
}

$_SESSION["language"] = $language;

$language .= ".utf8";
putenv("LANGUAGE=$language");
putenv("LC_ALL=$language");
$result = setlocale(LC_ALL, $language);
$result = bindtextdomain("es_ES", "../locale");
$result = bind_textdomain_codeset("es_ES", "UTF-8");
$result = textdomain("es_ES");

require __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/../app/config.php';
App::bind('config', $config);

$router = Router::load(__DIR__ . '/../app/' . $config['routes']['filename']);
App::bind('router', $router);

$logger = MyLog::load(__DIR__ . '/../logs/' . $config['logs']['filename'], $config['logs']['level']);
App::bind('logger', $logger);

$mailer = new MyMail();
App::bind('mailer', $mailer);

if (isset($_SESSION['loggedUser']))
    $appUser = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
else
    $appUser = null;

App::bind('appUser', $appUser);