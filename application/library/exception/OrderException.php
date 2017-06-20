<?php
namespace app\library\exception;

class OrderException extends BaseException
{
    public $code = 404;
    public $msg = '订单错误';
    public $error_code = 80000;
}