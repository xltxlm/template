<?php

namespace xltxlm\template\tests\Resource\HtmlTemplate;

use xltxlm\template\HtmlTemplate;

/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/29
 * Time: 9:42.
 */
final class HtmlDemo
{
    use HtmlTemplate;
    protected $name = __FILE__;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return HtmlDemo
     */
    public function setName(string $name): HtmlDemo
    {
        $this->name = $name;

        return $this;
    }

    public function __invoke()
    {
        $this->getHtmlTemplate();
    }
}
