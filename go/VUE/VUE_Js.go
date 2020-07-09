package VUE

type VUE_Js struct {
    /* 组件的类名称集合 */
    Components array

    /* div元素的id */
    Appid string

    /* 是否采用本地样式的链接地址 */
    localstyle bool

    /* 附加功能组件列表 */
    mixins array

}

func NewVUE_Js(Components array,Appid string) *VUE_Js{
    var this = new(VUE_Js)
    this.SetComponents(Components);
    this.SetAppid(Appid);
    return this
}

func (this *VUE_Js)GetComponents() array{
    return this.Components;
}

func (this *VUE_Js)SetComponents(Components array) *VUE_Js{
    this.Components = Components;
    return this
}
func (this *VUE_Js)GetAppid() string{
    return this.Appid;
}

func (this *VUE_Js)SetAppid(Appid string) *VUE_Js{
    this.Appid = Appid;
    return this
}

/**
    */
func (this *VUE_Js)__invoke(){

}

/**
    输出vue函数,并且合并输出css*/
func (this *VUE_Js)ShowTime(){

}

/**
    生成一个新的mixin,并且输出变量名到页面上*/
func (this *VUE_Js)Makemixin()string{

}

