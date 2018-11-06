<?php
namespace xltxlm\template\Jquery\Jquery_Validate;

/**
 * 表单校验;
*/
abstract class Jquery_Validate_implements
{



    /* @var bool  是否本地样式 */
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
     *   输出基础的js;
     *   @return ;
    */
    abstract public function __invoke();

}