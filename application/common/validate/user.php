<?php

namespace app\common\validate;

use think\Validate;
/**
 * user
 * @author   ShaoWei Pu <pushaowei0727@gmail.com>
 * @date     2017/6/19
 * @license  Mozilla
 */
class user extends Validate
{
    protected $id   = '';
    protected $rule = [
        ['name',"require|max:25|unique:user" ],
        ['email','email|unique:user'],
        ['mobile','/^1[34578][0-9]{9}$/|unique:user','手机号错误|手机号已注册'],
    ];
    protected $message = [
        'name.require'   =>  '姓名不能为空',
        'name.max'    =>  '姓名最多不能超过25个字符',
        'name.unique'    =>  '已存在此姓名',
        'email.email'    =>  '邮箱格式错误',
        'email.unique'   =>  '邮箱已注册',
        'mobile.unique'  =>  '手机号已注册',
        'mobile.regx'    =>  '手机号错误',
    ];

    protected $scene = [
        'edit'  =>  ['name','email','mobile'],
    ];
}