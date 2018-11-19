<?php
namespace xltxlm\template\Vant\Vant_Js;

/**
 * 烟花效果.;
*/
abstract class Vant_Js_implements
{
    public const JS_URL="https://unpkg.com/vant/lib/vant.min.js";

    /**
    *  输出js链接样式;
    *  @return ;
    */
    abstract public function __invoke();
}
