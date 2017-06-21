<?php
namespace app\library\exception;

class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求的Banner不存在';
    public $error_code = 40000;
}