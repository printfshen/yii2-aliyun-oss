Yii2 Aliyun OSS
===============
Yii2 阿里云 OSS


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
        composer require printfshen/yii2-aliyun-oss
```

or add

```
        "printfshen/yii2-aliyun-oss": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

在params.php添加配置  :

```php
    'oss' => [
        'accessKeyId' => 'accessKeyId',
        'accessKeySecret' => 'accessKeySecret',
        'bucket' => 'bucket',
        'endPoint' => 'endPoint', 
    ],
```
用法  :
```php
 初始化 $oss = Oss::getInstance();
 上传   $oss->uploadFile($fileName, $filePath);
 删除   $oss->deleteFile($path);
 查看是否存在 $oss->doesFileExist($path);
        
        
```
