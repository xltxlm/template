<?php

namespace xltxlm\template\test\Vue\VUE_Component;

use xltxlm\template\VUE\VUE_Js;

/**
 *
 */
class 集合vue文件_159_0
{
    public function __invoke()
    {
        ob_start();
        (new VUE_Js())->__invoke();

        echo "\naaa\n";
        (new vtest())
            ->setValue('abc')
            ->setTitle(':outside_title')
            ->setCc('我有一只小毛驴')
            ->__invoke();
        echo "\nbbb\n";

        (new VUE_Js())->ShowTime();
        p(htmlspecialchars(ob_get_clean()));
    }
}
