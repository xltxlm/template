<?php
/** @var \xltxlm\template\VUE\Vue_Fingerprint $this */
?>
var crcid = new Fingerprint({canvas: true}).get();
$.cookie('crcid', crcid, {expires: 30});

console.log(['id', crcid]);
if (crcid == '') {
    document.write('sorry! we are only Support Chrome,safari');
    die;
}
var <?=(new \xltxlm\template\VUE\VUE_Js)->Makemixin()?> = {
    data: function () {
        return {
            myid: crcid
        }
    }
};

