<?php
namespace app\admin\controller;
class Index extends Rbac
{
    public function index()
    {
        return $this->fetch();
    }

}
