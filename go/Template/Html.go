package Template

type Html struct {
    /* 输出js */
    JS string

    /* 输出html */
    HTML string

    /* 真正的代码目录 */
    class_dir string

    /* 真正代码的类名称 */
    className string

    /* 输出css */
    CSS string

}

func NewHtml(JS string,HTML string,CSS string) *Html{
    var this = new(Html)
    this.SetJS(JS);
    this.SetHTML(HTML);
    this.SetCSS(CSS);
    return this
}

func (this *Html)GetJS() string{
    return this.JS;
}

func (this *Html)SetJS(JS string) *Html{
    this.JS = JS;
    return this
}
func (this *Html)GetHTML() string{
    return this.HTML;
}

func (this *Html)SetHTML(HTML string) *Html{
    this.HTML = HTML;
    return this
}
func (this *Html)GetCSS() string{
    return this.CSS;
}

func (this *Html)SetCSS(CSS string) *Html{
    this.CSS = CSS;
    return this
}

