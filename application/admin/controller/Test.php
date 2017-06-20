<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\AuthRule;

class Test extends Controller
{
    public function index()
    {
        $menus = AuthRule::getMenus();
        halt($menus);
    }
}