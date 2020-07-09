package 

type HtmlTemplate struct {
    /* 模板文件路径 */
    HtmlTemplate string

}

func NewHtmlTemplate(HtmlTemplate string) *HtmlTemplate{
    var this = new(HtmlTemplate)
    this.SetHtmlTemplate(HtmlTemplate);
    return this
}

func (this *HtmlTemplate)GetHtmlTemplate() string{
    return this.HtmlTemplate;
}

func (this *HtmlTemplate)SetHtmlTemplate(HtmlTemplate string) *HtmlTemplate{
    this.HtmlTemplate = HtmlTemplate;
    return this
}

