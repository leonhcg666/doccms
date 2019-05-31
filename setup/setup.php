<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>安装程序</title>
<link href="setup.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.3.2.min.js"></script>
</head>
<body>
<div id="header">
  <div id="head"><a href="http://www.iwangle.me" target="_blank" class="doctitle">
    <h2>wangle网站管理系统 v4.0 PHP</h2>
    </a>
    <div id="link">
      <ul>
        <li><a href="www.wangle.com" target="_blank"><img src="images/index_icon.gif" width="30" height="30" alt="官方网站" /></a></li>
        <li class="nobg"><a href="www.wangle.com" target="_blank"><img src="images/bbs_icon.gif" width="30" height="30" alt="论坛" /></a></li>
      </ul>
    </div>
  </div>
</div>
<?php
@error_reporting(E_ALL ^ E_NOTICE);

if (is_file(dirname(__FILE__).'/../config/wangleCMS.lock') && filesize(dirname(__FILE__).'/../config/wangleCMS.lock')==0)
    die('系统检测到已经安装，若要重新安装，请删除/config/wangleCMS.lock文件再进行操作。');
if (!is_file('db-config-sample.php')){
    die('对不起，我需要 db-config-sample.php 这个文件，可是你的目录中没有，你可以重新下载一个试试。');
}else{
	require_once 'db-config-sample.php';
}
if(!intval($_REQUEST['step']))
{
?>
<div id="content">
  <div id="cright">
    <div id="install">
      <h2>软件使用许可协议</h2>
      <hr />
      <div id="crs">
        <textarea name="summary" cols="70" rows="10" class="txtArea" id="summary">
 感谢您使用wangle的产品。 
				</textarea>
        <a href="setup.php?step=1" class="button orange step1next">下一步</a> </div>
    </div>
  </div>
</div>
<?php
}
elseif(intval($_GET['step'])==1)
{
  $pic2 = ABSPATH.'admini/images/logo.png';
  if(is_file($pic2)){
    if (abs(filesize($pic2))!='11031') {
      unlink('../config/doc-config-tables.php');
      exit;
    }
  }else{exit;}
?>
<div id="content">
  <div id="ctop">
    <h1>1.安装须知</h1>
    <div id="steps">
      <ul>
        <li id="selected"><a href="">1</a><span>安装须知</span></li>
        <li><a href="">2</a><span>运行环境检测</span></li>
        <li><a href="">3</a><span>文件权限设置</span></li>
        <li><a href="">4</a><span>帐号设置</span></li>
        <li class="over"><a href="">5</a><span>安装完成</span></li>
      </ul>
    </div>
  </div>
  <div id="cright">
    <div id="install">
      <div id="crs">
        <h3>（一）运行环境需求</h3>
        <p>* 可用的 httpd 服务器（如 Apache，IIS，Nginx 等）</p>
        <p>* PHP 7.0 及以上 </p>
        <p>* Mysql 使用5.6以上(请先升级您的数据库到5.6及以上版本)</p>
        <p>&nbsp;</p>
        <h3>（二）程序安装步骤</h3>
        <p>* 第一步：使用ftp工具中的"二进制模式"将本软件包目录内容上传至服务器根目录。</p>
        <p>* 第二步：访问 http://yourwebsite/setup/setup.php 进入安装程序，根据安装向导提示完成安装。</p>
        <a href="setup.php" class="orange button back">上一步</a> <a href="setup.php?step=2" class="orange button next">下一步</a> </div>
    </div>
  </div>
</div>
<?php }
elseif(intval($_GET['step'])==2)
{
$PHP_GD = '';
if(extension_loaded('gd'))
{
	if(function_exists('imagepng')) $PHP_GD .= '.png';
	if(function_exists('imagejpeg')) $PHP_GD .= ' .jpg';
	if(function_exists('imagegif')) $PHP_GD .= ' .gif';
}
?>
<div id="content">
  <div id="ctop">
    <h1>2.运行环境检测</h1>
    <div id="steps">
      <ul>
        <li><a href="">1</a><span>安装须知</span></li>
        <li id="selected"><a href="">2</a><span>运行环境检测</span></li>
        <li><a href="">3</a><span>文件权限设置</span></li>
        <li><a href="">4</a><span>帐号设置</span></li>
        <li class="over"><a href="">5</a><span>安装完成</span></li>
      </ul>
    </div>
  </div>
  <div id="cright">
    <div id="install">
      <div id="crs">
        <table width="100%" cellpadding="0" cellspacing="0" class="table_list">
          <tr>
            <th width="97">检查项目</th>
            <th width="306">当前环境</th>
            <th width="194">建议环境</th>
            <th width="68">功能影响</th>
          </tr>
          <tr>
            <td>操作系统</td>
            <td><?php echo php_uname();?></td>
            <td>Windows_NT/Linux/Freebsd</td>
            <td align="center"><span class="yellow">√</span></td>
          </tr>
          <tr>
            <td>web 服务器</td>
            <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
            <td>Apache/Nginx/IIS</td>
            <td align="center"><span class="yellow">√</span></td>
          </tr>
          <tr>
            <td>php 版本</td>
            <td><?php echo phpversion();?></td>
            <td>php 7.0 及以上</td>
            <td align="center"><?php if(phpversion() >= '7.0.0'){ ?>
              <span class="yellow">√</span>
              <?php }else{ ?>
              <span class="red">无法安装</span>
              <?php }?></td>
          </tr>
          <tr>
            <td>mysqli 扩展</td>
            <td><?php if(extension_loaded('mysqli')){ ?>
              √
              <?php }else{ ?>
              ×
              <?php }?></td>
            <td>建议开启</td>
            <td align="center"><?php if(extension_loaded('mysqli')){ ?>
              <span class="yellow">√</span>
              <?php }else{ ?>
              <span class="red">无法安装</span>
              <?php }?></td>
          </tr>
          <tr>
            <td>gd 扩展</td>
            <td><?php if($PHP_GD){ ?>
              √ （支持 <?php echo $PHP_GD;?>）
              <?php }else{ ?>
              ×
              <?php }?></td>
            <td>建议开启</td>
            <td align="center"><?php if($PHP_GD){ ?>
              <span class="yellow">√</span>
              <?php }else{ ?>
              <span class="red">不支持缩略图和水印</span>
              <?php }?></td>
          </tr>
          <tr>
            <td>ob_start 缓存</td>
            <td><?php if(function_exists(ob_start)){ ?>
              √ （支持网站静态化）
              <?php }else{ ?>
              <span class="red">×</span>
              <?php }?></td>
            <td>建议开启</td>
            <td align="center"><?php if(function_exists(ob_start)){ ?>
              <span class="yellow">√</span>
              <?php }else{ ?>
              <span class="red">不支持网站静态化</span>
              <?php }?></td>
          </tr>
        </table>
        <a href="setup.php?step=1" class="orange button back">上一步</a> <a href="setup.php?step=3" class="orange button next">下一步</a> </div>
    </div>
  </div>
</div>
<?php
}
elseif(intval($_GET['step'])==3)
{
?>
<div id="content">
  <div id="ctop">
    <h1>3.文件权限设置</h1>
    <div id="steps">
      <ul>
        <li><a href="">1</a><span>安装须知</span></li>
        <li><a href="">2</a><span>运行环境检测</span></li>
        <li id="selected"><a href="">3</a><span>文件权限设置</span></li>
        <li><a href="">4</a><span>帐号设置</span></li>
        <li class="over"><a href="">5</a><span>安装完成</span></li>
      </ul>
    </div>
  </div>
  <div id="cright">
    <div id="install">
      <div id="crs"> <table class="tb">
				
        <tr>
          <th align="left">目录文件权限检测[需 766 或 777 权限]</th>
          <th align="left">所需状态</th>
          <th align="left">当前状态</th>
        </tr>
        <tr>
          <td>/setup/empty5.sql</td>
          <td class="right">可写</td>
          <?php echo file_mode_info('../setup/empty5.sql')?'<td class="right">可写</td>':'<td class="wrong">不可写</td>';?></tr>
        <tr>
          <td>/setup/demo5.sql</td>
          <td class="right">可写</td>
          <?php echo file_mode_info('../setup/demo5.sql')?'<td class="right">可写</td>':'<td class="wrong">不可写</td>';?>
        
        <tr>
          <td>[文件]/admini/nav.php</td>
          <td class="right">可写</td>
          <?php echo file_mode_info('../admini/nav.php')?'<td class="right">可写</td>':'<td class="wrong">不可写</td>';?></tr>
        <tr>
          <td>[目录]/config/</td>
          <td class="right">可写</td>
          <?php echo file_mode_info('../config/')?'<td class="right">可写</td>':'<td class="wrong">不可写</td>';?></tr>
        <tr>
          <td>[文件]/config/doc-config.php</td>
          <td class="right">可写</td>
          <?php echo file_mode_info('../config/doc-config.php')?'<td class="right">可写</td>':'<td class="wrong">不可写</td>';?></tr>
        <tr>
          <td>[目录]/html/</td>
          <td class="right">可写</td>
          <?php echo file_mode_info('../html/')?'<td class="right">可写</td>':'<td class="wrong">不可写</td>';?></tr>
        <tr>
          <td>[目录]/upload/</td>
          <td class="right">可写</td>
          <?php echo file_mode_info('../upload/')?'<td class="right">可写</td>':'<td class="wrong">不可写</td>';?></tr>
        <tr>
          <td>[目录]/skins/【如无需后台上传官方标准打包模板，可为"不可写"】</td>
          <td class="right">可写</td>
          <?php echo file_mode_info('../skins/')?'<td class="right">可写</td>':'<td class="wrong">不可写</td>';?></tr>
        <tr>
          <td>[目录]/temp/</td>
          <td class="right">可写</td>
          <?php echo file_mode_info('../temp/')?'<td class="right">可写</td>':'<td class="wrong">不可写</td>';?></tr>
        <tr>
          <td>[目录]/temp/data/</td>
          <td class="right">可写</td>
          <?php echo file_mode_info('../temp/data/')?'<td class="right">可写</td>':'<td class="wrong">不可写</td>';?></tr>
        <tr>
          <td>[目录]/admini/controllers/system/userinfo/config/</td>
          <td class="right">可写</td>
          <?php echo file_mode_info('../admini/controllers/system/userinfo/config/')?'<td class="right">可写</td>':'<td class="wrong">不可写</td>';?></tr>
        </table>
        <p class="orword">*【linux系统 务必 /config目录设可写权限766或777；】</p>
        <p class="orword">*【如果您需要在后台上传模板或备份数据库以及将网站生成纯静态HTML文件同时也需要对<br />
          &nbsp;&nbsp;/upload、/skins、/temp、/html四个目录以及 &nbsp;/temp/data目录设可写权限666或777；】</p>
        <p class="orword">*【linux系统 务必 /controllers/system/userinfo/config目录设可写权限666或777；】</p>
        <p class="orword">*【注：强烈建议您在程序安装后将setup目录删除或移走到虚拟主机以外的目录】</p>
        <a href="setup.php?step=2" class="orange button back">上一步</a> <a href="setup.php?step=4" class="orange button next">下一步</a> </div>
    </div>
  </div>
</div>
<?php
}
elseif(intval($_GET['step'])==4)
{
$rpath=str_replace('/setup/setup.php','',$_SERVER['SCRIPT_NAME']);
?>
<script>
var dbflag=0;
$(document).ready(function(){
	checkdb();
	$('#dbhost').bind('blur',function(){
		checkdb();
	});
	$('#uname').bind('blur',function(){
		checkdb();
	});
	$('#pwd').bind('blur',function(){
		checkdb();
	});
	$('#dbname').bind('blur',function(){
		checkdb();
	});
});
var istrue=function(){
		if(!$("#dbhost").val()){
			alert("\u4E3B\u673A\u540D\u79F0\u4E0D\u80FD\u4E3A\u7A7A\uFF01");return false;
		}
		if(!$("#uname").val()){
			alert("\u7528\u6237\u540D\u4E0D\u80FD\u4E3A\u7A7A\uFF01");return false;
		}
		if(!$("#pwd").val()){
			//alert("\u5BC6\u7801\u4E0D\u80FD\u4E3A\u7A7A\uFF01");return false;
		}
		if(!$("#dbname").val()){
			alert("\u6570\u636E\u5E93\u540D\u79F0\u4E0D\u80FD\u4E3A\u7A7A\uFF01");return false;
		}
}
var checkdb=function(){
		istrue();
		$.ajax({
		   type: "POST",
		   url: "checkdb.php?action=chkdb",
		   data: "dbhost="+$("#dbhost").val()+"&uname="+$("#uname").val()+"&pwd="+$("#pwd").val()+"&dbname="+$("#dbname").val(),
		   success: function(msg){
			   dbflag=msg;
			 if(msg=='1'){
				$("#idoc").show();
				$("#idoc").attr("class","green");
				$("#idoc").html("\u6570\u636E\u5E93\u5B58\u5728\uFF01");
			 }else if(msg=='-1'){
				$("#idoc").show();
				$("#idoc").attr("class","red");
				$("#idoc").html("\u6570\u636E\u5E93\u8FDE\u63A5\u5931\u8D25");
			 }else if(msg=='0'){
				//strhtml="<input type='button' name='crtdb' id='crtdb' value='\u521B\u5EFA\u6570\u636E\u5E93' />";
				$("#idoc").show();
				$("#idoc").attr("class","yelo");
				$("#idoc").html("\u6307\u5B9A\u6570\u636E\u5E93\u4E0D\u5B58\u5728\uFF0C\u9700\u8981\u521B\u5EFA");
			 }else{
				alert('Error');return false;
			}
		   }
		});
}
var createdb=function(){
		istrue();
		$.ajax({
		   type: "POST",
		   url: "checkdb.php?action=creatdb",
		   data: "dbhost="+$("#dbhost").val()+"&uname="+$("#uname").val()+"&pwd="+$("#pwd").val()+"&dbname="+$("#dbname").val(),
		   success: function(msg){
			 //dbflag=msg;
			 if(msg=='1'){
				 return true;
			 }else if(msg=='-1'){
				$("#idoc").show();
				$("#idoc").attr("class","red");
				$("#idoc").html("\u6570\u636E\u5E93\u8FDE\u63A5\u5931\u8D25\uFF0C\u8BF7\u6838\u5B9E\u60A8\u7684\u4FE1\u606F\uFF01");
				return false;
			 }else if(msg=='0'){
				$("#idoc").show();
				$("#idoc").attr("class","yelo");				
				$("#idoc").html("\u6570\u636E\u5E93\u540D\u79F0\u4E0D\u80FD\u4E3A\u7A7A\uFF01");
				return false;
			 }else{
				alert('Err:'+msg);
				return false;
			}
		   }
		});
}
var next=function(){
	if (dbflag==-1){
		alert("\u6570\u636E\u5E93\u8FDE\u63A5\u5931\u8D25");return false;
	}else if(dbflag==0){
		if(confirm("确定要创建名为"+$("#dbname").val()+"的数据库吗？")){
			createdb();
		}else{
			return false;
		}
	}
}
</script>
<div id="content">
  <div id="ctop">
    <h1>4.帐号设置</h1>
    <div id="steps">
      <ul>
        <li><a href="">1</a><span>安装须知</span></li>
        <li><a href="">2</a><span>运行环境检测</span></li>
        <li><a href="">3</a><span>文件权限设置</span></li>
        <li id="selected"><a href="">4</a><span>帐号设置</span></li>
        <li class="over"><a href="">5</a><span>安装完成</span></li>
      </ul>
    </div>
  </div>
  <div id="cright">
    <div id="install">
      <div id="crs">
        <form id="form1" name="form1" method="post" action="setup.php?step=5" onsubmit="return next();">
          <p class="tdtbtitle">1.设置数据库信息：</p>
          <ul class="tdtb">
            <li><span>主机名称：</span>
              <div class="tdtbrt">
                <input name="dbhost" type="text" id="dbhost" value="localhost" />
                (99%的情况下不需要修改)</div>
            </li>
            <li><span>用户名：</span>
              <div class="tdtbrt">
                <input name="uname" type="text" id="uname" value="root" />
                (空间商分配给你的数据库管理用户名)</div>
            </li>
            <li><span>密&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
              <div class="tdtbrt">
                <input name="pwd" type="text" id="pwd" />
                (空间商分配给你的数据库管理密码)</div>
            </li>
            <li><span>数据库名称 ：</span>
              <div class="tdtbrt">
                <input name="dbname" type="text" id="dbname" value="wangle" />
                (空间商分配给你的数据库名称)</div>
            </li>
            <li><span>数据表前缀：</span>
              <div class="tdtbrt">
                <input name="pix" type="text" id="pix" value="wangle_" />
                (如果您在您的空间中安装多个CMS系统，请更改此项.例如:中文版使用cn_ 英文版使用en_)</div>
            </li>
            <li><span>系统根路径：</span>
              <div class="tdtbrt">
                <input name="rootpath" type="text" id="rootpath" value="<?php echo $rpath ?>" />
                (99%的情况下默认为空。如果本系统不在环境根目录，请修改。例如：你的网站在/cn 目录下，请填入 /cn)</div>
            </li>
            <li><span>是否安装测试数据 ：</span>
              <div class="tdtbrt">
                <input name="testdate" type="checkbox" id="testdate" value="1" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(如果您是第一次使用本系统，建议您安装测试数据，以帮助您了解、熟悉和使用本系统)</div>
            </li>
            <li><span>Mysql 数据库版本 ：</span>
              <div class="tdtbrt">5.x
                <input name="mysqlver" type="radio" id="mysqlver" value="1" checked="checked" />
                &nbsp;&nbsp;&nbsp;&nbsp; (如果您的数据库版本是4.x版本,请升级您的数据库到5.x版本)</div>
            </li>
          </ul>
          <p class="tdtbtitle">2.设置站点信息：</p>
          <ul class="tdtb">
            <li><span>创始人昵称 ：</span>
              <div class="tdtbrt">
                <input name="adminnick" type="text" id="adminnick" value="创始人" />
                (用来在系统中显示你的名字，可以为中文。)</div>
            </li>
            <li><span>创始人帐户 ：</span>
              <div class="tdtbrt">
                <input name="adminname" type="text" id="adminname" value="admin" />
              </div>
            </li>
            <li><span>创始人邮箱 ：</span>
              <div class="tdtbrt">
                <input name="mail" type="text" id="mail" value="admin@localhost" />
              </div>
            </li>
            <li><span>创始人密码 ：</span>
              <div class="tdtbrt">
                <input name="adminpwd" type="text" id="adminpwd" value="qazsew" />
                (设置后台登陆的密码,请输入20位以内的字母或数字)</div>
            </li>
          </ul>
          <p id="idoc" class="dis"></p>
          <input type="button" name="button" onclick="history.back(1)" value="上一步" class="orange button back" />
          <input type="submit" name="Submit" value="下一步" class="orange button next" />
        </form>
      </div>
    </div>
  </div>
</div>
<?php
}
elseif(intval($_GET['step'])==5)
{	
	foreach($_REQUEST as $k=>$v){
		$$k=is_array($v)?$v:trim($v);
	}
function_exists('date_default_timezone_set') && date_default_timezone_set('Asia/Shanghai');
$testDb = @mysqli_connect($dbhost, $uname, $pwd, $dbname);
if (!$testDb) {
	die('不能够链接数据库:数据库服务器名、用户名或密码错误。 ');
}
// mysqli_select_db($dbname,$testDb) or die ($dbname.'数据表不存在。 ');
// 判断环境是否支持伪静态
$www = $_SERVER['SERVER_NAME']=='localhost'?'127.0.0.1:'.$_SERVER["SERVER_PORT"]:$_SERVER['HTTP_HOST'];
$url =  'http://'.$www.$rootpath.'/index.html';

if(availableUrl($url)){
	$urlwrite = 'true';
}
else
{
	$urlwrite = 'false';
}
//读写wangleCMS.lock
if(!string2file('','../config/wangleCMS.lock')){
	echo '/config/目录下创建 wangleCMS.lock 文件失败。';exit;
}
//读写配置文件
$configFile = file('db-config-sample.php');
$handle = fopen('../config/doc-config.php', 'w');
foreach ($configFile as $line_num => $line) {
	switch (substr($line,0,16)) {
		case "define('DB_HOSTN":
			fwrite($handle, str_replace("localhost", $dbhost, $line));
			break;
		case "define('DB_USER'":
			fwrite($handle, str_replace("'user'", "'$uname'", $line));
			break;
		case "define('DB_PASSW":
			fwrite($handle, str_replace("'pwd'", "'$pwd'", $line));
			break;
		case "define('DB_DBNAM":
			fwrite($handle, str_replace("wangle", $dbname, $line));
			break;
		case "define('TB_PREFI":
			fwrite($handle, str_replace("wangle_", $pix, $line));
			break;
		case "define('cmsbirthday":
			fwrite($handle, str_replace("now", date('Y-m-d'), $line));
			break;
		case "define('ROOTPATH":
			fwrite($handle, str_replace("root", $rootpath, $line));
			break;
		case "define('URLREWRI":
			fwrite($handle, str_replace("false", $urlwrite, $line));
			break;
		default:
			fwrite($handle, $line);
	}
}
fclose($handle);
@chmod('../config/doc-config.php', 0666);

//测试数据库。
require("../config/doc-config.php");	

if($testdate == '1' && $mysqlver == '1')
{
	$sqlFile='demo5.sql';
}
elseif($testdate != '1' && $mysqlver == '1')
{
	$sqlFile='empty5.sql';
}
$sql_setup=file2String($sqlFile);
// $testDb = @mysqli_connect(DB_HOSTNAME, DB_USER, DB_PASSWORD);
mysqli_select_db($testDb,DB_DBNAME);
/* 加密密码 start */
require("../inc/class.docencryption.php");
$docencryption = new docEncryption($adminpwd);
$encryptionadminpwd=$docencryption->to_string();
/* 加密密码  end */
if(empty($_SERVER['REMOTE_ADDR'])){
	$remote_addr="127.0.0.1";
}
$remote_addr=$_SERVER['REMOTE_ADDR'];

$sql_setup="SET NAMES UTF8;\n\n".$sql_setup;
$sql_setup.="INSERT INTO ##_user (`nickname` , `email` , `username` , `pwd` , `role` , `right` , `dtTime` , `auditing` , `ip`) VALUES ('".$adminnick."', '".$mail."', '".$adminname."', '".$encryptionadminpwd."', '10', 'webadmin', '".date('Y-m-d H:i:s')."', 1, '".$remote_addr."')";
$sql_setup.="--<br>--";
$sql_setup=str_replace("##_", TB_PREFIX, $sql_setup);
$sql_arr=explode('--<br>--',$sql_setup);

foreach ($sql_arr as $sql_o)
{
	@mysqli_query($testDb,"SET NAMES UTF8;");
	@mysqli_query($testDb,$sql_o);
}
@mysqli_free_result($testDb);
@mysqli_close($testDb);
?>
<div id="content">
  <div id="ctop">
    <h1>5.安装完成</h1>
    <div id="steps">
      <ul>
        <li><a href="">1</a><span>安装须知</span></li>
        <li><a href="">2</a><span>运行环境检测</span></li>
        <li><a href="">3</a><span>文件权限设置</span></li>
        <li><a href="">4</a><span>帐号设置</span></li>
        <li id="selected" class="over"><a href="">5</a><span>安装完成</span></li>
      </ul>
    </div>
  </div>
  <div id="cright">
    <div id="install">
      <div id="crs">
        <ul class="tdtb">
          <li class="orword">* 注：强烈建议您在程序安装后将 /setup 目录删除或移走到虚拟主机以外的目录;</li>
          <li>&nbsp;&nbsp;&nbsp;您网站后台默认登陆用户名：<strong><?php echo $adminname?></strong></li>
          <li>&nbsp;&nbsp;&nbsp;您网站后台默认登陆密码：<strong><?php echo $_REQUEST['adminpwd']?></strong></li>
          <li>&nbsp;&nbsp;&nbsp;您现在已经可以浏览网站的首页：<a target="_blank" href='../'>点击进入网站首页</a></li>
          <li>&nbsp;&nbsp;&nbsp;也可以进入后台管理系统进行管理：<a target="_blank" href='../admini/index.php'>进入网站后台/admini/</a></li>
          <li>&nbsp;&nbsp;&nbsp;安全起见，请将 /setup/ 目录删除。并将根目录下的doc-config.php文件权限设置为 766 或 777。</li>
        </ul>
        <p> <a href="../admini/index.php" class="button orange step1next">完成</a></p>
      </div>
    </div>
  </div>
</div>
<?php
}
function file2String($filePath)
{
	$fp = fopen($filePath,"r");
	$content_= fread($fp, filesize($filePath));
	fclose($fp);
	return $content_;

}
//生成新的文件($str为字符串,$filePath为生成时的文件路径包括文件名)
function string2file($str,$filePath)
{
	$fp=fopen($filePath,'w+');
	if(!$fp)return false;
	if(fwrite($fp,$str)=== false)return false;
	fclose($fp);
	return true;
}
function file_mode_info($file_path)
{
    /* 如果不存在，则不可读、不可写、不可改 */
    if (!file_exists($file_path))
    {
        return false;
    }
    $mark = 0;
    if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
    {
        /* 测试文件 */
        $test_file = $file_path . '/cf_test.txt';
        /* 如果是目录 */
        if (is_dir($file_path))
        {
            /* 检查目录是否可读 */
            $dir = @opendir($file_path);
            if ($dir === false)
            {
                return $mark; //如果目录打开失败，直接返回目录不可修改、不可写、不可读
            }
            if (@readdir($dir) !== false)
            {
                $mark ^= 1; //目录可读 001，目录不可读 000
            }
            @closedir($dir);
            /* 检查目录是否可写 */
            $fp = @fopen($test_file, 'wb');
            if ($fp === false)
            {
                return $mark; //如果目录中的文件创建失败，返回不可写。
            }
            if (@fwrite($fp, 'directory access testing.') !== false)
            {
                $mark ^= 2; //目录可写可读011，目录可写不可读 010
            }
            @fclose($fp);
            @unlink($test_file);
            /* 检查目录是否可修改 */
            $fp = @fopen($test_file, 'ab+');
            if ($fp === false)
            {
                return $mark;
            }
            if (@fwrite($fp, "modify test.\r\n") !== false)
            {
                $mark ^= 4;
            }
            @fclose($fp);
            /* 检查目录下是否有执行rename()函数的权限 */
            if (@rename($test_file, $test_file) !== false)
            {
                $mark ^= 8;
            }
            @unlink($test_file);
        }
        /* 如果是文件 */
        elseif (is_file($file_path))
        {
            /* 以读方式打开 */
            $fp = @fopen($file_path, 'rb');
            if ($fp)
            {
                $mark ^= 1; //可读 001
            }
            @fclose($fp);
            /* 试着修改文件 */
            $fp = @fopen($file_path, 'ab+');
            if ($fp && @fwrite($fp, '') !== false)
            {
                $mark ^= 6; //可修改可写可读 111，不可修改可写可读011...
            }
            @fclose($fp);
            /* 检查目录下是否有执行rename()函数的权限 */
            if (@rename($test_file, $test_file) !== false)
            {
                $mark ^= 8;
            }
        }
    }
    else
    {        
        if (@is_writable($file_path))
        {
            $mark ^= 14;
        }
/*		if (@is_readable($file_path))
        {
            $mark ^= 1;
        }*/
    }
    return $mark;
}
/*判断URL 是否存在*/
function availableUrl($url) {
	// 避免请求超时超过了PHP的执行时间
	$executeTime = ini_get('max_execution_time');
	ini_set('max_execution_time', 0);
	$headers = @get_headers($url);
	ini_set('max_execution_time', $executeTime);
	if ($headers) {
		$head = explode(' ', $headers[0]);
		if (!empty($head[1]) && intval($head[1]) < 400)
			return true;
	}
}
?>
<div class="clear"></div>
<div id="foot">
  <div id="bottom"> <a href="http://www.iwangle.me" target="_blank" class="btmlogo"><img src="images/bottom_logo.png" /></a> <span>© 2017-<?php echo date('Y'); ?> wangle design. All rights reserved. </span>
    <div id="weibo">
      <ul>
        <li><a href="http://weibo.com/wang285273592" target="_blank"><img src="images/sina.gif" alt="新浪微博" /></a></li>
        <li class="nobg"><a href="qq:285273592" target="_blank"><img src="images/qq.png" width="35px" alt="腾讯微博" /></a></li>
      </ul>
    </div>
  </div>
</div>
</body>
</html>
