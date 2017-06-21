<?php
namespace app\library\exception;

class ProductException extends BaseException
{
    public $code = 404;
    public $msg = '指定商品不存在';
    public $error_code = 20000;
}