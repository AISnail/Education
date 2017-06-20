<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

use app\library\auth\Auth;
use app\admin\model\Admin as AdminModel;
use app\admin\model\AuthRule;

class Base extends Controller
{
    // 不需要检查权限的操作名，全部小写
    protected $noNeedRight = [];

    public function _initialize()
    {
        //验证用户是否登录
        
        if(AdminModel::isLogin() === true){
        }else{
            $request = Request::instance();
            $url = $request->url();
            session('pre_url', $url);
            $this->error('请登录后再进行操作','/login');
        }



        //获取 模块 控制器 方法
        $request = Request::instance();
        define('CONTROLLER_NAME',strtolower($request->controller()));
        define('MODULE_NAME',strtolower($request->module()));
        define('ACTION_NAME',strtolower($request->action()));

        $path = '/' . CONTROLLER_NAME . '/' . ACTION_NAME;
        $this->assign('path',$path);
        if(!$this->checkAuth($path)){
            $this->error('权限不够');
        }



        //输出用户信息
        $this->assign('username',session('user.username'));
        //获取菜单并输出
        $menus = AuthRule::getMenus();
        /*
        $menus = session('menus');
        if(!isset($menus)){
            $menus = MenuModel::getMenus();
            session('menus',$menus);
        }
        */
        //$this->init_menus($menus, $path);
        $this->assign('menus', $menus);
    }


    private function init_menus($menus, $path)
    {
        foreach($menus as $menu)
        {
            if(strcmp($menu['url'], $path) === 0){
                $menu['cur'] = 1;
            }else{
                $menu['cur'] = 0;
            }
            foreach($menu['subMenu'] as $subMenu){
                
                if(strcmp($subMenu['url'], $path) === 0){
                    $subMenu['cur'] = 1;
                    $menu['cur'] = 1;
                }else{
                    $subMenu['cur'] = 0;
                    $menu['cur'] = 0;
                }
            }
        }
    }

    /**
     * 检查权限
     *
     */
    private function checkAuth($path)
    {
        if(in_array(ACTION_NAME,$this->noNeedRight)){
            return true;
        }
        $auth = new Auth();
        $result = $auth->check($path,session('user.id'));
        return $result;
    }
}