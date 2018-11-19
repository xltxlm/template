<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2018/11/19
 * Time: 下午12:49
 */

namespace xltxlm\template\test\Vue\VUE_Component;


use xltxlm\template\VUE\VUE_Component;

class vtest
{
    use VUE_Component;

    protected $title='';
    protected $cc='';

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return vtest
     */
    public function setTitle(string $title): vtest
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getCc(): string
    {
        return $this->cc;
    }

    /**
     * @param string $cc
     * @return vtest
     */
    public function setCc(string $cc): vtest
    {
        $this->cc = $cc;
        return $this;
    }

}