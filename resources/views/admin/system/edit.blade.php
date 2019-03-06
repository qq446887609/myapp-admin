@extends('admin.layout.layout')
@section('content')
    <body>
    <div class="panel admin-panel">
        <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
        <div class="body-content">
            <form method="post" class="form-x" action="javascript:">
                <input type="hidden" id="id" value="{{$sys['id']}}">
                <div class="form-group">
                    <div class="label">
                        <label>网站标题：</label>
                    </div>
                    <div class="field">
                        <input  class="input" id="title" value="{{$sys['title']}}" style="height:80px">
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>网站关键字：</label>
                    </div>
                    <div class="field">
                        <input  class="input" id="keywords" value="{{$sys['keywords']}}" style="height:80px">
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>网站描述：</label>
                    </div>
                    <div class="field">
                        <textarea  class="input" id="desc">{{$sys['desc']}}</textarea>
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>底部信息：</label>
                    </div>
                    <div class="field">
                        <textarea  id="footer" class="input" style="height:120px;">{{$sys['footer']}}</textarea>
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label></label>
                    </div>
                    <div class="field">
                        <button id="submit_btn" class="button bg-main icon-check-square-o" type="submit"> 保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </body>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submit_btn').click(function () {

            var title = $('#title').val();

            var keywords = $('#keywords').val();

            var desc = $('#desc').val();

            var footer = $('#footer').val();

            var id = $('#id').val();

            $.post('{{url('admin/system/update')}}',{title:title,keywords:keywords,desc:desc,footer:footer,id:id},function (res) {
                if(res.code==1)
                {
                    window.parent.location.href = '{{url('admin/index')}}';
                }
                else
                {
                    layer.msg(res.msg);
                }
            })
        })
    </script>
@endsection