#!/usr/bin/php
<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2018/11/5
 * Time: 下午3:03
 */

use xltxlm\template\Resource\Resource_implements;
use xltxlm\url\Urlinfo;

eval('include_once "./vendor/autoload.php";');
include __DIR__ . '/vendor/xltxlm/template/src/Resource/Resource_implements.php';
include __DIR__ . '/vendor/xltxlm/url/src/Basic/UrlTrait/UrlTrait_implements.php';
include __DIR__ . '/vendor/xltxlm/url/src/Basic/UrlTrait.php';
include __DIR__ . '/vendor/xltxlm/url/src/Urlinfo/Urlinfo_implements.php';
include __DIR__ . '/vendor/xltxlm/url/src/Urlinfo.php';

$getConstants = (new \ReflectionClass(Resource_implements::class))
    ->getConstants();
foreach ($getConstants as $getConstant) {
    $getpath = (new Urlinfo($getConstant))
        ->getpath();
    $getConstants_new = "/Siteroot/localstyle/" . $getpath;
    echo "mkdir -p ." . dirname($getConstants_new) . "\n";
    echo "wget {$getConstant} -O .$getConstants_new\n";
}