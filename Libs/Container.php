<?php

namespace Libs;


class Container
{
    private static $instance;

    private static $data = [];

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function bind($interface, $class)
    {
        $this->data[$interface] = $class;
    }

    public function get($interface)
    {
        return $this->data[$interface];
    }
}