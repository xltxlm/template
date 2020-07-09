package Minify

type Minify_JS struct {
    /*  */
    js_code string

}

func NewMinify_JS() *Minify_JS{
    var this = new(Minify_JS)
    return this
}


/**
    返回代码*/
func (this *Minify_JS)__invoke()string{

}

