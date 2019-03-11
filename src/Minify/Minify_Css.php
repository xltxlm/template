<?php

namespace xltxlm\template\Minify;


/**
 * 资源压缩,采用ob_start括起来输出;
 */
class Minify_Css extends Minify_Css\Minify_Css_implements
{


    /**
     * Minify_Css constructor.
     */
    public function __construct()
    {
        ob_start();
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $html = (new Minify_Comment)->sethtmljscss_code(ob_get_clean())->__invoke();
        $vuehtml = strtr($html,
            [
                "\r" => "",
                "\n" => "",
                '"' => '\\"',
                '\\' => '\\\\',
            ]);
        return $vuehtml;
    }


}