<?php

namespace xltxlm\template\VUE;


/**
 * vue2.x;
 */
class VUE_Js extends VUE_Js\VUE_Js_implements
{

    public function __invoke()
    {
        ?>
        <script src="<?= \xltxlm\template\Resource\Resource_implements::VUE ?>"></script>
        <?php
    }


}