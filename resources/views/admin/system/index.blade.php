@extends('admin.layout.layout')
@section('content')
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="">
            <div class="form-group">
                <div class="label">
                    <label>网站标题：</label>
                </div>
                <div class="field">
                    <input readonly="true" class="input" name="title" value="{{$sys['title']}}" style="height:80px">
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>网站关键字：</label>
                </div>
                <div class="field">
                    <input readonly="true" class="input" name="keywords" value="{{$sys['keywords']}}" style="height:80px">
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>网站描述：</label>
                </div>
                <div class="field">
                    <textarea readonly="true" class="input" name="desc">{{$sys['desc']}}</textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>底部信息：</label>
                </div>
                <div class="field">
                    <textarea readonly="true" name="footer" class="input" style="height:120px;">{{$sys['footer']}}</textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <a href="{{url('admin/system/edit')}}"class="button bg-main icon-check-square-o">修改</a>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
@endsection