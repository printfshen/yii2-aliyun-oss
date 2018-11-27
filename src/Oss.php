<?php
/**
 * Created by PhpStorm.
 * User: ehailuo
 * Date: 2018/11/27
 * Time: 10:08
 */

namespace sfs\yii2AliyunOss;


use OSS\OssClient;

class Oss
{
    public $_ossClient = "";
    private static $_instance = null;

    public static function getInstance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = self::$_instance;
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $ossConfig = \Yii::$app->oss;
        var_dump($ossConfig);exit;
        $this->_ossClient = new OssClient($this->accessKeyId, $this->accessKeySecret, $this->baseUrl);
    }



}