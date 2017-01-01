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
    /**
     * 在 runinvoke 里面,此方法跑到调用类的所有方法后面.
     */
    final protected function getHtmlTemplate()
    {
        $filepath = (new \ReflectionClass(static::class))->getFileName();
        $filepath = strtr($filepath, ['.php' => '.tpl.php']);
        eval("include '$filepath';");
    }
}
