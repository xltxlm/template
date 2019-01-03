<?php

namespace xltxlm\template\Load;

use xltxlm\url\Urlinfo;

/**
 * 输出本地化的js引用;
 */
class Load_JS extends Load_JS\Load_JS_implements
{
    /**
     * @return mixed
     */
    public function __invoke()
    {
        $getpath = (new Urlinfo($this->geturl()))->getpath();
        echo "<script src=\"/localstyle{$getpath}\"></script>\n";
    }

}
