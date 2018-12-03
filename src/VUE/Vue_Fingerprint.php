<?php

namespace xltxlm\template\VUE;

/**
 * 用户设备id获取,并且注册一个mix函数给vue;
 */
class Vue_Fingerprint extends Vue_Fingerprint\Vue_Fingerprint_implements
{
    /**
     * @return mixed
     */
    public function __invoke()
    {
        (New VUE_Js())
            ->setComponents_Row(VUE_Js::JS_FILE, __DIR__ . '/Vue_Fingerprint/Vue_Fingerprint.js.php');
    }

}
