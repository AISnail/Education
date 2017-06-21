<?php
namespace app\library\exception;

class WechatException extends BaseException
{
    public $code = 400;
    public $msg = '微信服务器接口调用失败';
    public $error_code = 999;
}