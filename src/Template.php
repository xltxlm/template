<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 下午 12:17.
 */

namespace xltxlm\template;


/**
 * 文件模板基类
 * Class template.
 */
abstract class Template
{
    /** @var string 模板的文件路径 */
    protected $HtmlTemplate = '';
    /** @var string 保存的文件 */
    protected $saveToFileName = '';

    /**
     * @param string $saveToFileName
     * @return Template|static
     */
    final public function setSaveToFileName($saveToFileName): Template
    {
        $this->saveToFileName = $saveToFileName;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getHtmlTemplate()
    {
        if (empty($this->HtmlTemplate)) {
            $fileName = (new \ReflectionClass(static::class))->getFileName();
            $this->HtmlTemplate = dirname($fileName) . DIRECTORY_SEPARATOR . basename($fileName, '.php') . '.tpl.php';
        }
        if (is_file($this->HtmlTemplate) == false) {
            throw (new Exception\Exception_Filenot_Exist)
                ->setHtmlTemplate($this->HtmlTemplate);
        }

        return $this->HtmlTemplate;
    }

    /**
     * @param string $HtmlTemplate
     * @return Template|static
     */
    public function setHtmlTemplate(string $HtmlTemplate): Template
    {
        $this->HtmlTemplate = $HtmlTemplate;

        return $this;
    }

    /**
     * 运行模板，如果没有指定保存的文件，那么直接输出.
     *
     * @return string
     */
    public function __invoke()
    {
        ob_start();
        eval("include '" . $this->getHtmlTemplate() . "';");
        $ob_get_clean = ob_get_clean();
        if ($this->saveToFileName) {
            if (file_get_contents($this->saveToFileName) != $ob_get_clean) {
                file_put_contents($this->saveToFileName, $ob_get_clean);
            }
        } else {
            return $ob_get_clean;
        }

        return '';
    }
}
