<!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <title>绿芯包装</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="keywords" content="绿芯包装 绿芯 包装">
    <meta name="description" content="绿芯包装">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $tag['path.skin']; ?>css/bootstrap.min.css">
    <!-- Bootstrap Css-->
    
    <!-- FontAwesome Css-->
    <link rel="stylesheet" href="<?php echo $tag['path.skin']; ?>css/font-awesome.min.css">
    <!-- FontAwesome Css-->
    
    <!-- CoreStyle Css-->
    <link rel="stylesheet" href="<?php echo $tag['path.skin']; ?>css/style.css" media="screen">
    <!--CoreStyle Css-->
    <link rel="shortcut icon" href="<?php echo $tag['path.skin']; ?>images/xlogo.png" type="image/x-icon" />
  </head>
<body>
    <div class="container">
        <!-- lx -- 头部 -->
        <div  style="background-image: url('<?php echo $tag['path.skin']; ?>images/tpbj.png'); border-radius:5px 5px 0 0 ;">
            <div class="container widget martp" >
                <div class="xr-global-header" >
                    <div class="header-logo">
                        <img src="<?php echo $tag['path.skin']; ?>images/logo.png" alt="logo" class="img-responsive">
                    </div>
                    <div class="select md-only">
                        <!-- <a style="color: #4A654F" onclick="this.style.behavior='url(#default#homepage)';this.setHomepage('/')" href="/">设为首页</a> -->
                        <a class="text-main" href="javascript:;" onclick="SetHomepage();return false;">设为首页</a>
                        <span>|</span>
                        <!-- <a style="color: #4A654F" href="#" onclick="JavaScript:window.external.addFavorite('/','绿芯包装')" title="收藏本站到收藏夹">收藏本站</a> -->
                        <a class="text-main" href="javascript:;" onclick="AddFavorite();return false;">加入收藏</a>
                        <script type="text/javascript">
                            function AddFavorite(){
                                if(document.all){
                                    try{
                                        window.external.addFavorite(window.location.href,document.title);
                                    }catch(e){
                                        alert("加入收藏失败，请使用Ctrl+D进行添加！");
                                    }
                                }else if(window.sidebar){
                                    window.sidebar.addPanel(document.title, window.location.href, "");
                                }else{
                                    alert("加入收藏失败，请使用Ctrl+D进行添加！");
                                }
                            }
                            function SetHomepage(){
                                if (document.all) {//设置IE 
                                    document.body.style.behavior = 'url(#default#homepage)'; 
                                    document.body.setHomePage(document.URL);
                                } else {
                                    alert("设置首页失败，请手动设置！"); 
                                } 
                            }
                        </script>
                    </div>
                </div>
            <!-- lx -- 头部结束 -->
            </div>
            <!--xr -- 导航 -->
            <div id="container2 " class="navbar container">
                <div id="navigation">
                    <ul class="navigation">
                        <li class="md">
                            <a href="/">公司首页</a>
                        </li>
                        <?php nav_main(); /*注释：默认样式为模板目录/index/__nav/nav_main_0.php*/ ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--xr -- 导航结束 -->
    <!--xr -- 内容 --> 
    <div class="container widget boderra" >
        <div style="background-color: #fff !important;">             
        <!-- lx -- 滚动图片 -->
            <div id="" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <!-- Wrapper for slides -->
                <div id="myFocus" class="carousel-inner" role="listbox">
                    <?php doc_focus(1,6,0,0,0,true,'ordering',0) ?> 
                </div>
                <!-- Controls -->
            </div>
        <!-- lx -- 滚动图片结束 -->
        <!-- lx -- 不同系列 -->
            <div class="row" style="margin-top: 10px;">
                <div class="col-xs-12">
                    <div class="container-box">
                        <?php doc_article('5',5,1,0,0,0,true,false,'id',0) ?> 
                    </div>
                </div>                 
            </div>
        <!-- lx -- 不同系列结束 -->
            <br>
            <div class="row " style="margin-top: 15px">
                <div class="col-xs-8" style="padding-left:0px;">
                    <!-- lx -- 简介 -->
                    <div class="col-xs-12">
                        <div class="container-box" >
                            <ul class="nav nav-tabs" role="tablist" >
                                <li role="presentation" class="active">
                                    <a href="/" aria-controls="tongzhi" role="tab" data-toggle="tab"><i class="fa fa-bullhorn fa-lg"></i> 公司简介 / About Us
                                    </a>
                                </li>
                                <span class="more" style="display: inline;float: right;"><a href="/?p=1">详情 >><i class="fa fa-angle-double-right"></i></a>
                                </span>
                            </ul>
                            <div class="row" >
                            <?php doc_article('1',1,0,0,0,220,true,false,'id',0) ?>
                            </div>
                        </div>
                    </div>
                    <!-- lx -- 简介结束 -->
                    <div class="col-xs-6 martp">
                        <div class="container-box">
                            <ul class="nav nav-tabs" role="tablist" >
                                <li role="presentation" class="active">
                                    <a href="/" aria-controls="tongzhi" role="tab" data-toggle="tab"><i class="fa fa-bullhorn fa-lg"></i> 联系我们 / Contact Us
                                    </a>
                                </li>
                                <span class="more" style="display: inline;float: right;"><a href="/?p=20">详情 >><i class="fa fa-angle-double-right"></i></a>
                                </span>
                            </ul>
                            <div class="container-box-info" style="margin-top: 10px">
                                <?php doc_list(8,4,2,0,0,0,true,false,'ordering',0) ?> 
                            </div>
                        </div>
                    </div>
                    <!-- lx -- 新闻 -->
                    <div class="col-xs-6 martp">
                        <div class="container-box">
                            <ul class="nav nav-tabs" role="tablist" >
                                <li role="presentation" class="active">
                                    <a href="/" aria-controls="tongzhi" role="tab" data-toggle="tab"><i class="fa fa-bullhorn fa-lg"></i> 公司新闻 / News Report
                                    </a>
                                </li>
                                <span class="more" style="display: inline;float: right;"><a href="/?p=17">更多 >><i class="fa fa-angle-double-right"></i></a>
                                </span>
                            </ul>
                            <div class="container-box-info">
                                <ul class="news">
                                    <?php doc_list(17,10,0,0,0,0,true,false,'id',0) ?> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- lx -- 新闻结束 -->
                </div>
                <!-- lx -- 产品信息 -->
                <div class="col-xs-4 list_lh" style="height: 190px">
                    <ul class="nav nav-tabs" role="tablist" >
                        <li role="presentation" class="active">
                            <a href="/" aria-controls="tongzhi" role="tab" data-toggle="tab"><i class="fa fa-bullhorn fa-lg"></i> 产品信息 / Product Info
                            </a>
                        </li>
                        <span class="more" style="display: inline;float: right;"><a href="/?p=6">更多 >><i class="fa fa-angle-double-right"></i></a>
                        </span>
                    </ul>
                    <div id="myscroll">
                        <ul>
                            <?php doc_list(6,6,1,12,30,0,true,false,'id',0) ?> 
                        </ul>
                    </div>
                </div> 
                <!-- lx -- 产品信息结束 -->
            </div>
        <!-- lx -- 成品展示 -->
            <div class="col-xs-12" style="margin:0;padding:0 ; background-color: #fff;border-radius:0 0 10px 10px">
                <div style="margin:10px 0 10px 0;padding:0 ; background-color: #fff;">
                    <ul class="nav nav-tabs" role="tablist" style="padding: 0 15px;">
                        <li role="presentation" class="active">
                            <a href="" aria-controls="tongzhi" role="tab" data-toggle="tab"><i class="fa fa-bullhorn fa-lg"></i> 成品展示 / End Product
                            </a>
                        </li>
                        <span class="more" style="display: inline;float: right; "><a href="/?p=7">更多 >><i class="fa fa-angle-double-right"></i></a>
                        </span>
                    </ul>
                    <div class="adboder">
                        <div style="width: 8px ; height: 110px; display: inline;float: left;"></div>
                        <div id="demo" style="padding: 0 10px"> 
                            <div id="indemo"> 
                                <div id="demo1" > 
                                    <?php doc_picture(7,0,0,20,5,5,true,false,'id',0) ?>
                                </div>
                                <div id="demo2"></div> 
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
        <!-- lx -- 成品展示结束 -->
        </div>
    </div>
    <script> 
    var speed=30; //数字越大速度越慢 
    var tab=document.getElementById("demo"); 
    var tab1=document.getElementById("demo1"); 
    var tab2=document.getElementById("demo2"); 
    tab2.innerHTML=tab1.innerHTML; 
    function Marquee(){ 
    if(tab2.offsetWidth-tab.scrollLeft<=0) 
    tab.scrollLeft-=tab1.offsetWidth 
    else{ 
    tab.scrollLeft++; 
    } 
    } 
    var MyMar=setInterval(Marquee,speed); 
    tab.onmouseover=function() {clearInterval(MyMar)}; 
    tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)}; 
    </script> 
    <!--xr -- 内容结束 --> 

    <!--xr -- 脚部 --> 
    <hr style="border-top:  5px solid #0B924D;margin-top: 10px;margin-bottom: 3px">
    <!-- <hr style="border-top:  5px solid #0DA6CC;margin-top: 0px;margin-bottom: 3px;"> -->
    <div class="container wcon" >
        <div class="footer">
            <div class="row adfbg">
                <div style="width: 100%">
                    <div class="cpy text-center">
                        <p><span>联系热线：18287553174</span><br><span>地址：四川省雅安市四川农业大学</span><br><span>Copyright © 2016 绿芯新型食品包装科技有限责任公司</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--xr -- 脚部结束 --> 
    <script src="<?php echo $tag['path.skin']; ?>js/jquery.min.js"></script>
    <script src="<?php echo $tag['path.skin']; ?>js/touchSwipe.min.js"></script>
    <script src="<?php echo $tag['path.skin']; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $tag['path.skin']; ?>js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo $tag['path.skin']; ?>js/style.js"></script> 
    <script src="<?php echo $tag['path.skin']; ?>js/scroll.js"></script>
    <script type="text/javascript">
    $(function(){
        $('#myscroll').myScroll({
            speed: 50, //数值越大，速度越慢
            rowHeight: 90 //li的高度
        });
    });
    $(function () {
        $('.container-box-info').children().eq(3).children().eq(0).css('height','60px');
    });
</script>
</body>
</html>