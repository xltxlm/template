package Resource

type Resource_Local struct {
    /* 要输出的html代码 */
    html string

}

func NewResource_Local() *Resource_Local{
    var this = new(Resource_Local)
    return this
}


/**
    js,css替换成本地输出*/
func (this *Resource_Local)__invoke()string{

}

