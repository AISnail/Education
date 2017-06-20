<?php

namespace app\trade\helper;

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
            case 'checkout.wait':
                $options = [
                    'title'       => '中国高等教育学会-提交订单',
                    'keywords'    => '',
                    'description' => '',
                    'style'       => [

                    ],
                    'script'      => [

                    ]
                ];
                break;
        }
        switch ( $page ) {
            case 'apply.triumph':
                $options = [
                    'title'       => '中国高等教育学会-提交订单',
                    'keywords'    => '',
                    'description' => '',
                    'style'       => [

                    ],
                    'script'      => [

                    ]
                ];
                break;
        }
        if ( isset($options) ) {
            return array_merge_recursive($common, $options);
        }
    }
}