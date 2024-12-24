<?php
    namespace Core;

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    define('DS', DIRECTORY_SEPARATOR);
    define('SDR', $_SERVER['DOCUMENT_ROOT']);
    define('SRI', $_SERVER['REQUEST_URI']);

    spl_autoload_register(function($class)
    {
        preg_match('#(.+)\\\\(.+?)$#', $class, $match);

        $nameSpace = str_replace('\\', DS, strtolower($match[1]));
        $className = $match[2];

        $path = SDR . DS . $nameSpace . DS . $className . '.php';

        if (file_exists($path))
        {
            require_once $path;

            if (class_exists($class, true))
            {
                return true;
            }
            else
            {
                throw new \Exception("Класс $class не найден в файле $path.");
            }
        }
        else
        {
            throw new \Exception("Для класса $class не найден файл $path.");
        }
    });

    require_once SDR . '/project/config/connections.php';

    $routes = require SDR . '/project/config/routes.php';

    $track = (new Router)->getTrack($routes, SRI);

    echo '<pre>';
    var_dump($track);
    echo '</pre>';

    $page = (new Dispatcher)->getPage($track);

    echo '<pre>';
    var_dump($page);
    echo '</pre>';

    echo (new View)->render($page);
    