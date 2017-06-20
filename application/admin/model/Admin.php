<?php
namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    /**
     * 判断当前用户是否登录
     */
    static public function isLogin()
    {
        $user = session('user');
        if(empty($user)){
            return false;
        }else{
            return true;
        }
    }
    /**
     * 用户登录操作
     *
     */
    static public function login($username, $password)
    {
        $user = self::get(['username'=>$username]);
        if(is_null($user)){
            return false;
        }
        if($user->checkPWD($password) === false){
            return false;
        }
        session('user',$user);
        return true;
    }
    // 密码加密
    private function checkPWD($password)
    {
        $password = md5($password);
        if($this->getData('password') === $password){
            return true;
        }else{
            return false;
        }
    }

     /**
      * 
      *
      */
     static public function logout()
     {
         session('user',null);
         $user = session('user');
         if(is_null($user)){
             return true;
         }else{
             return false;
         }
     }

     /**
      * 获取用户信息
      */
     static public function info($id)
     {
         $user = self::find($id);
         if($user){
            return $user;
         }else{
             return false;
         }
     }

     /**
      * 获取管理员列表
      */
     static public function getAllUser()
     {
         $users = User::all();
         return $users;
     }
}