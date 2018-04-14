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
  </head>
<body>
    <div class="container">
        <!-- lr -- 头部 -->
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
            <!-- lr -- 头部结束 -->
            </div>
            <!--xr -- 导航 -->
            <nav class="container navbar" id="navbar-custom" style="padding-left: 0px;">
                <ul class="nav navbar-nav menu bg-main" id="custom-menu"  >
                    <li><a href="/">首页<span class="sr-only">(current)</span></a></li>
                    <?php nav_main(); /*注释：默认样式为模板目录/index/__nav/nav_main_0.php*/ ?>
                </ul>
                <!-- </div>/.navbar-collapse -->
            </nav>
        </div>
    </div>
    <!--xr -- 导航结束 -->
    <!--xr -- 内容 --> 
    <div class="container widget boderra" >
        <div style="background-color: #fff !important;">             
            <br>
            <div class="row">
                <!-- lr -- 左边 -->
                <div class="col-xs-4" >
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="nav nav-tabs" role="tablist" >
                                <li role="presentation">
                                    <a href="/" aria-controls="tongzhi" role="tab" data-toggle="tab"> 导航菜单
                                    </a>
                                </li>
                            </ul>
                            <div class="container-box-info">
                                <ul class="news" style="width: 90%;float: right;">
                                    <li style="margin-top: 10px;">
                                        <span style="margin-right: 10px"><img src="<?php echo $tag['path.skin']; ?>images/gou.png"></span>
                                       <a href="/">子栏目</a>
                                       <hr style="margin: 0" />
                                    </li>
                                    <li style="margin-top: 10px;">
                                        <span style="margin-right: 10px"><img src="<?php echo $tag['path.skin']; ?>images/gou.png"></span>
                                       <a href="/">子栏目</a>
                                       <hr style="margin: 0" />
                                    </li>
                                    <li style="margin-top: 10px;">
                                        <span style="margin-right: 10px"><img src="<?php echo $tag['path.skin']; ?>images/gou.png"></span>
                                       <a href="/">子栏目</a>
                                       <hr style="margin: 0" />
                                    </li>
                                    <li style="margin-top: 10px;">
                                        <span style="margin-right: 10px"><img src="<?php echo $tag['path.skin']; ?>images/gou.png"></span>
                                       <a href="/">子栏目</a>
                                       <hr style="margin: 0" />
                                    </li>
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
	                                <span class="more" style="display: inline;float: right;"><a href="/">更多 >><i class="fa fa-angle-double-right"></i></a>
	                                </span>
	                            </ul>
	                            <div class="container-box-info">
	                                <ul class="news">
	                                    <?php doc_list(2,6,0,0,0,0,true,false,'id',0) ?> 
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
                            <div class="container-box-info">
                                <div class="lxph adds">
                                    <span style="display: inline;float: left;margin-right: 15px"><img src="<?php echo $tag['path.skin']; ?>images/dh.png" alt=""></span>
                                    <p>联系电话:18333333333</p>
                                </div>
                                <div class="lxph adds">
                                    <span style="display: inline;float: left;margin-right: 15px"><img src="<?php echo $tag['path.skin']; ?>images/yx.png" alt=""></span>
                                    <p>企业邮箱:8888@163.com</p>
                                </div>
                                <div class="lxph adds">
                                    <span style="display: inline;float: left;margin-right: 15px"><img src="<?php echo $tag['path.skin']; ?>images/dz.png" alt=""></span>
                                    <p>公司地址:四川省雅安市****</p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div> 
                <!-- lr -- 左边结束 -->
                <div class="col-xs-8">
                    <div class="title" style="text-align: center; font-size: 22px;margin-bottom: 20px;">
                        <p>我国瓦楞纸箱包装预计今年将有15%的增量</p>
                    </div>
                    <div style="font-size: 12px;margin: 0 20px">
                        <span>2016年6月24日</span><span>　作者：wangle</span><span style="float: right;">点击量：999</span>
                        <hr style="margin: 5px 0 10px 0">
                    </div>
                    <div class="neir" style="margin: 10px 20px">
                        　　<?php sys_parts() ?> 
                    </div>
                    <div style="float: right;margin-right: 20px">
                        <p ><a href="" style="color: #0D8110">返回顶部</a></p>
                    </div>
                    <div>
                        <hr style="margin: 0 ;padding: 0;width: 100%">
                    </div>
                    <div style="margin-top: 10px;margin-left: 10px;font-size: 13px">
                        <p>上一篇：<a href="">公斤以上重型纸袋包装、机电产品以纸</a></p>
                        <p>下一篇：<a href="">展览广告上大力引导，这类包装</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--xr -- 内容结束 --> 

    <!--xr -- 脚部 --> 
    <hr style="border-top:  5px solid #0D8110;margin-top: 10px;margin-bottom: 3px">
    <!-- <hr style="border-top:  5px solid #0DA6CC;margin-top: 0px;margin-bottom: 3px;"> -->
    <div class="container" style="width: 100% !important; margin:0;padding: 0; background-image: url('<?php echo $tag['path.skin']; ?>images/foot.png');">
        <div class="footer ">

            <div class="row">
                <div style="width: 100%">
                    <div class="cpy text-center">
                        <p><span>联系热线：13888888888</span><br><span>地址：四川省雅安市雨城区***********</span><br><span>Copyright © 2016 绿芯新型食品包装科技有限责任公司</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--xr -- 脚部结束 --> 
    <script src="<?php echo $tag['path.skin']; ?>js/jquery.min.js"></script>
    <script src="<?php echo $tag['path.skin']; ?>js/touchSwipe.min.js"></script>
    <script src="<?php echo $tag['path.skin']; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $tag['path.skin']; ?>js/style.js"></script>   
</body>
</html>