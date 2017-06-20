<?php

namespace app\www\helper;

/**
 * StaticInit
 * @author   ShaoWei Pu <pushaowei0727@gmail.com>
 * @date     2017/6/20
 * @license  Mozilla
 */
trait StaticInit
{
    public function options( $page )
    {
        $common = [
            'style'  => [
                'css/base.css',
                'css/style-min.css',
            ],
            'script' => [
                'js/jquery-1.7.2.min.js',
            ]
        ];
        switch ( $page ) {
            case 'meeting.index':
                $options = [
                    'title'       => '中国高等教育学会-分支机构',
                    'keywords'    => '',
                    'description' => '',
                    'style'       => [

                    ],
                    'script'      => [

                    ]
                ];
                break;
            case 'user.register':
                $options = [
                    'title'       => '中国高等教育学会-用户注册',
                    'keywords'    => '',
                    'description' => '',
                    'style'       => [

                    ],
                    'script'      => [

                    ]
                ];
                break;
            default:
                break;
        }
        if ( isset($options) ) {
            return array_merge_recursive($common, $options);
        }
    }
}