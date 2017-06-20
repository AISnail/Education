<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\AuthRule;

class Test extends Controller
{
    public function index()
    {
        $menus = AuthRule::getMenus();
        foreach ($menus as $value) {
            echo $value->title;
            echo '<br/>';
            foreach ($value->subMenu as $sub) {
                echo '---';
                echo $sub->title;
                echo '<br/>';
            }
        }
    }
}