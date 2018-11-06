<?php

namespace xltxlm\template\Jquery;


/**
 * Jquery相关的工具箱;
 */
class Jquery_Tool extends Jquery_Tool\Jquery_Tool_implements
{
    public function __invoke()
    {
        ?>
        <script src="<?= \xltxlm\template\Resource\Resource_implements::JQUERY ?>"></script>
        <script src="<?= \xltxlm\template\Resource\Resource_implements::JQUERYCOOKIE ?>"></script>
        <script src="<?= \xltxlm\template\Resource\Resource_implements::FINGERPRINT ?>"></script>
        <script>
            var crcid = new Fingerprint({canvas: true}).get();
            $.cookie('crcid', crcid, {expires: 30});
        </script>

        <script src="<?= \xltxlm\template\Resource\Resource_implements::CLIPBOARD ?>"></script>
        <script>
            var clipboard = new ClipboardJS('.copytext');
        </script>

        <?php
    }


}