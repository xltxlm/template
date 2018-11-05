<?php
namespace xltxlm\template\Exception\Exception_Filenot_Exist;

/**
 * 模板文件不存在;
*/
Trait Exception_Filenot_Exist_implements
{



    /* @var string  */
        protected $HtmlTemplate = '';
    


    /**
     * @return string;
     */
    public function getHtmlTemplate():string    {
        return $this->HtmlTemplate;
    }




    /**
     * @param string $HtmlTemplate;
     * @return $this
     */
    public function setHtmlTemplate(string $HtmlTemplate)
    {
        $this->HtmlTemplate = $HtmlTemplate;
        return $this;
    }

}