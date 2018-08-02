<?php
/**
 * Created by PhpStorm.
 * User: Agris
 * Date: 23.07.2018
 * Time: 22:31
 */

namespace Libs;


class Helper
{
    public static function printBlock($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}