<?php

namespace core\lib;

class log
{
    static $class;
    /**
     * 1 确定日志的存储方式
     * 2 写日志
     */

    static function init()
    {
        $drive = config::get('DRIVE', 'log');
        $class = '\core\lib\drive\log\\' . $drive;
        self::$class = new $class;
    }

    static public function log($name, $file = '')
    {
        self::$class->log($name, $file);
    }
}