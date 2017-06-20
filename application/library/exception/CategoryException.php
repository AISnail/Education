<?php
namespace app\library\exception;

class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = '指定分类不存在';
    public $error_code = 50000;
}