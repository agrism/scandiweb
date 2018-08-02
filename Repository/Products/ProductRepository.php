<?php

namespace Repository\Products;


use Libs\Container;
use Libs\Helper;

class ProductRepository implements IProduct
{

    private $instance;

    /**
     * ProductRepository constructor.
     * @param $instance
     */
    public function __construct()
    {
        $app = Container::getInstance();
        $class = $app->get(IProduct::class);
        $this->instance = new $class;

    }


    public function get()
    {
        $this->instance->get();
    }
}