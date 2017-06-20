<?php
namespace app\api\validate;

/*
 * 验证ID 是否存在并且为正整数
 *
 *
 */
class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
    ];

    protected $message = [
        'id' => '必须为正整数'
    ];
}