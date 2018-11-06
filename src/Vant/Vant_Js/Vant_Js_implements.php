<?php
namespace xltxlm\template\Vant\Vant_Js;

/**
 * 有赞样式的维护-废弃;
*/
abstract class Vant_Js_implements
{
    public const JS_URL="https://unpkg.com/vant/lib/vant.min.js";



    /**
     *   输出js链接样式;
     *   @return ;
    */
    abstract public function __invoke();

}