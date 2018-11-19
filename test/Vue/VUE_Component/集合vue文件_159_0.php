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
        ?>
        <?php
        $vtest = new vtest();
        $vtest->getVueJs();
        ?>
        <<?= $vtest->getclassName_pinyin() ?>></<?= $vtest->getclassName_pinyin() ?>>
        <?php
        (new VUE_Js())->ShowTime();
        p(htmlspecialchars(ob_get_clean()));
    }
}
