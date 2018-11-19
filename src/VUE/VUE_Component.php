<?php

namespace xltxlm\template\VUE;

use xltxlm\classinfo\Classinfo;
use xltxlm\str\Features\Str_To_Pinyin;
use xltxlm\str\Str;

/**
 * 提供vue的基础手脚架函数;
 */
trait VUE_Component
{
    use VUE_Component\VUE_Component_implements;

    protected function Real_getclassName(): string
    {
        return (new Classinfo())
            ->setFull_Class_Name(static::class)
            ->getName_no_Namespace();
    }

    protected function Real_getclassName_pinyin(): string
    {
        $name = strtolower((new Str_To_Pinyin())
            ->setValue(
                (new Classinfo())
                    ->setFull_Class_Name(static::class)
                    ->getName_no_Namespace()
            )
            ->setGlue('')
            ->__invoke());
        return $name;
    }

    protected function Real_getclass_dir(): string
    {
        return dirname((new \ReflectionClass(static::class))
            ->getFileName());
    }


    protected function Real_getVueHtml(): string
    {
        ob_start(function ($html) {
            return strtr($html,
                [
                    "\r" => "",
                    "\n" => "",
                    '"' => '\\"',
                    '\\' => '\\\\',
                ]);
        });
        $filepath = $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.html.php";
        include $filepath;
        $html = ob_get_clean();
        return $html;
    }

    public function getVueJs(): string
    {
        //如果存在css,那么赋给vue_js.在结尾的时候输出
        $cssfile = $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.css.php";
        if (is_file($cssfile)) {
            (new VUE_Js())->setComponents_Row($cssfile);
        }
        ?>
        <script type="application/javascript">
            Vue.component("<?=$this->getclassName_pinyin()?>", {
                template: "<?=$this->getVueHtml()?>",
        <?php
        ob_start([$this, '去掉注释']);
        include $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.js.php";
        ob_end_flush();
        echo "});</script>";

        return '';
    }

    private function 去掉注释($html)
    {
        $split = (new Str($html))
            ->Split("\n")
            ->getValues();
        $split_new = [];
        foreach ($split as $item) {
            $trim = trim($item);
            if ($trim[0] == '/' && $trim[1] == '/') {
                continue;
            }

            $split_new[] = $item;
        }
        $html = join("\n", $split_new);
        return $html;
    }
}
