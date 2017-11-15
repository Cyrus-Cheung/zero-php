<?php

namespace app\controller;



class IndexController extends \core\ZYC
{
    public function index()
    {
        $this->render('Index/index.html');
    }
}