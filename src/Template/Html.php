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
     * @param bool $mixins 当前的vue-js结构体,知否挂钩在vue的根变量上?
     * @return string
     */
    public function getJS($mixins = false): string
    {
        ob_start();
        $this->echoJS($mixins);
        return ob_get_clean();
    }

    /**
     * @param bool $mixins 当前的vue-js结构体,知否挂钩在vue的根变量上?
     * @return void
     */
    public function echoJS($mixins = false)
    {
        ?>
        <script type="application/javascript">
            <?php
            foreach ([
                         $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.js.php",
                         $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.js"
                     ] as $filepath) {

                ob_start();
                include $filepath;
                $js = trim(ob_get_clean());
                //空代码,没有配套的js代码
                if (empty($js)) {
                    continue;
                }
                if ($mixins) {
                    $js = "var " . (new \xltxlm\template\VUE\VUE_Js)->Makemixin() . " =" . $js;
                }
                //源代码上第一行存在 'var mixin =',是因为编辑器针对js文件排行问题,加上变量,排版就正确了
                echo (new JavaScriptPacker(strtr($js, ['<script>' => '', '</script>' => '', 'var mixin =' => '']), 'none', true, false))
                        ->pack() . ";\n";
            }
            ?>
        </script>
        <?php

    }

    /**
     * @return string
     */
    public function getCSS(): string
    {
        //循环输出css内容 -压缩
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
        $this->echoCSS();
        return $fixcss(ob_get_clean());
    }

    /**
     * @return void
     */
    public function echoCSS()
    {
        $filepath = $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.css.php";
        include $filepath;
    }


    /**
     * @return string
     */
    public function getHTML(): string
    {
        ob_start();
        $this->echoHTML();
        return ob_get_clean();
    }

    /**
     * @return void
     */
    public function echoHTML()
    {
        $filepath = $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.html.php";
        include $filepath;
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
