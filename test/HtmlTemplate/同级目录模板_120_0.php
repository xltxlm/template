<?php

namespace xltxlm\template\test\HtmlTemplate;

use xltxlm\template\HtmlTemplate;

/**
 *
 */
class 同级目录模板_120_0
{

    public function __invoke()
    {
        $a = new class extends \stdClass
        {
            use HtmlTemplate;

            public function __invoke()
            {
                $path = $this->getHtmlTemplate();
                \xltxlm\helper\Util::d($path);
            }
        };
        $a->__invoke();
    }

}

