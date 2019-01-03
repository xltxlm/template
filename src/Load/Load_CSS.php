<?php

namespace xltxlm\template\Load;

use xltxlm\url\Urlinfo;

/**
 * 输出本地化的css引用;
 */
class Load_CSS extends Load_CSS\Load_CSS_implements
{
    /**
     * @return mixed
     */
    public function __invoke()
    {
        $getpath = (new Urlinfo($this->geturl()))->getpath();
        echo "<link rel=\"stylesheet\" href=\"/localstyle{$getpath}\" />\n";
    }

}
