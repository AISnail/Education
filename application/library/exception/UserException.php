<?php
namespace app\library\exception;

class UserException extends BaseException
{
    public $code = 404;
    public $msg = '用户不存在';
    public $error_code = 60000;
}