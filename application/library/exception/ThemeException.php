<?php
namespace app\library\exception;

class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定主题不存在';
    public $error_code = 30001;
}