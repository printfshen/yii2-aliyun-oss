<?php
/**
 * Created by PhpStorm.
 * User: sfs
 * Date: 2018/11/27
 * Time: 10:08
 */

namespace printfshen\yii2AliyunOss;


use OSS\OssClient;

class Oss
{
    public $_ossClient = "";
    public $bucket;

    private static $_instance = null;

    public static function getInstance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $ossConfig = \Yii::$app->params['oss'];
        $this->bucket = $ossConfig['bucket'];

        $this->_ossClient = new OssClient(
            $ossConfig['accessKeyId'],
            $ossConfig['accessKeySecret'],
            $ossConfig['endPoint']
        );
        if ($this->_ossClient == false) {
            throw new \Exception("无法链接");
        }
    }

    /**
     * 上传文件
     * @param $fileName 需上传的文件
     * @param $filePath 上传后路径
     * @return null
     * @throws \OSS\Core\OssException
     */
    public function uploadFile($fileName, $filePath)
    {
        return $this->_ossClient->uploadFile($this->bucket, $fileName, $filePath);
    }

    /**
     * 删除文件
     * @param $path
     * @return bool
     */
    public function deleteFile($path)
    {
        return $this->_ossClient->deleteObject($this->bucket, $path) === null;
    }

    /**
     * 查看文件是否存在
     * @param $path 不加域名的路径不带"/"
     */
    public function doesFileExist($path)
    {
        return $this->_ossClient->doesObjectExist($this->bucket, $path);
    }

}