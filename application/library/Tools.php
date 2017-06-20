<?php
namespace app\library;

/**
 * Tools
 * @author   ShaoWei Pu <pushaowei0727@gmail.com>
 * @date     2017/6/20
 * @license  Mozilla
 */
class Tools
{
    /**
     * 静态输出
     * @return string
     */
    public static function style(){
        $cssTag = "?v=".STATIC_VESION;
        $res = func_get_args();
        if (count($res) != count($res, 1)) {
            $res = $res[0];//如果不是一维数组转成一维
        }
        $styleArray = array_map(function ($aliases) use ($cssTag) {
            if($aliases){
                return '<link href="'.__STATIC__.$aliases.$cssTag.'" rel="stylesheet" />'.PHP_EOL;
            }
        }, $res);
        return implode('', array_filter($styleArray));
    }
    /**
     * 静态输出
     * @return string
     */
    public static function script(){
        $cssTag = "?v=".STATIC_VESION;
        $res = func_get_args();
        if (count($res) != count($res, 1)) {
            $res = $res[0];//如果不是一维数组转成一维
        }
        $styleArray = array_map(function ($aliases)use($cssTag) {
            if($aliases){
                return '<script src="'.__STATIC__.$aliases.$cssTag.'" ></script>'.PHP_EOL;
            }
        }, $res);
        return implode('', array_filter($styleArray));
    }
}