<?php
namespace xltxlm\template\Load\Load_JS;

/**
 * :类;
 * 输出本地化的js引用;
*/
abstract class Load_JS_implements
{


/* @var string   */
    protected $url = '';





    /**
    * ;
    * @return string;
    */
            public function geturl():string        {
                return $this->url;
        }

    
    




/**
* @param string $url;
* @return $this
*/
    public function seturl(string $url  = "")
    {
    $this->url = $url;
    return $this;
    }



/* @var string  切换到静态服务器的域名 */
    protected $ossdomain = '';





    /**
    * 切换到静态服务器的域名;
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
}