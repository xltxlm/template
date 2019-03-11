<?php
namespace xltxlm\template\Minify\Minify_JS;

/**
 * :类;
 * 把js内容压缩成一行再返回;
*/
abstract class Minify_JS_implements
{


/* @var string   */
    protected $js_code = '';





    /**
    * @return string;
    */
            public function getjs_code():string        {
                return $this->js_code;
        }

    
    




/**
* @param string $js_code;
* @return $this
*/
    public function setjs_code(string $js_code  = "")
    {
    $this->js_code = $js_code;
    return $this;
    }



/**
*  返回代码;
*  @return :string;
*/
abstract public function __invoke():string;
}