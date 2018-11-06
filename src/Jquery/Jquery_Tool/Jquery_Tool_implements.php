<?php
namespace xltxlm\template\Jquery\Jquery_Tool;

/**
 * Jquery相关的工具箱;
*/
abstract class Jquery_Tool_implements
{



    /* @var bool   */
        protected $localstyle = false;
    


    /**
     * @return bool;
     */
    public function getlocalstyle():bool    {
        return $this->localstyle;
    }




    /**
     * @param bool $localstyle;
     * @return $this
     */
    public function setlocalstyle(bool $localstyle)
    {
        $this->localstyle = $localstyle;
        return $this;
    }

    /**
     *   ;
     *   @return ;
    */
    abstract public function __invoke();

}