<?php

namespace xltxlm\template\Minify;

use GK\JavascriptPacker;


/**
 * 把js内容压缩成一行再返回;
 */
class Minify_JS extends Minify_JS\Minify_JS_implements
{
    /**
     * Minify_JS constructor.
     */
    public function __construct()
    {
        ob_start();
    }

    /**
     * @return mixed
     */
    public function __invoke(): string
    {
        return (new JavaScriptPacker(ob_get_clean(), 'none', true, false))->pack();
    }


}