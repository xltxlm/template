<?php

namespace xltxlm\template\Load;

use xltxlm\url\Urlinfo;

/**
 * 输出本地化的js引用;
 */
class Load_JS extends Load_JS\Load_JS_implements
{
    /**
     * Load_JS constructor.
     */
    public function __construct(string $url = '')
    {
        $this->seturl($url);
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $getpath = (new Urlinfo($this->geturl()))->getpath();
        if ($this->getossdomain()) {
            echo "<script src=\"{$this->getossdomain()}/localstyle{$getpath}\"></script>\n";
        } else {
            echo "<script src=\"/localstyle{$getpath}\"></script>\n";
        }
    }

}
