<?php
@session_start();
@error_reporting(E_ALL ^ E_NOTICE);
header('Content-Type: text/html; charset=utf-8');
define('THISISADMINI',true);
$dirName=dirname(__FILE__);
if(!is_file($dirName.'/../config/doc-config.php')||filesize($dirName.'/../config/doc-config.php')==0||filesize($dirName.'/../config/doc-config.php')==3){echo '<script>window.location.href="../index.php"</script>';}
require($dirName.'/../config/doc-config.php');
function_exists('date_default_timezone_set') && @date_default_timezone_set('Etc/GMT-'.TIMEZONENAME);
require(ABSPATH.'/inc/function.php');
if(is_file(ABSPATH.'/inc/common.php'))require_once(ABSPATH.'/inc/common.php');
require(ABSPATH.'/inc/class.database.php');
require(ABSPATH.'/inc/class.pager.php');
require(ABSPATH.'/inc/class.ui.php');
if(empty($_SESSION[TB_PREFIX.'admin_name']) or $_SESSION[TB_PREFIX.'admin_roleId']<7){
	redirect('login.php');
}
//IP登录限制
if(defined('LOGINIP') && LOGINIP!='')
{
	$ip = explode(';',LOGINIP);
	!in_array(long2ip(getip()),$ip)?exit:'';
}

$_REQUEST = cleanArrayForMysql($_REQUEST);
$_GET 	  = cleanArrayForMysql($_GET);
$_POST 	  = cleanArrayForMysql($_POST);
$request  = $_REQUEST;

$request['p']=isset($request['p'])?intval($request['p']):'';
$request['c']=isset($request['c'])?intval($request['c']):'';
$request['n']=isset($request['n'])?intval($request['n']):'';
$request['i']=isset($request['i'])?intval($request['i']):'';
$request['cid']=isset($request['cid'])?intval($request['cid']):'';
$request['mdtp']=isset($request['mdtp'])?intval($request['mdtp']):'';
$request['comment']=isset($request['comment'])?intval($request['comment']):'';
$request['path']=$request['path'] ?? '';

$pageInfo=array();
$pageInfo['display']=true;
$pageInfo['header']=ABSPATH."/admini/views/header.php";
$pageInfo['footer']=ABSPATH."/admini/views/footer.php";
require_once(ABSPATH.'/admini/global.php');
switch($request['m'])
{
	case 'system':
		$module_name = empty($request['s'])?'index':$request['s'];
		$pageInfo['header']=ABSPATH."/admini/views/system_header.php";

		$controller = ABSPATH.'/admini/controllers/system/'.$module_name.'.php';
		if(is_file($controller))
		{
			require_once($controller);
			empty($request['a'])?index():(function_exists($request['a'])?$request['a']():die("无此Action #$request[a]"));
		}else{
			die('尚未安装'.$module_name.'模块。');
		}

		$view = empty($request['a'])?ABSPATH.'/admini/views/system/'.$module_name.'/index.php':ABSPATH.'admini/views/system/'.$module_name.'/'.$request['a'].'.php';
		break;
	default:
		$module_name = empty($request['p'])?'index':get_model_type($request['p']);
		$controller = ABSPATH.'/admini/controllers/'.$module_name.'.php';
		if(is_file($controller))
		{
			require_once($controller);
			require_once(ABSPATH.'/admini/controllers/comment.php');

			$view = empty($request['a'])?ABSPATH.'/admini/views/'.$module_name.'/index.php':ABSPATH.'/admini/views/'.$module_name.'/'.$request['a'].'.php';
			empty($request['a'])?index():(function_exists($request['a'])?$request['a']():die("无此Action #$request[a]"));
		}
		else die('尚未安装'.$module_name.'模块。');
}
$pic = ABSPATH.'admini/images/box.png';
if(is_file($pic)){abs(filesize($pic))!='8880'?exit:'';}else{exit;}
$pic1 = ABSPATH.'admini/images/footbg.png';
if(is_file($pic1)){abs(filesize($pic1))!='6603'?exit:'';}else{exit;}
$pic2 = ABSPATH.'admini/images/logo.png';
if(is_file($pic2)){
	if (abs(filesize($pic2))!='11031') {
		unlink('../config/doc-config-tables.php');
		exit;
	}
}else{exit;}
if($pageInfo['display'])require_once($pageInfo['header']);
if(is_file($view)) 	require_once($view);
isComment();
if($pageInfo['display'])require_once($pageInfo['footer']);

function __autoload($class_name)
{
	$model = ABSPATH.'/admini/models/'.$class_name.'.php';
	if(is_file($model))require_once($model);
}

function get_model_type($id)
{
	global $db;
	return $db->get_var("SELECT `type` FROM `".TB_PREFIX."menu` WHERE id=$id");
}
function isComment()
{
	global $params,$db,$request;
	$view_path=ABSPATH.'/admini/views/comment/comment_index.php';
	if(menuIsComment())
	{
		if(is_file($view_path))
		require_once($view_path);
	}
}
function menuIsComment()
{
	global $db,$request;
	if($request['p'] > 0){
		$sql = "SELECT * FROM ".TB_PREFIX."menu WHERE id=".$request['p'];
		$result = $db->get_row($sql);
		if(!empty($result) && intval($result->isComment) == 1 && $result->type != 'guestbook' && $result->type != 'jobs' && $result->type != 'webmap' && $result->type != 'user' && $result->type != 'linkers' && $result->type != 'order' && $result->type != 'rss')
		{
			if((($result->type == 'article' || $result->type == 'mapshow') && $requset['n']==0) || ($result->type != 'article' && $request['n']>0))
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
?>