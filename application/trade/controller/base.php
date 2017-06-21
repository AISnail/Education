<?php

namespace app\trade\controller;

use app\trade\helper\StaticInit;
use think\Controller;
use think\Request;

/**
 * base
 * @author    ShaoWei Pu <pushaowei0727@gmail.com>
 * @date      2017/6/20
 * @package   app\trade\controller
 * @license   Mozilla
 */
class base extends Controller
{
    /**
     * 前置操作
     * @param \think\Request $request
     */
    public function _initialize()
    {
        // 初始化前置操作
        parent::_initialize();
    }
}