<?php
namespace xltxlm\template\Template\Html;

/**
 * :Trait;
 * 常规的html形式输出css,js,html;
*/
trait Html_implements
{

/* @var string  输出js */
    protected $JS = '';

    /**
    * @return string;
    */
    abstract public function getJS():string;
    
    /**
    * @param string $JS;
    * @return $this
    */
    protected function setJS(string $JS  = "")
    {
        $this->JS = $JS;
        return $this;
    }

    /* @var string  输出html */
    protected $HTML = '';

    /**
    * @return string;
    */
    abstract public function getHTML():string;
    
    /**
    * @param string $HTML;
    * @return $this
    */
    protected function setHTML(string $HTML  = "")
    {
        $this->HTML = $HTML;
        return $this;
    }

    /* @var string  真正的代码目录 */
    protected $class_dir = '';

    protected $cached_class_dir = false;
    /**
    * @return string;
    */
    abstract protected function Real_getclass_dir():string;

    /**
    * @return string;
    */
    final protected function getclass_dir(bool $清除缓存 = false):string
    {
        if ($this->cached_class_dir === false || $清除缓存===true) {
            $this->cached_class_dir = $this->Real_getclass_dir();
        }
        return $this->cached_class_dir;
    }

    /**
    * @param string $class_dir;
    * @return $this
    */
    protected function setclass_dir(string $class_dir  = "")
    {
        $this->class_dir = $class_dir;
        return $this;
    }

    /* @var string  真正代码的类名称 */
    protected $className = '';

    protected $cached_className = false;
    /**
    * @return string;
    */
    abstract protected function Real_getclassName():string;

    /**
    * @return string;
    */
    final protected function getclassName(bool $清除缓存 = false):string
    {
        if ($this->cached_className === false || $清除缓存===true) {
            $this->cached_className = $this->Real_getclassName();
        }
        return $this->cached_className;
    }

    /**
    * @param string $className;
    * @return $this
    */
    protected function setclassName(string $className  = "")
    {
        $this->className = $className;
        return $this;
    }

    /* @var string  输出css */
    protected $CSS = '';

    /**
    * @return string;
    */
    abstract public function getCSS():string;
    
    /**
    * @param string $CSS;
    * @return $this
    */
    protected function setCSS(string $CSS  = "")
    {
        $this->CSS = $CSS;
        return $this;
    }
}
