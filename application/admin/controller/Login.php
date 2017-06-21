<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

use app\admin\model\Admin as AdminModel;

class Login extends Controller
{
    /**
     * 显示后台登陆页面
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 登录操作
     */
    public function login()
    {
        $request = Request::instance();
        $data = $request->param();
        $result = AdminModel::login($data['username'],$data['password']);
        if($result === false){
            $e = new LoginFailedException();
            $this->error($e->msg);
        }else{
            return $this->success('登录成功','/index');
        }
    }

    /**
     * 登出操作
     */
    public function logout()
    {
        $result = AdminModel::logout();
        if($result === true){
            $this->redirect('/login');
        }else{
            echo 'false';
        }
    }
}
