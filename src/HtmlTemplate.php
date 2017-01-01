<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/29
 * Time: 9:40.
 */

namespace xltxlm\template;

/**
 * 把类转换成模板类
 * Class HtmlTemplate.
 */
trait HtmlTemplate
{
    private static $browserSync = false;

    /**
     * 在 runinvoke 里面,此方法跑到调用类的所有方法后面.
     */
    final protected function getHtmlTemplate()
    {
        $filepath = (new \ReflectionClass(static::class))->getFileName();
        $filepath = strtr($filepath, ['.php' => '.tpl.php']);
        eval("include '$filepath';");
        if (!self::$browserSync && $_SERVER['SERVER_PORT'] == 3000) {
            echo '<script id="__bs_script__">/*<![CDATA[*/ ' .
                'document.write("<script async src=\'/browser-sync/browser-sync-client.js?v=2.18.5\'><\/script>"' .
                '.replace("HOST", location.hostname)); //]]></script>';
            self::$browserSync = true;
        }
    }
}
