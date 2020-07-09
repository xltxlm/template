package VUE

type VUE_Component struct {
    /* 获取网页代码 */
    VueHtml string

    /* 获取js代码 */
    VueJs 

    /* 类的名称 */
    className string

    /* 类的拼音名称,作为html模块名称,没有连接符 */
    className_pinyin string

    /* 组件所在的文件夹 */
    class_dir string

    /* 只输出组件,不辅助输出html */
    onlyLibs bool

}

func NewVUE_Component(VueHtml string,VueJs ) *VUE_Component{
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
func (this *VUE_Component)GetVueJs() {
    return this.VueJs;
}

func (this *VUE_Component)SetVueJs(VueJs ) *VUE_Component{
    this.VueJs = VueJs;
    return this
}

/**
    输出外部调用的内容*/
func (this *VUE_Component)__invoke(){

}

