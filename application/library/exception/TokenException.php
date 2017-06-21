<?php
namespace app\library\exception;

class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token 已过期';
    public $error_code = 10001;
}