<?php
namespace app\admin\validate;

class Admin extends BaseValidate
{
    protected $rule = [
        ['username','require|alphaNum|max:20|unique:admin','用户名不能为空|用户名只能为字母和数字|用户名最长为20个字符|用户名已存在'],
        ['password','require|alphaNum','密码不能为空|密码只能为字母和数字'],
        ['repassword','require|confirm:password','确认密码不能为空|两次密码输入不一致'],
    ];
}