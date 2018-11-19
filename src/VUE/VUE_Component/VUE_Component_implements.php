<?php
namespace xltxlm\template\VUE\VUE_Component;

/**
 * 提供vue的基础手脚架函数;
*/
trait VUE_Component_implements
{

/* @var string  获取网页代码 */
    protected $VueHtml = '';

    protected $cached_VueHtml = false;
    /**
    * @return string;
    */
    abstract protected function Real_getVueHtml():string;

    /**
    * @return string;
    */
    final protected function getVueHtml(bool $清除缓存 = false):string
    {
        if ($this->cached_VueHtml === false || $清除缓存===true) {
            $this->cached_VueHtml = $this->Real_getVueHtml();
        }
        return $this->cached_VueHtml;
    }

    /**
    * @param string $VueHtml;
    * @return $this
    */
    protected function setVueHtml(string $VueHtml)
    {
        $this->VueHtml = $VueHtml;
        return $this;
    }
    /* @var void  获取js代码 */
    protected $VueJs;

    /**
    * @return void;
    */
    protected function getVueJs()
    {
        return $this->VueJs;
    }

    /**
    * @param  $VueJs;
    * @return $this
    */
    protected function setVueJs($VueJs)
    {
        $this->VueJs = $VueJs;
        return $this;
    }
    /* @var string  类的名称 */
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
    protected function setclassName(string $className)
    {
        $this->className = $className;
        return $this;
    }
    /* @var string  类的拼音名称,作为html模块名称,没有连接符 */
    protected $className_pinyin = '';

    protected $cached_className_pinyin = false;
    /**
    * @return string;
    */
    abstract protected function Real_getclassName_pinyin():string;

    /**
    * @return string;
    */
    final public function getclassName_pinyin(bool $清除缓存 = false):string
    {
        if ($this->cached_className_pinyin === false || $清除缓存===true) {
            $this->cached_className_pinyin = $this->Real_getclassName_pinyin();
        }
        return $this->cached_className_pinyin;
    }

    /**
    * @param string $className_pinyin;
    * @return $this
    */
    protected function setclassName_pinyin(string $className_pinyin)
    {
        $this->className_pinyin = $className_pinyin;
        return $this;
    }
    /* @var string  组件所在的文件夹 */
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
    protected function setclass_dir(string $class_dir)
    {
        $this->class_dir = $class_dir;
        return $this;
    }
    /**
    *  输出外部调用的内容;
    *  @return ;
    */
    abstract public function __invoke();
}
