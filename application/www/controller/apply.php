<?php

namespace app\www\controller;

use think\Controller;
use think\Request;

class apply extends base
{
    public function verify(Request $request)
    {
        if( $request->isPost() ){
            // 这里获取提交订单 并跑到trade 下去
            $this->redirect('trade/checkout/start',['payment'=>'offline']);
        }
        return  $this->fetch('verify');
    }

    public function triumph()
    {
        return $this->fetch('triumph');
    }
}