package 

type Vue struct {
    /* 只输出组件,不辅助输出html */
    onlyLibs bool

}

func NewVue() *Vue{
    var this = new(Vue)
    return this
}


