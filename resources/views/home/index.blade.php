<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>laravel-个人博客实战</title>
    <meta name="keywords" content="lampol个人博客实战页面" />
    <meta name="description" content="laravel博客实战项目" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('home/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/m.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/login.css')}}" rel="stylesheet">
    <script src="{{asset('home/js/jquery.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('home/js/comm.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/slidr.js')}}"></script>
    <!--[if lt IE 9] -->
    <script src="{{asset('home/js/modernizr.js')}}"></script>
    <![endif]-->



</head>
<body>
<header class="header-navigation" id="header">
    <nav><div class="logo"><a href="/">laravel博客实战</a></div>
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <ul id="starlist">
            <li><a href="index.html">首页</a></li>
            <li><a href="list.html">PHP</a></li>
            <li><a href="list.html">LINUX</a></li>
            <li><a href="login.html" class="btn btn-default login-btn no-pjax">登 录</a></li>
            <li>  <a href="register.html" class="btn btn-default login-btn no-pjax">注 册</a></li>

        </ul>
    </nav>
</header>
<article>
    <aside class="l_box">

        <div class="search">
            <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
                <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字词" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
                <input name="Submit" class="input_submit" value="搜索" type="submit">
            </form>
        </div>

        <div class="about_me">
            <h2>关于作者</h2>
            <ul>
                <i><img src="{{asset('home/images/tx.jpg')}}"></i>
                <p><b>程序猿:</b>本人学识渊博、经验丰富，代码风骚、效率恐怖，c/c++、java、php无不精通，熟练掌握各种框架，深山苦练20余年，一天只睡4小时，电话通知出bug后秒登vpn，千里之外定位问题，瞬息之间修复上线。</p>
            </ul>
        </div>


        <div class="tuijian">
            <h2>最近发布</h2>
            <ul>
                <li><a href="/">程序员最讨厌的四件事</a></li>
                <li><a href="/">关于程序员面试的问题</a></li>

                <li><a href="/">程序员最憋屈的事情就是</a></li>
                <li><a href="/">本人学识渊博、经验丰富，代码风骚、效率恐怖</a></li>
                <li><a href="/">我去交友网站找女朋友去了</a></li>

            </ul>
        </div>

        <div class="guanzhu">
            <h2>求打赏啊</h2>
            <ul>
                <img src="{{asset('home/images/zfb.jpg')}}">
            </ul>
        </div>

        <div class="cloud">
            <h2>文章标签</h2>
            <ul>
                <li><a href="/">html</a> </li>
                <li><a href="/">linux</a> </li>
                <li><a href="/">php</a> </li>
                <li><a href="/">css</a> </li>
                <li><a href="/">mysql</a> </li>
                <li><a href="/">js</a> </li>

            </ul>
        </div>

        <div class="links">
            <h2>友情链接</h2>
            <ul>
                <li><a href="http://www.lampol-blog.com/">lampol个人博客</a> </li>
                <li><a href="https://ke.qq.com/course/list/lampol">腾讯课堂教程</a></li>
                <li><a href="https://github.com/lampol">GIT地址</a></li>
            </ul>
        </div>

    </aside>



    <main class="r_box">


        <div id="slidr-img" style="display: inline-block">
            <img data-slidr="one" src="{{asset('home/images/banner-1.jpg')}}"/>
            <img data-slidr="two" src="{{asset('home/images/banner-2.jpg')}}"/>
            <img data-slidr="three" src="{{asset('home/images/banner-1.jpg')}}"/>
        </div>


        <li><i><a href="detail.html"><img src="{{asset('home/images/p.png')}}"></a></i>
            <h3><a href="detail.html">关于程序员面试的问题</a></h3>
            <p>一程序员去面试，面试官问：“你毕业才两年，这三年工作经验是怎么来的？！”程序员答：“加班。”</p>
        </li>

        <li><i><a href="detail.html"><img src="{{asset('home/images/p.png')}}"></a></i>
            <h3><a href="detail.html">程序员最讨厌康熙的哪个儿子</a></h3>
            <p>程序员最讨厌康熙的哪个儿子。答：胤禩。因为他是八阿哥（bug）</p>
        </li>
        <li><i><a href="detail.html"><img src="{{asset('home/images/p.png')}}"></a></i>
            <h3><a href="detail.html">程序猿要了3个孩子</a></h3>
            <p>程序猿要了3个孩子，分别取名叫Ctrl、Alt 和Delete，如果他们不听话，程序猿就只要同时敲他们一下就会好的</p>
        </li>
        <li><i><a href="detail.html"><img src="{{asset('home/images/p.png')}}"></a></i>
            <h3><a href="detail.html">程序员最憋屈的事情就是</a></h3>
            <p>程序员最憋屈的事情就是：你辛辛苦苦熬夜写了一个风格优雅的源文件，被一个代码风格极差的同事改了且没署名，以至于别人都以为你是写的。</p>
        </li>
        <li><i><a href="detail.html"><img src="{{asset('home/images/p.png')}}"></a></i>
            <h3><a href="detail.html">我去交友网站找女朋友去了</a></h3>
            <p>前端工程师说，我去交友网站找女朋友去了。朋友问，找到了么？工程师说，找到了他们页面的一个bug。</p>
        </li>
        <li><i><a href="detail.html"><img src="{{asset('home/images/p.png')}}"></a></i>
            <h3><a href="detail.html">程序员换行</a></h3>
            <p>两程序员聊天，程序员甲抱怨：“做程序员太辛苦了，我想换行……我该怎么办？”程序员乙：“敲一下回车。”</p>
        </li>
        <li><i><a href="detail.html"><img src="{{asset('home/images/p.png')}}"></a></i>
            <h3><a href="detail.html">程序员最讨厌的四件事</a></h3>
            <p>程序员最讨厌的四件事：写注释、写文档、别人不写注释、别人不写文档……</p>
        </li>


    </main>
</article>
<footer id="footer" >
    <p>Powerd By  <a href="http://www.lampol-blog.com" target="_blank">lampol</a> <a href="/">鲁ICP备15015126号-3</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
<script>
    slidr.create('slidr-img').start();
</script>
</body>
</html>
