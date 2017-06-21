<?php
namespace app\library\exception;

use think\Exception;

class BaseException extends Exception
{
    // http status code
    public $code = 400;
    // error message
    public $msg = 'parameter error';
    // error code
    public $error_code = 10000;

    // constructor
    public function __construct($params = [])
    {
        if(!is_array($params)){
            return ;
        }
        if(array_key_exists('code',$params)){
            $this->code = $params['code'];
        }
        if(array_key_exists('msg',$params)){
            $this->msg = $params['msg'];
        }
        if(array_key_exists('error_code',$params)){
            $this->error_code = $params['error_code'];
        }
    }
}