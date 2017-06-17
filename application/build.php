<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // 生成应用公共文件
    '__file__' => ['common.php', 'config.php'],

    // Trade 模块
    'trade'     => [
        '__file__'   => ['init.php','error.php'],
        '__dir__'    => ['cert','helper','controller', 'model', 'view'],
        'controller' => ['index'],
        'model'      => ['user'],
        'view'       => ['index/index'],
    ],
    // 前台模块
    'www'     => [
        '__file__'   => ['init.php','error.php'],
        '__dir__'    => ['helper','controller', 'model', 'view'],
        'controller' => ['index'],
        'model'      => ['user'],
        'view'       => ['index/index'],
    ],
    // 后台模块
    'admin'     => [
        '__file__'   => ['init.php','error.php'],
        '__dir__'    => ['helper','controller', 'model', 'view'],
        'controller' => ['index'],
        'model'      => ['user',],
        'view'       => ['index/index'],
    ],
    // 公共接口模块
    'common'     => [
        '__file__'   => ['init.php','error.php'],
        '__dir__'    => ['helper','controller', 'model', 'view'],
        'controller' => ['index'],
        'model'      => ['user',],
        'view'       => ['index/index'],
    ],
    // 其他更多的模块定义
];
