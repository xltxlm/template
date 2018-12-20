<?php
namespace xltxlm\template\Resource;

/**
 * :类;
 * js,css原始的cdn引用地址;
*/
abstract class Resource_implements
{
    /*  */
    public const VUE="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js";
    /* 有赞移动端js */
    public const VANTJS="https://unpkg.com/vant@1.4.7/lib/vant.min.js";
    /* 有赞移动端css */
    public const VANTCSS="https://unpkg.com/vant@1.4.7/lib/index.css";
    /*  */
    public const MOBILE_DEBUG="https://cdnjs.cloudflare.com/ajax/libs/eruda/1.5.4/eruda.min.js";
    /*  */
    public const JQUERY="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js";
    /*  */
    public const JQUERYCOOKIE="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js";
    /* 设备指纹 */
    public const FINGERPRINT="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs/0.5.3/fingerprint.min.js";
    /* 拷贝文字到剪切板 */
    public const CLIPBOARD="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.1/clipboard.min.js";
    /* jquery表单验证 */
    public const VALIDATE_METHODS="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.18.0/additional-methods.min.js";
    /* jquery表单验证 */
    public const VALIDATE="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.18.0/jquery.validate.min.js";
    /* 图标 */
    public const EVAICONS="https://unpkg.com/eva-icons@1.0.2/eva.min.js";
    /* 动画效果 */
    public const MAGIC="https://cdnjs.cloudflare.com/ajax/libs/magic/1.1.0/magic.min.css";
    /* 其他平台支持苹果ts格式的播放 */
    public const HLS="https://cdn.jsdelivr.net/npm/hls.js@latest";
}
