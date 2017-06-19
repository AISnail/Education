<?php
namespace app\www\controller;

use app\common\model\user;
use think\Controller;
use think\Loader;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index');
    }
}
