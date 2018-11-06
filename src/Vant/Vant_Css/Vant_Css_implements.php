<?php
namespace xltxlm\template\Vant\Vant_Css;

/**
 * 有赞样式的维护-废弃;
*/
abstract class Vant_Css_implements
{
    public const CSS_URL="https://unpkg.com/vant/lib/index.css";



    /**
     *   输出css的样式链接;
     *   @return ;
    */
    abstract public function __invoke();

}