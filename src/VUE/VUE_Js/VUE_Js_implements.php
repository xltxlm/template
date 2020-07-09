<?php
namespace xltxlm\template\VUE\VUE_Js;

/**
 * :类;
 * vue2.x;
*/
abstract class VUE_Js_implements
{
    /* CSS */
    public const CSS="CSS";
    /* JS */
    public const JS="JS";
    /* 具体的js代码文件 */
    public const JS_FILE="JS_FILE";


/* @var array  组件的类名称集合 */
    protected $Components = [];





    /**
    * 组件的类名称集合;
    * @return array;
    */
            abstract public function getComponents():array;
    
    




/**
* @param array $Components;
* @return $this
*/
    protected function setComponents(array $Components  = [])
    {
    $this->Components = $Components;
    return $this;
    }


    /**
    * @param  $Components;
    * @return $this
    */
    public function setComponents_Row( $Components){
    $this->Components[] = $Components;
    return $this;
    }

/* @var string  div元素的id */
    protected $Appid = 'app';





    /**
    * div元素的id;
    * @return string;
    */
            public function getAppid():string        {
                return $this->Appid;
        }

    
    




/**
* @param string $Appid;
* @return $this
*/
    public function setAppid(string $Appid  = "app")
    {
    $this->Appid = $Appid;
    return $this;
    }



/* @var bool  是否采用本地样式的链接地址 */
    protected $localstyle = false;
    




    /**
    * 是否采用本地样式的链接地址;
    * @return bool;
    */
            public function getlocalstyle():bool        {
                return $this->localstyle;
        }

    
            public function islocalstyle():bool        {
        return $this->getlocalstyle();
        }
    




/**
* @param bool $localstyle;
* @return $this
*/
    public function setlocalstyle(bool $localstyle  = false)
    {
    $this->localstyle = $localstyle;
    return $this;
    }



/* @var array  附加功能组件列表 */
    public  static $mixins = [];





    /**
    * 附加功能组件列表;
    * @return array;
    */
            public static  function getmixins():array        {
            return static::$mixins;
        }

    
    




/**
* @param array $mixins;
*/
    public static  function setmixins(array $mixins  = [])
    {
    static::$mixins = $mixins;
    }


    /**
    * @param  $mixins;
    * @return $this
    */
    public function setmixins_Row( $mixins){
    static::$mixins[] = $mixins;
    return $this;
    }

/* @var string  加速cdn的域名（带https://） */
    protected $ossdomain = '';





    /**
    * 加速cdn的域名（带https://）;
    * @return string;
    */
            public function getossdomain():string        {
                return $this->ossdomain;
        }

    
    




/**
* @param string $ossdomain;
* @return $this
*/
    public function setossdomain(string $ossdomain  = "")
    {
    $this->ossdomain = $ossdomain;
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
/**
*  生成一个新的mixin,并且输出变量名到页面上;
*  @return :string;
*/
abstract public function Makemixin():string;
}