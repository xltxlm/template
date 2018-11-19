<?php
namespace xltxlm\template\VUE\VUE_Js;

/**
 * vue2.x;
*/
abstract class VUE_Js_implements
{

/* @var array  组件的类名称集合 */
    protected $Components = [];

    /**
    * @return array;
    */
    abstract public function getComponents():array;
    
    /**
    * @param  $Components;
    * @return $this
    */
    public function setComponents_Row($Components)
    {
        $this->Components[] = $Components;
        return $this;
    }

    /**
    * @param array $Components;
    * @return $this
    */
    protected function setComponents(array $Components)
    {
        $this->Components = $Components;
        return $this;
    }
    /* @var string  div元素的id */
    protected $Appid = 'app';

    /**
    * @return string;
    */
    public function getAppid():string
    {
        return $this->Appid;
    }

    /**
    * @param string $Appid;
    * @return $this
    */
    public function setAppid(string $Appid)
    {
        $this->Appid = $Appid;
        return $this;
    }
    /**
    *  ;
    *  @return ;
    */
    abstract public function __invoke();
    /**
    *  输出vue函数,并且合并输出css;
    *  @return ;
    */
    abstract public function ShowTime();
}
