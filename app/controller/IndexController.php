<?php

namespace app\controller;

use app\model\test1Model;

class IndexController extends \core\ZYC
{
    public function index()
    {
        $model = new test1Model();

//        $res = $model->select('test1', '*');
        $ret = $model->delete('test1', [
            'id[>]' => 3
        ]);
        dump($ret->rowCount());
    }
}