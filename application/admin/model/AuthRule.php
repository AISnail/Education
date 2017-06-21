<?php
namespace app\admin\model;

use think\Model;

class AuthRule extends Model
{
    /**
     * 获取菜单列表
     *
     */
    static public function getMenus()
    {
        $where =[
            'pid' => 0,
            'menu' => 1,
        ];
        $menus = self::where($where)->with('subMenu')->select();
        return $menus;
    }

    public function subMenu()
    {
        return $this->hasMany('auth_rule','pid');
    }
}