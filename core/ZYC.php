<?php

namespace core;

class ZYC
{
    public static $classMap = [];
    public $assign;

    static public function run()
    {
        \core\lib\log::init();
        $route = new \core\lib\route();

        $controllerName = $route->controller;
        $action = $route->action;
        $controllerFile = APP . '/controller/' . $controllerName . 'Controller.php';

        $controllerClass = '\\' . MODULE . '\controller\\' . $controllerName . 'Controller';

        if (is_file($controllerFile)) {
            include $controllerFile;
            $controller = new $controllerClass();
            $controller->$action();
            \core\lib\log::log('controller: ' . $controllerName . '   action: ' . $action);
        } else {
            throw new \Exception('找不到控制器' . $controllerClass);
        }
    }

    /**
     * 自动加载类库
     * @return bool
     */
    static public function load($class)
    {
        $class = str_replace('\\', '/', $class);
        if (isset($classMap[$class])) {
            return true;
        } else {
            $file = ZEROYC . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file = APP . '/views/' . $file;

        if (is_file($file)) {
            extract($this->assign);
            include $file;
        }
    }
}