<?php
namespace app\admin\validate;

use think\Validate;
use think\Request;

use app\library\exception\ParameterException;

class BaseValidate extends Validate
{

    protected $message = [
        'isPositiveInteger' => '参数必须为正整数'
    ];

    public function goCheck()
    {
        $request = Request::instance();
        $data = $request->param();
        $result = $this->check($data);
        return $result;
        // if($result == false){
        //     $e = new ParameterException([
        //         'msg' => $this->error
        //     ]);
        //     throw $e;
        // }else{
        //     return true;
        // }
    }

    //正整数
    protected function isPositiveInteger($value,$rule='',$data='',$field='')
    {
        if(is_numeric($value) && is_int($value + 0) && ($value + 0) > 0){
            return true;
        }else {
            return false;
        }
    }
    //非空值
    protected function isNotEmpty($value, $rule='', $data='', $field='')
    {
        if(empty($value)){
            return false;
        }else{
            return true;
        }
    }
    //手机号
    protected function isMobile($value, $rule='', $data='', $field='')
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function getDataByRule($array)
    {
        if(array_key_exists('user_id',$array) | array_key_exists('uid', $array)){
            throw new ParameterException([
                'msg' => '包含非法参数 user_id uid'
            ]);
        }
        $newArray = [];
        foreach ($this->rule as $key => $value) {
            $newArray[$key] = $array[$key];
        }
        return $newArray;
    }
}