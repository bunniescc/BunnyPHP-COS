# BunnyPHP 腾讯云COS存储组件

BunnyPHP的腾讯云COS存储组件

[![Version](https://img.shields.io/packagist/v/ivanlulyf/bunnyphp-cos.svg?color=orange&style=flat-square)](https://packagist.org/packages/ivanlulyf/bunnyphp-cos)
[![Total Downloads](https://img.shields.io/packagist/dt/ivanlulyf/bunnyphp-cos.svg?color=brightgreen&style=flat-square)](https://packagist.org/packages/ivanlulyf/bunnyphp-cos)
![License](https://img.shields.io/packagist/l/ivanlulyf/bunnyphp-cos.svg?color=blue&style=flat-square)

[English](README.md) | 中文

## 安装

```shell
composer require ivanlulyf/bunnyphp-cos
```

## 配置

```php
"storage" => [
	"name" => "bunny.cos",
	"secretId" => "",           // 替换成你的腾讯云secretId
	"secretKey" => "",          // 替换成你的腾讯云secret
	"region" => "",             // 替换成你的COS所属地域
	"bucket" => "",             // 替换成你的bucket
	"url" => "",                // 替换成你的外部访问地址
],
```