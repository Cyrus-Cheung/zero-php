<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('ZEROYC', realpath('./'));
define('CORE', ZEROYC . '/core');
define('APP', ZEROYC . '/app');
define('MODULE', 'app');

include 'vendor/autoload.php';

define('DEBUG', true);

if (DEBUG) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');
}

include CORE . '/common/function.php';
include CORE . '/ZYC.php';

spl_autoload_register('\core\ZYC::load');
\core\ZYC::run();