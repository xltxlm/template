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
    /** @var string 模板文件路径,如果没有指定,那么用类的同名模板文件 */
    protected $HtmlTemplate = '';

    /**
     * @param string $HtmlTemplate
     *
     * @return static
     */
    public function setHtmlTemplate(string $HtmlTemplate)
    {
        $this->HtmlTemplate = $HtmlTemplate;

        return $this;
    }

    /**
     * 在 runinvoke 里面,此方法跑到调用类的所有方法后面.
     */
    final protected function getHtmlTemplate()
    {
        if (!empty($this->HtmlTemplate)) {
            eval("include '$this->HtmlTemplate';");
        } else {
            $filepath = (new \ReflectionClass(static::class))->getFileName();
            $filepath = strtr($filepath, ['.php' => '.tpl.php']);
            eval("include '$filepath';");
        }
    }
}
