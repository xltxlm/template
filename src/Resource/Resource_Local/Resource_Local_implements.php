<?php
namespace xltxlm\template\Resource\Resource_Local;

/**
 * 把输出的js,css替换成本地输出;
*/
abstract class Resource_Local_implements
{



    /* @var string  要输出的html代码 */
        protected $html = '';
    


    /**
     * @return string;
     */
    public function gethtml():string    {
        return $this->html;
    }




    /**
     * @param string $html;
     * @return $this
     */
    public function sethtml(string $html)
    {
        $this->html = $html;
        return $this;
    }

    /**
     *   js,css替换成本地输出;
     *   @return :string;
    */
    abstract public function __invoke():string;

}