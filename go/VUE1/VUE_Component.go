package VUE1

type VUE_Component struct {
    /* 获取网页代码 */
    VueHtml string

    /* 获取js代码 */
    VueJs string

    /* 类的名称 */
    className string

    /* 类的拼音名称,作为html模块名称,没有连接符 */
    className_pinyin string

}

func NewVUE_Component(VueHtml string,VueJs string) *VUE_Component{
    var this = new(VUE_Component)
    this.SetVueHtml(VueHtml);
    this.SetVueJs(VueJs);
    return this
}

func (this *VUE_Component)GetVueHtml() string{
    return this.VueHtml;
}

func (this *VUE_Component)SetVueHtml(VueHtml string) *VUE_Component{
    this.VueHtml = VueHtml;
    return this
}
func (this *VUE_Component)GetVueJs() string{
    return this.VueJs;
}

func (this *VUE_Component)SetVueJs(VueJs string) *VUE_Component{
    this.VueJs = VueJs;
    return this
}

