<!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <title>绿芯包装</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
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
<script src="<?php echo $tag['path.skin']; ?>js/jquery.min.js"></script>
    <script src="<?php echo $tag['path.skin']; ?>js/touchSwipe.min.js"></script>
    <script src="<?php echo $tag['path.skin']; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $tag['path.skin']; ?>js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo $tag['path.skin']; ?>js/style.js"></script> 
    <script src="<?php echo $tag['path.skin']; ?>js/scroll.js"></script>
    <!-- lx -- 脚部结束 --> 
  </head>
<body>
    <div class="container">
        <!-- lx -- 头部 -->
        <div class="adi">
            <div class="container widget martp" >
                <div class="xr-global-header" >
                    <div class="header-logo">
                        <img src="<?php echo $tag['path.skin']; ?>images/logo.png" alt="logo" class="img-responsive">
                    </div>
                    <div class="select md-only">
                        <a onclick="this.style.behavior='url(#default#homepage)';this.setHomepage('/')" href="/">设为首页</a>
                        <!-- <a class="text-main" href="javascript:;" onclick="SetHomepage();return false;">设为首页</a> -->

                        <span>|</span>
                        <a href="#" onclick="JavaScript:window.external.addFavorite('/','绿芯包装')" title="收藏本站到收藏夹">收藏本站</a>
                        <!-- <a class="text-main" href="javascript:;" onclick="AddFavorite();return false;">加入收藏</a> -->
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
            <!-- lx -- 导航 -->
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
    <!-- lx -- 导航结束 -->
    <!-- lx -- 内容 --> 
    <div class="container widget boderra" >
        <div style="background-color: #fff !important;">             
            <br>
            <div class="row">
                <!-- lx -- 左边 -->
                <div class="col-xs-4" >
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="nav nav-tabs" role="tablist" >
                                <li role="presentation">
                                    <a href="/" aria-controls="tongzhi" role="tab" data-toggle="tab" style="font-color: #0D8110;"> 导航菜单
                                    </a>
                                </li>
                            </ul>
                            <div class="container-box-info" style="min-height: 100px;">
                                <ul class="news" style="width: 90%;float: right;">
                                    <?php nav_sub(0,1,0); //侧导航调用的标签?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 martp">
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
	                                    <?php doc_list(17,8,0,0,0,0,true,false,'id',0) ?> 
	                                </ul>
	                            </div>
	                        </div>
                        </div>
                        <div class="col-xs-12" style="margin-top: 30px;margin-bottom: 20px;">
                            <div class="container-box">
                            <ul class="nav nav-tabs" role="tablist" >
                                <li role="presentation" class="active ">
                                    <a href="/" aria-controls="tongzhi" role="tab" data-toggle="tab"><i class="fa fa-bullhorn fa-lg"></i> 联系我们 / Contact Us
                                    </a>
                                </li>
                            </ul>
                            <div class="container-box-info" style="margin-top: 10px;">
                                <?php doc_list(8,4,2,0,0,0,true,false,'ordering',0) ?> 
                            </div>
                        </div>
                        </div>
                    </div>
                </div> 
                <!-- lx -- 左边结束 -->
                <div class="col-xs-8">
                    <?php sys_parts() ?> 
                </div>
            </div>
        </div>
    </div>
    <!-- lx -- 内容结束 --> 

    <!-- lx -- 脚部 --> 
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
    <script type="text/javascript">
        $(function () {
            $('.container-box-info').children().eq(5).children().eq(0).css('height','60px');
        })
    </script>
</body>
</html>