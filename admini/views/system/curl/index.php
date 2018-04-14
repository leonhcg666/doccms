<style type="text/css">
.txt { width:400px; font-size:12px; }
#tabs5 { text-align:left; border:none; }
.menu5box { position:relative; overflow:hidden; height:30px; text-align:left; }
.menu5box .savetab { float:right; }
#menu5 { position:absolute; top:0; left:0; z-index:1; }
#menu5 li { float:left; display:block; cursor:pointer; width:82px; text-align:center; line-height:29px; height:30px; cursor:pointer; }
#menu5 li a { text-decoration:none; color:#0099FF; }
#menu5 li.hover { background:#F5F9FD; height:29px; width:80px; border-left:1px solid #ccc; border-top:1px solid #ccc; border-right:1px solid #ccc; }
.main5box { clear:both; margin-top:-1px; border:1px solid #ccc; background:#F5F9FD; }
#main5 ul { display: none; padding:18px 0; }
#main5 ul.block { display: block; }
.small { color:#999; font-size:12px; font-weight:normal; text-align:right; width:210px; padding-left:10px }
.mail tr { height:30px }
</style>
<script src="/skins/doccms_model_1/res/js/jquery.min.js"></script>
<script language = "JavaScript"> 
var onecount; 
subcat = new Array(); 
<?php echo type();?>     
onecount=3; 
function changelocation(locationid) 
    { 
    document.form1.select.length = 1;  
    var locationid=locationid; 
    for (var i=0;i < onecount; i++) 
        { 
            if (subcat[i][0] == locationid) 
            {  
              for (var h = 1; h < subcat[i].length; h++) {
                document.form1.select.options[document.form1.select.length] = new Option(subcat[i][h],subcat[i][h]); 
              };
            }         
        } 
    }
    
</script>
<script type="text/javascript">
  function curlpost(){
      var urlweb=$("#urlweb").val();
      var select=$("#sel").val();
      var listurl=$("#listurl").val();
      $.ajax({
        type:"POST",
        url:"./index.php?m=system&s=curl&a=curl",
        data:"urlweb="+urlweb+"&select="+select+"&listurl="+listurl,
        timeout:"4000",
        dataType:"json",                                 
        success: function(html){
         switch (html.flag){
          case "0": del.next().append('<td colspan="6">购物车为空，请继续购物！</td>');break;
          case "1": $("#url").html(html.url); break;
          default:;
        }
        del.remove();
        alert("操作成功");
        }
      });
    }
</script>
<div class="location">当前位置: <a href="./index.php">首 页</a> → <a href="./index.php?m=system&s=managechannel">操作员后台</a> → <a href="./index.php?m=system&s=curl">采集设置</a></div>
<div id="tabs5">
<div class="menu5box">
  <ul id="menu5">
    <li class="hover">采集设置</li>
  </ul>

  <div class="savetab">
    <input name="saveme" onclick="curlpost();" type="button" class="savebt" value=" 保存设置 " />
  </div>
</div>
<div class="main5box">
    <span id="url">1</span>  <span id="title">2</span>
  <div class="main" id="main5">
    <form name="form1" method="POST" action="" enctype="multipart/form-data">
      <ul class="block">
        <li>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td>
        <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="200">采集规则名称：</td>
                    <td colspan="2"><input name="urlname" type="text" class="txt" id="urlname" value="" size="41" />
                      用来记录采集规则名称</td>
                  </tr>
                  <tr>
                    <td>采集站点域名：</td>
                    <td colspan="2"><input name="urlweb" type="text" class="txt" id="urlweb" value="" size="41" />记录采集站点域名显示图片等资源</td>
                  </tr>
                  <tr>
                    <td>采集到：</td>
                    <td colspan="2">
                      <select id="select1" class="txt" style="height:30px;width:200px;" onChange="changelocation(document.form1.select1.options[document.form1.select1.selectedIndex].value)"> 
                 <option value="0">要采集到的模块</option> 
                 <option value="list">新闻模块</option> 
             </select> 
             <select name="select" id="sel" class="txt" style="height:30px;width:200px;">
               <option value="" >请选择栏目</option>
            </select>
          <span class="small">选择需要采集到的栏目</span>
                      </td>
                  </tr>
                  <tr>
                    <td>采集的规则列表：</td>
                    <td colspan="2"><textarea name="listurl" type="text" class="txt" id="listurl" value="" size="41" style="height:300px;" /></textarea>
                      <span class="small">在此添加要采集的网址列表以;分割：http://www.90show.net/Inews/n16.html;http://www.90show.net/Inews/n38.html</span>
        </td>
                  </tr>
                  <tr>
                    <td>内容链接表达式：</td>
                    <td colspan="2"><input name="list" type="text" class="txt" id="list" value="" size="41" />
                      <span class="small">内容页面链接匹配规则以(.*?)代替值：<xmp style="display:inline;white-space:pre-wrap;word-wrap:break-word;"><a href="(.*?)" title=""><b>.*?</b></a></xmp></span></td>
                  </tr>
                  <tr>
                    <td>标题表达式：</td>
                    <td colspan="2"><input name="title" type="text" class="txt" id="title" value="" size="41" />
                      <span class="small">标题表达式以(.*?)代替值：<xmp style="display:inline;white-space:pre-wrap;word-wrap:break-word;"><title>(.*?)</title></xmp></span></td>
                  </tr>
                  <tr>
                    <td>关键词表达式：</td>
                    <td colspan="2"><input name="keywords" type="text" class="txt" id="keywords" value="" size="41" />
                      <span class="small">关键词表达式以(.*?)代替值：<xmp style="display:inline;white-space:pre-wrap;word-wrap:break-word;"><meta name="keywords" content="(.*?)" /></xmp></span></td>
                  </tr>
                  <tr>
                    <td>描述表达式：</td>
                    <td colspan="2"><input name="description" type="text" class="txt" id="description" value="" size="41" />
                      <span class="small">描述表达式以(.*?)代替值：<xmp style="display:inline;white-space:pre-wrap;word-wrap:break-word;"><meta name="description" content="(.*?)" /></xmp></span></td>
                  </tr>
                  <tr>
                    <td>图片表达式：</td>
          <td colspan="2"><input name="images" type="text" class="txt" id="images" value="" size="41" />
                      <span class="small">图片表达式以(.*?)代替值：<xmp style="display:inline;white-space:pre-wrap;word-wrap:break-word;"><div class="v-inner">.*?<a href="(.*?)" id="originalImg"><img src=".*?" alt=".*?" /></a>.*?</div></xmp></span></td>
                  </tr>
                  <tr>
                    <td>正文表达式：</td>
                    <td colspan="2"><input name="content" type="text" class="txt" id="content" value="" size="41" />
                      <span class="small">正文表达式以(.*?)代替值：<xmp style="display:inline;white-space:pre-wrap;word-wrap:break-word;"><div class="v-inner">.*?<a href="(.*?)" id="originalImg"><img src=".*?" alt=".*?" /></a>.*?</div></xmp></span></td>
                  </tr>
                  
                  <tr>
                    <td colspan="3"><hr></td>
                  </tr>
              </table>
        </td>
            </tr>
          </table>
        </li>
      </ul>
    </form>
  </div>
</div>
