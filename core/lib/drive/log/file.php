<?php

namespace core\lib\drive\log;

use core\lib\config;

class file
{
    public $path;

    public function __construct()
    {
        $config = config::get('OPTION', 'log');
        $this->path = $config['PATH'];
    }

    public function log($msg, $file = 'log')
    {
        /**
         * 1 确定文件存储目录是否存在 若否则新建目录
         * 2 写入日志
         */
        $path = $this->path . date('Ymd') . '/';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        file_put_contents($path . $file . '.php', date('Y-m-d H:i:s') . ' ' . json_encode($msg) . PHP_EOL, FILE_APPEND);
    }
}