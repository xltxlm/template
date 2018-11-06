<?php

namespace xltxlm\template\test\Vant;

use xltxlm\template\Resource\Resource_implements;
use xltxlm\template\Vant;
use xltxlm\url\Urlinfo;

/**
 *
 */
class Vant_local_122_0
{

    public function __invoke()
    {
        ob_start();
        (new Vant())
            ->setlocalstyle(true)
            ->__invoke();
        $html = ob_get_clean();

        \xltxlm\helper\Util::d(htmlspecialchars($html));
    }

}

