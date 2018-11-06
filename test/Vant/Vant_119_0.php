<?php

namespace xltxlm\template\test\Vant;

use xltxlm\template\Vant;

/**
 *
 */
class Vant_119_0
{

    public function __invoke()
    {
        ob_start();
        (new Vant())();
        $html = ob_get_clean();

        \xltxlm\helper\Util::d(htmlspecialchars($html));
    }

}

