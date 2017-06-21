<?php
namespace app\library\exception;

use \Exception;
use think\Request;
use think\exception\Handle;
use think\Log;
use think\Config;

class BaseHandle extends Handle
{
    private $code = 500;
    private $msg = '内部错误';
    private $error_code = 999;

    //异常信息接管
    public function render(\Exception $e)
    {
        if($e instanceof BaseException){
            // 自定义异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->error_code = $e->error_code;
        }else{
            // 非自定义异常
            if(config('app_debug')){
                //DEBUG 模式返回tp框架返回异常
                return parent::render($e);
            }else{
                //非debug 模式记录日志
                $this->recordErrorLog($e);                
            }
        }
        $request = Request::instance();
        
        $result = [
            'msg' => $this->msg, //错误信息
            'error_code' => $this->error_code, // 错误代码
            'request_url' => $request->url() // 发生错误的url
            'request_ip' => $request->ip()
        ];
        return json($result);
    }

    private function recordErrorLog(Exception $e)
    {
        Log::record($e->getMessage(),'error');
    }
}