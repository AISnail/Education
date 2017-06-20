<?php
namespace app\library\exception;

class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $error_code = 70000;
}