<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/29
 * Time: 9:40.
 */

namespace xltxlm\template;

use xltxlm\fileinfo\Fileinfo;

/**
 * 把类转换成模板类
 * Class HtmlTemplate.
 */
trait HtmlTemplate
{
    use HtmlTemplate\HtmlTemplate_implements;

    /**
     * 在 runinvoke 里面,此方法跑到调用类的所有方法后面.
     */
    protected function getHtmlTemplate(): string
    {
        if ($this->HtmlTemplate === null) {
            throw (new \xltxlm\template\Exception\Exception_Filenot_Exist())
                ->setHtmlTemplate($this->HtmlTemplate);
        }
        if (empty($this->HtmlTemplate) == false) {
            eval("include '$this->HtmlTemplate';");
            return '';
        } else {
            $filepathold = (new \ReflectionClass(static::class))->getFileName();

            $filepath = strtr($filepathold, ['.php' => '.tpl.php']);
            if (is_file($filepath)) {
                eval("include '$filepath';");
                return $filepath;
            }

            $getFilename_no_Extension = (new Fileinfo($filepathold))
                ->getFilename_no_Extension();

            $filepath = dirname($filepath) . '/' . $getFilename_no_Extension . '/' . $getFilename_no_Extension . '.tpl.php';
            eval("include '$filepath';");
            if (is_file($filepath)) {
                return $filepath;
            } else {
                throw (new \xltxlm\template\Exception\Exception_Filenot_Exist())
                    ->setHtmlTemplate($this->HtmlTemplate);
            }
        }
    }
}
