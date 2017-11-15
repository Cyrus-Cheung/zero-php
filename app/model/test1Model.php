<?php

namespace app\model;

use core\lib\model;

class test1Model extends model
{
    public $table = 'test1';

    public function getList()
    {
        $res = $this->select($this->table, '*');
        return $res;
    }

    public function getOne($id)
    {
        $res = $this->get($this->table, '*', ['id' => $id]);
        return $res;
    }

    public function setOne($id, $data)
    {
       return $this->update($this->table, $data, array('id' => $id));
    }

    public function delOne($id)
    {
        return $this->delete($this->table, ['id' => $id]);
    }
}