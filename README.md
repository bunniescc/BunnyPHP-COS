# BunnyPHP Tencent COS Storage Component

Tencent COS Storage for BunnyPHP

[![Version](https://img.shields.io/packagist/v/ivanlulyf/bunnyphp-cos.svg?color=orange&style=flat-square)](https://packagist.org/packages/ivanlulyf/bunnyphp-cos)
[![Total Downloads](https://img.shields.io/packagist/dt/ivanlulyf/bunnyphp-cos.svg?color=brightgreen&style=flat-square)](https://packagist.org/packages/ivanlulyf/bunnyphp-cos)
![License](https://img.shields.io/packagist/l/ivanlulyf/bunnyphp-cos.svg?color=blue&style=flat-square)

English | [中文](README_CN.md)

## Install

```shell
composer require ivanlulyf/bunnyphp-cos
```

## Configure

```php
"storage" => [
	"name" => "bunny.cos",
	"secretId" => "",           // replace to your Tencent Cloud secretId
	"secretKey" => "",          // replace to your Tencent Cloud secret
	"region" => "",             // replace to your COS region
	"bucket" => "",             // replace to your COS bucket
	"url" => "",                // replace to your COS access url
],
```