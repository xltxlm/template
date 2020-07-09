package Exception

type Exception_Filenot_Exist struct {
    /*  */
    HtmlTemplate string

}

func NewException_Filenot_Exist(HtmlTemplate string) *Exception_Filenot_Exist{
    var this = new(Exception_Filenot_Exist)
    this.SetHtmlTemplate(HtmlTemplate);
    return this
}

func (this *Exception_Filenot_Exist)GetHtmlTemplate() string{
    return this.HtmlTemplate;
}

func (this *Exception_Filenot_Exist)SetHtmlTemplate(HtmlTemplate string) *Exception_Filenot_Exist{
    this.HtmlTemplate = HtmlTemplate;
    return this
}

