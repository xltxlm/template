<?php

namespace xltxlm\template\Jquery;

use xltxlm\template\Resource\Resource_Local;


/**
 * 表单校验;
 */
class Jquery_Validate extends Jquery_Validate\Jquery_Validate_implements
{
    public function __invoke()
    {
        if ($this->getlocalstyle() == true) {
            ob_start();
        }
        ?>
        <script src="<?= \xltxlm\template\Resource\Resource_implements::VALIDATE ?>"></script>
        <script src="<?= \xltxlm\template\Resource\Resource_implements::VALIDATE_METHODS ?>"></script>
        <?php
        if ($this->getlocalstyle() == true) {
            echo (new Resource_Local(ob_get_clean()))
                ->__invoke();
        }

    }


}