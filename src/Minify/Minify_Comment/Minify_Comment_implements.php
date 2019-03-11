<?php
namespace xltxlm\template\Minify\Minify_Comment;

/**
 * :类;
 * 把传入的html/css/js代码,删除掉注释;
*/
abstract class Minify_Comment_implements
{


/* @var string  代码 */
    protected $htmljscss_code = '';





    /**
    * @return string;
    */
            public function gethtmljscss_code():string        {
                return $this->htmljscss_code;
        }

    
    




/**
* @param string $htmljscss_code;
* @return $this
*/
    public function sethtmljscss_code(string $htmljscss_code  = "")
    {
    $this->htmljscss_code = $htmljscss_code;
    return $this;
    }



/**
*  输出干净的代码;
*  @return :string;
*/
abstract public function __invoke():string;
}