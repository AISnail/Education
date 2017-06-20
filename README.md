Education
===============

[![StyleCI](https://styleci.io/repos/48530411/shield?style=flat&branch=master)](https://styleci.io/repos/48530411)
[![Build Status](https://travis-ci.org/top-think/framework.svg?branch=master)](https://travis-ci.org/top-think/framework)
[![codecov.io](http://codecov.io/github/top-think/framework/coverage.svg?branch=master)](http://codecov.io/github/github/top-think/framework?branch=master)
[![Total Downloads](https://poser.pugx.org/topthink/framework/downloads)](https://packagist.org/packages/topthink/framework)
[![Latest Stable Version](https://poser.pugx.org/topthink/framework/v/stable)](https://packagist.org/packages/topthink/framework)
[![Latest Unstable Version](https://poser.pugx.org/topthink/framework/v/unstable)](https://packagist.org/packages/topthink/framework)
[![License](https://poser.pugx.org/topthink/framework/license)](https://packagist.org/packages/topthink/framework)

ThinkPHP5在保持快速开发和大道至简的核心理念不变的同时，PHP版本要求提升到5.4，优化核心，减少依赖，基于全新的架构思想和命名空间实现，是ThinkPHP突破原有框架思路的颠覆之作，其主要特性包括：

## Need to do
1. Fork 本项目到你仓库
2. 克隆你自己仓库的项目到本地
3. `git remote add esc git@github.com:AISnail/Education.git` 添加远程地址
4. `git fetch esc`
5. `git merge esc/master`
6. https://www.kancloud.cn/manual/thinkphp5/122951

## Nginx
```
# Education-develop
server {
    listen       80;
    server_name  *.eschool.com;
    root        __PATH__/public;
    index  index.html index.htm index.php;
    location / {
        try_files $uri $uri/ /index.php?$args;
       	include     /usr/local/etc/nginx/conf.d/php-fpm;
        if (!-e $request_filename) {
          rewrite  ^(.*)$  /index.php?s=$1  last;
            break;
        }
       }
     location ~ .*\.php$ {
         fastcgi_split_path_info ^(.+\.php)(/.+)$;
         include /usr/local/etc/nginx/fastcgi.9001.conf;
    	   fastcgi_param  SCRIPT_FILENAME	__PATH__/public$fastcgi_script_name;
       }
}
```

## Preferences

* Editor
	- Code Style
		- Right margin 统一设为 120
		- PHP
			- set from (右上角小链接) -> Predifiend Style -> [PSR1/PSR2（必读）](http://www.php-fig.org/psr/psr-2/)
			- PHPDoc -> Align tag comments
* Plugins
	- Laravel Plugin
	- Blade Support
* Languages & Frameworks
	- PHP
		- PHP language level : 7

## Nav

- Code （提代码前要执行，建议录个 `Macros`）
	- Reformat Code
	- Optimize Imports