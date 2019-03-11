<?php

namespace xltxlm\template\Template;

use \xltxlm\classinfo\Classinfo;
use \GK\JavascriptPacker;

/**
 * 常规的html形式输出css,js,html;
 */
trait Html
{
    use Html\Html_implements;

    /**
     * @return string
     */
    public function getJS(): string
    {
        ob_start();
        ?>
        <script type="application/javascript">
            <?php
            $filepath = $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.js.php";
            include $filepath;
            echo (new JavaScriptPacker(ob_get_clean(), 'none', true, false))
                ->pack();
            ?>
        </script>
        <?php
        return ob_get_clean();
    }

    /**
     * @return string
     */
    public function getCSS(): string
    {
        //循环输出css内容
        $fixcss = function ($css) {
            $css = preg_replace('#\/\*[^*]*\*+([^/][^*]*\*+)*\/#isU', '', $css);  // 清除块级注释
            $css = str_replace(array('<!--', '-->'), '', $css);
            $css = str_replace(array("\r", "\r", "", "\t"), '', $css); // 清除换行、缩进
            $css = preg_replace("/\s(?=\s)/", '', $css); // 连续的空格替换为一个空格
            $css = preg_replace("#\s*(:|;|\{|\})\s*#", "$1", $css); // 清除一些特定字符前后的空格，这里是可以扩展的，可以根据你的实际情况，添加或删除某些字符
            if ($css) {
                return "\n<style>" . $css . "</style>\n";
            } else {
                return '';
            }
        };
        ob_start();
        $filepath = $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.css.php";
        include $filepath;
        return $fixcss(ob_get_clean());
    }


    /**
     * @return string
     */
    public function getHTML(): string
    {
        ob_start();
        $filepath = $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.html.php";
        include $filepath;
        return ob_get_clean();
    }

    /**
     * @return string
     */
    protected function Real_getclass_dir(): string
    {
        return dirname((new \ReflectionClass(static::class))
            ->getFileName());
    }

    /**
     * @return string
     */
    protected function Real_getclassName(): string
    {
        return (new Classinfo())
            ->setFull_Class_Name(static::class)
            ->getName_no_Namespace();
    }


}
