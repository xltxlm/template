<?php

namespace xltxlm\template\VUE;

/**
 * 图片懒加载控件整体输出;
 */
class Lazyload extends Lazyload\Lazyload_implements
{
    /**
     * @return mixed
     */
    public function __invoke()
    {
        (New VUE_Js())
            ->setComponents_Row(VUE_Js::JS_FILE, __DIR__ . '/Lazyload/Lazyload.js.php');
    }

}
