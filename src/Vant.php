<?php

namespace xltxlm\template;

use xltxlm\template\Resource\Resource_implements;

/**
 * 输出有赞样式框架必备的css,js;
 */
class Vant extends Vant\Vant_implements
{
    public function __invoke()
    {
        if ($this->getlocalstyle() == true) {
            ob_start();
        }
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <?php
        (new VUE\VUE_Js)();
        ?>
        <script src="<?= Resource_implements::VANTJS ?>"></script>
        <link rel="stylesheet" href="<?= Resource_implements::VANTCSS ?>">
        <?php
        (new Jquery\Jquery_Tool)();

        if ($this->getdebug() == true) {
            ?>
            <script src="<?= Resource_implements::MOBILE_DEBUG ?>"></script>
            <script>eruda.init();</script>
            <?php
        }
        if ($this->getlocalstyle() == true) {
            echo (new Resource\Resource_Local(ob_get_clean()))
                ->__invoke();
        }
    }


}