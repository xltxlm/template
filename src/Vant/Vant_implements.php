<?php
namespace xltxlm\template\Vant;

/**
 * 输出有赞样式框架必备的css,js;
*/
abstract class Vant_implements
{



    /* @var bool 开启手机端调试模式 */
        protected $debug = false;
    


    /**
     * @return bool;
     */
    public function getdebug():bool    {
        return $this->debug;
    }




    /**
     * @param bool $debug;
     * @return $this
     */
    public function setdebug(bool $debug)
    {
        $this->debug = $debug;
        return $this;
    }

    /* @var bool 样式存储在本地 */
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