<?php

namespace xltxlm\template\VUE;


/**
 * vue2.x;
 */
class VUE_Js extends VUE_Js\VUE_Js_implements
{
    protected static $Component = [];

    public function getComponents(): array
    {
        return self::$Component;
    }

    public function setComponents_Row($type = self::CSS, $Components)
    {
        self::$Component[$type][] = $Components;
        return parent::setComponents_Row($Components);
    }


    public function __invoke()
    {
        ?>
        <script src="<?= \xltxlm\template\Resource\Resource_implements::VUE ?>"></script>
        <?php
    }

    public function ShowTime()
    {
        //循环输出css内容
        ob_start(function ($css) {
            $css = preg_replace('#\/\*[^*]*\*+([^/][^*]*\*+)*\/#isU', '', $css);  // 清除块级注释
            $css = str_replace(array('<!--', '-->'), '', $css);
            $css = str_replace(array("\r", "\r", "", "\t"), '', $css); // 清除换行、缩进
            $css = preg_replace("/\s(?=\s)/", '', $css); // 连续的空格替换为一个空格
            $css = preg_replace("#\s*(:|;|\{|\})\s*#", "$1", $css); // 清除一些特定字符前后的空格，这里是可以扩展的，可以根据你的实际情况，添加或删除某些字符
            return "\n<style>" . $css . "</style>\n";
        });
        foreach (self::$Component[self::CSS] as $cssfile) {
            ob_start();
            include $cssfile;
            $css = ob_get_clean();
            //加上名字作为css的前缀,防止冲突
            $basename = current(explode('vue.', basename($cssfile)));
            $csss = explode("\n", $css);
            foreach ($csss as $key => $css) {
                $line = trim($css);
                if ($line && substr($line, -1) == '{') {
                    $csss[$key] = "[css-{$basename}] " . $line;
                }
            }
            echo join("\n", $csss);
        }
        ob_end_flush();

        //输出组件js的内容
        foreach (self::$Component[self::JS] as $jscode) {
            if ($jscode) {
                echo $jscode . "\n";
            }
        }
        ?>
        <script type="application/javascript">
            var vue = new Vue(
                {}
            ).$mount('#<?=$this->getAppid()?>');
        </script>
        <?php
    }

}