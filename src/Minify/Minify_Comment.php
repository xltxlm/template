<?php

namespace xltxlm\template\Minify;

use xltxlm\str\Str;


/**
 * 把传入的html/css/js代码,删除掉注释;
 */
class Minify_Comment extends Minify_Comment\Minify_Comment_implements
{
    /**
     * @return string
     */
    public function __invoke(): string
    {
        $split = (new Str($this->gethtmljscss_code()))
            ->Split("\n")
            ->getValues();
        $split_new = [];
        foreach ($split as $item) {
            $trim = trim($item);
            if ($trim[0] == '/' && $trim[1] == '/') {
                continue;
            }
            if ($trim[0] == '/' && $trim[1] == '*') {
                continue;
            }
            if (strpos($trim, '<!--') === 0 && strpos($trim, '-->') === strlen($trim) - 3) {
                continue;
            }

            $split_new[] = $item;
        }
        $html = join("\n", $split_new);
        return $html;
    }


}