<?php

namespace Libs;


class Router
{


    public static function get($url, $controller, $method){

        Helper::printBlock($_SERVER);


        $url = $_SERVER['REDIRECT_URL'];

        $segments = explode('/', $url);

        Helper::printBlock($url);
        Helper::printBlock($segments);

        $controller::$method();
    }
}