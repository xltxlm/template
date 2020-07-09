package Minify

type Minify_Comment struct {
    /* 代码 */
    htmljscss_code string

}

func NewMinify_Comment() *Minify_Comment{
    var this = new(Minify_Comment)
    return this
}


/**
    输出干净的代码*/
func (this *Minify_Comment)__invoke()string{

}

