<?php

namespace xltxlm\template\Load;

use xltxlm\url\Urlinfo;

/**
 * 输出本地化的css引用;
 */
class Load_CSS extends Load_CSS\Load_CSS_implements
{
    /**
     * Load_CSS constructor.
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
            echo "<link rel=\"stylesheet\" href=\"{$this->getossdomain()}/localstyle{$getpath}\" />\n";
        } else {
            echo "<link rel=\"stylesheet\" href=\"/localstyle{$getpath}\" />\n";
        }
    }

}
