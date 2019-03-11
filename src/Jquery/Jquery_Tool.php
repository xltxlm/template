<?php

namespace xltxlm\template\Jquery;

use xltxlm\template\Resource\Resource_Local;
use \xltxlm\template\Resource;

/**
 * Jquery相关的工具箱;
 */
class Jquery_Tool extends Jquery_Tool\Jquery_Tool_implements
{
    public function __invoke()
    {
        if ($this->getlocalstyle() == true) {
            ob_start();
        }
        ?>
        <script src="<?= Resource::JQUERY ?>"></script>
        <script type="application/javascript">
            window.onerror = function (message, source, lineno, colno, error) {
                $.ajax({
                    url: '/?c=Js/Error',
                    method: "POST",
                    data: {message: message, source: source, lineno: lineno, colno: colno, error: error,user_agent:navigator.userAgent}
                });
            };
        </script>
        <script src="<?= Resource::JQUERYCOOKIE ?>"></script>
        <!--- 设备身份识别 --->
        <script src="<?= Resource::FINGERPRINT ?>"></script>
        <!--  动画效果 -->
        <link rel="stylesheet" href="<?= Resource::MAGIC ?>" />
        <script src="<?= Resource::CLIPBOARD ?>"></script>
        <script>
            var clipboard;
            $(function () {
                clipboard = new ClipboardJS('.copytext');
            })

        </script>

        <?php
        if ($this->getlocalstyle() == true) {
            echo (new Resource_Local(ob_get_clean()))
                ->__invoke();
        }
    }


}