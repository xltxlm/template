<?php

namespace xltxlm\template\VUE;

use GK\JavascriptPacker;
use ReflectionProperty;
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
        ob_start();
        $filepath = $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.html.php";
        include $filepath;
        $html = $this->去掉注释(ob_get_clean());
        //$html = ob_get_clean();
        //第一个根元素,加上组件的名字,防止css跨组件冲突
        $lines = explode("\n", $html);
        foreach ($lines as $key => $line) {
            $line = trim($line);
            if ($line && substr($line, -1) == '>') {
                //$lines[$key] = substr($line, 0, -1) . " css-{$this->getclassName_pinyin()} >";
                $lines[$key] = $line;
                break;
            }
        }
        $html = join("\n", $lines);
        $vuehtml = strtr($html,
            [
                "\r" => "",
                "\n" => "",
                '"' => '\\"',
                '\\' => '\\\\',
            ]);
        p($vuehtml);
        return $vuehtml;
    }

    public function __invoke()
    {
        //只输出组件,不辅助输出html
        if ($this->isonlyLibs()) {
            $this->getVueJs();
            return '';
        }
        //循环当前类扩展的属性.输出成属性. 如果是冒号:开头的,那么就是变量绑定,否则是字符串绑定
        $reflectionClass = new \ReflectionClass($this);
        $reflectionProperties = $reflectionClass->getProperties(ReflectionProperty::IS_PROTECTED);
        //绑定键值对的数组
        $reflectionProperties_news = [];
        foreach ($reflectionProperties as $reflectionProperty) {
            $name = $reflectionProperty->getName();
            $reflectionProperty->setAccessible(true);
            $value = $reflectionProperty->getValue($this);
            //必须存在get,set函数
            if (strlen($value) == 0 || !method_exists($this, 'get' . $name) || !method_exists($this, 'set' . $name)) {
                continue;
            }

            if ($value[0] == ':') {
                $name = ':' . $name;
                $value = addcslashes(substr($value, 1), '\\');
            }
            //特殊的绑定名称.value会被改成model
            if ($name == 'value') {
                $name = "v-model";
            }
            $reflectionProperties_news[] = "$name='$value'";
        }
        ?>
        <<?= $this->getclassName_pinyin() ?> <?= join(" ", $reflectionProperties_news) ?>>
        <?php

        $this->getVueJs();

        ?>
        </<?= $this->getclassName_pinyin() ?>>
        <?php
    }


    /**
     */
    protected function getVueJs()
    {
        static $haverun = false;
        if ($haverun) {
            return '';
        }
        $haverun = true;
        //如果存在css,那么赋给vue_js.在结尾的时候输出
        $cssfile = $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.css.php";
        if (is_file($cssfile)) {
            (new VUE_Js())->setComponents_Row(VUE_Js::CSS, $cssfile);
        }
        ob_start();

        //循环当前类扩展的属性.输出成属性. 如果是冒号:开头的,那么就是变量绑定,否则是字符串绑定
        $reflectionClass = new \ReflectionClass($this);
        $reflectionProperties = $reflectionClass->getProperties(ReflectionProperty::IS_PROTECTED);
        //绑定键值对的数组
        $reflectionProperties_news = [];
        foreach ($reflectionProperties as $reflectionProperty) {
            $name = $reflectionProperty->getName();
            $reflectionProperties_news[] = "'{$name}'";
            //必须存在get,set函数
            if (!method_exists($this, 'get' . $name) || !method_exists($this, 'set' . $name)) {
                continue;
            }

            //特殊的绑定名称.value会被改成model
            if ($name == 'value') {
                continue;
            }
        }
        //去掉父级类的属性
        $reflectionClass = new \ReflectionClass(VUE_Component::class);
        $reflectionProperties = $reflectionClass->getProperties(ReflectionProperty::IS_PROTECTED);
        $reflectionProperties_news_unset = [];
        foreach ($reflectionProperties as $reflectionProperty) {
            $name = $reflectionProperty->getName();
            $reflectionProperties_news_unset[] = "'{$name}'";
        }
        $reflectionProperties_news = array_diff($reflectionProperties_news, $reflectionProperties_news_unset);
        ?>
        <script type="application/javascript">
            Vue.component("<?=$this->getclassName_pinyin()?>", {
                props: [<?=join(',', $reflectionProperties_news)?>],
                template: "<?=$this->getVueHtml()?>",
        <?php
        ob_start();
        include $this->getclass_dir() . "/{$this->getclassName()}/{$this->getclassName()}vue.js.php";
        //压缩输出
        echo (new JavaScriptPacker(ob_get_clean(), 'none', true, false))->pack();
        //不压缩输出
        //echo ob_get_clean();
        echo "});</script>";
        //交给vue-showtime的时候展示
        (new VUE_Js())->setComponents_Row(VUE_Js::JS, ob_get_clean());
    }

    protected function 去掉注释($html)
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
            if (strpos($trim, '<!--') === 0 && strpos($trim, '-->') === strlen($trim)-3) {
                continue;
            }

            $split_new[] = $item;
        }
        $html = join("\n", $split_new);
        return $html;
    }
}
