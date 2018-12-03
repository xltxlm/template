<?php

namespace xltxlm\template\Resource;

use xltxlm\url\Urlinfo;


/**
 * 把输出的js,css替换成本地输出;
 */
class Resource_Local extends Resource_Local\Resource_Local_implements
{

    /**
     * Resource_Local constructor.
     */
    public function __construct(string $html = '')
    {
        if ($html) {
            $this->sethtml($html);
        }
    }

    public function __invoke(): string
    {
        $getConstants = (new \ReflectionClass(Resource_implements::class))
            ->getConstants();
        $getConstants_new = [];
        foreach ($getConstants as $getConstant) {
            $getpath = (new Urlinfo($getConstant))
                ->getpath();
            $getConstants_new[$getConstant] = "/localstyle" . $getpath;
        }

        return strtr($this->gethtml(), $getConstants_new);
    }


}