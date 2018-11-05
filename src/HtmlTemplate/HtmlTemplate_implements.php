<?php
namespace xltxlm\template\HtmlTemplate;

/**
 * 模板文件加持;
*/
Trait HtmlTemplate_implements
{



    /* @var string 模板文件路径 */
        protected $HtmlTemplate = '';
    


    /**
     * @return string;
     */
    protected function getHtmlTemplate():string    {
        return $this->HtmlTemplate;
    }




    /**
     * @param string $HtmlTemplate;
     * @return $this
     */
    protected function setHtmlTemplate(string $HtmlTemplate)
    {
        $this->HtmlTemplate = $HtmlTemplate;
        return $this;
    }

}