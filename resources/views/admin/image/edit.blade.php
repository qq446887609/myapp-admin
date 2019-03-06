@extends('admin.layout.layout')
@section('content')
    <!--引入CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('lib/webupload/webuploader.css')}}">
    <!--引入JS-->
    <script type="text/javascript" src="{{asset('lib/webupload/webuploader.js')}}"></script>

    <body>
    <div class="panel admin-panel margin-top" id="add">
        <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加内容</strong></div>
        <div class="body-content">
            <form id="form" method="post" class="form-x" action="{{url('admin/image')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <div class="label">
                        <label>标题：</label>
                    </div>
                    <div class="field">
                        <input type="text"  class="input w50" value="" name="title" datatype="s4-22" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>URL：</label>
                    </div>
                    <div class="field">
                        <input datatype="url" type="text" class="input w50" name="url" value=""  />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>上传图片：</label>
                    </div>
                    <!--dom结构部分-->
                    <div id="uploader-demo">
                        <!--用来存放item-->
                        <div id="fileList" class="uploader-list"></div>
                        <div id="filePicker">选择图片</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>排序：</label>
                    </div>
                    <div class="field">
                        <input datatype="n" type="text" class="input w50" name="sort" value="0"   />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label></label>
                    </div>
                    <div class="field">
                        <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </body>
    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            swf:"{{asset('lib/webupload/Uploader.swf')}}'",

            // 文件接收服务端。
            server: '{{url('admin/image/upload')}}',

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on( 'uploadSuccess', function( file,res ) {
            if(res.status=='success')
            {
                $('#uploader-demo').append('<img style="width: 222px;height: 120px" src="/'+res.url+'">');
                $('#uploader-demo').append('<input type="hidden" name="img_url" value="'+res.url+'">');
            }
        });


        $("#form").Validform({
            tiptype:3,
            ajaxPost:true,  //默认为false，当设置为true时，会将表单的数据Post到form元素的action属性指定的地址。
            callback:function(res){
                if(res.status=='success'){
                    window.location.href = '{{url('admin/image')}}'
                }else{
                    layer.msg(res.status);
                }
            }
        });
    </script>
@endsection