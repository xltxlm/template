<?php

namespace xltxlm\template\test\Jquery\Jquery_Validate;

use xltxlm\template\Jquery\Jquery_Validate;

/**
 *
 */
class Jquery_Validate_128_0
{

    public function __invoke()
    {
        ob_start();
        (new Jquery_Validate())
            ->setlocalstyle(false)
            ->__invoke();
        $html = ob_get_clean();

        \xltxlm\helper\Util::d(htmlspecialchars($html));
    }

}

