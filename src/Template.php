<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 下午 12:17.
 */

namespace xltxlm\template;

use \xltxlm\template\Exception\FileNotExsistException;

/**
 * 文件模板基类
 * Class template.
 */
abstract class Template
{
    private static $browserSync = false;
    //控制器
    protected $ctroller;
    /** @var string 模板的文件路径 */
    protected $file = '';
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
     * @throws FileNotExsistException
     *
     * @return string
     */
    public function getFile()
    {
        if (empty($this->file)) {
            $fileName = (new \ReflectionClass(static::class))->getFileName();
            $this->file = dirname($fileName) . DIRECTORY_SEPARATOR . basename($fileName, '.php') . '.tpl.php';
        }
        if (!is_file($this->file)) {
            throw new FileNotExsistException('文件不存在:' . $this->file);
        }

        return $this->file;
    }

    /**
     * @param string $file
     * @return Template|static
     */
    public function setFile(string $file): Template
    {
        $this->file = $file;

        return $this;
    }

    /**
     * 运行模板，如果没有指定保存的文件，那么直接输出.
     *
     * @return string
     */
    final public function __invoke()
    {
        ob_start();
        eval("include '" . $this->getFile() . "';");
        if ($this->saveToFileName) {
            file_put_contents($this->saveToFileName, ob_get_clean());
        } else {
            if (!self::$browserSync && $_SERVER['SERVER_PORT'] == 3000) {
                echo '<script id="__bs_script__">/*<![CDATA[*/ ' .
                    'document.write("<script async src=\'/browser-sync/browser-sync-client.js?v=2.18.5\'><\/script>"' .
                    '.replace("HOST", location.hostname)); //]]></script>';
                self::$browserSync = true;
            }
            return ob_get_clean();
        }

        return '';
    }
}
