<?php

namespace Bunny\Storage;

use BunnyPHP\Storage;
use BunnyPHP\View;
use Exception;
use Qcloud\Cos\Client;

class CosStorage implements Storage
{
    protected $cosClient;
    protected $secretId;
    protected $secretKey;
    protected $region;
    protected $bucket;
    protected $url;

    public function __construct($config)
    {
        $this->secretId = $config['secretId'];
        $this->secretKey = $config['secretKey'];
        $this->region = $config['region'];
        $this->bucket = $config['bucket'];
        $this->url = $config['url'];

        $conf = [
            'region' => $this->region,
            'credentials' => [
                'secretId' => $this->secretId,
                'secretKey' => $this->secretKey,
            ],
        ];
        if (isset($config['token'])) {
            $conf['credentials']['token'] = $config['token'];
        }
        $this->cosClient = new Client($conf);
    }

    public function read($filename)
    {
        $res = $this->cosClient->getObject([
            'Bucket' => $this->bucket,
            'Key' => $filename,
        ]);
        if ($res && isset($res['Body'])) {
            return $res['Body'];
        } else {
            return false;
        }
    }

    public function write($filename, $content)
    {
        try {
            $res = $this->cosClient->putObject([
                'Bucket' => $this->bucket,
                'Key' => $filename,
                'Body' => $content,
            ]);
            if ($res) {
                return $this->url . $filename;
            } else {
                return false;
            }
        } catch (Exception $e) {
            View::error(['tp_error_msg' => $e->getMessage()]);
            return false;
        }
    }

    public function upload(string $filename, string $path): string
    {
        try {
            $res = $this->cosClient->putObject([
                'Bucket' => $this->bucket,
                'Key' => $filename,
                'Body' => fopen($path, 'rb'),
            ]);
            if ($res) {
                return $this->url . $filename;
            } else {
                return false;
            }
        } catch (Exception $e) {
            View::error(['tp_error_msg' => $e->getMessage()]);
            return false;
        }
    }

    public function remove($filename): bool
    {
        if (strpos($filename, $this->url) === 0) {
            $filename = substr($filename, strlen($this->url));
        }
        try {
            $res = $this->cosClient->deleteObject(array(
                'Bucket' => $this->bucket,
                'Key' => $filename,
            ));
            return !!$res;
        } catch (Exception $e) {
            View::error(['tp_error_msg' => $e->getMessage()]);
            return false;
        }
    }
}