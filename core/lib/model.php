<?php

namespace core\lib;

class model extends \Medoo\Medoo
{
    public function __construct()
    {
        $options = config::all('database');
        parent::__construct($options);
    }
}