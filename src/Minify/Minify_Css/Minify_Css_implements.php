<?php
namespace xltxlm\template\Minify\Minify_Css;

/**
 * :类;
 * 资源压缩,采用ob_start括起来输出;
*/
abstract class Minify_Css_implements
{


/**
*  输出内容;
*  @return ;
*/
abstract public function __invoke();
}