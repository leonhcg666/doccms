<?php
function_exists('date_default_timezone_set') && @date_default_timezone_set('Etc/GMT-'.TIMEZONENAME);
require_once(ABSPATH.'/inc/class.database.php');
require_once(ABSPATH.'/inc/function.php');

$_REQUEST = cleanArrayForMysql($_REQUEST);
$_GET     = cleanArrayForMysql($_GET);
$_POST    = cleanArrayForMysql($_POST);
$request  = $_REQUEST;
$menu_arr = [];
$go_404 = $tag['path.root'].'/404.html';
// $params = 
//写路由语句
$pfileName = isset($request['f'])?$request['f']:'';
if(!empty($pfileName) && $pfileName != 'search')
	$request['p'] = getIdByMenuName($pfileName);
elseif($pfileName == 'search')
	$request['m'] = 'search';
/*安全过滤*/
isnum($request['r'],$go_404);
isnum($request['p'],$go_404);
isnum($request['i'],$go_404);
if (isset($request['a']) && !englishOnly($request['a'])) {
	redirect($go_404);
}
/*安全过滤end*/
$params['id']		=	$request['p']		=$request['p'] ?? 0;
$params['cid']		=	$request['c']		=$request['c'] ?? 0;
$params['args']		=	$request['r']		=$request['r'] ?? 0;
$params['i']		=	$request['i']		=$request['i'] ?? 0;
						$request['comment']	=$request['comment'] ?? 0;
						$request['mdtp']	=$request['p'] ?? 0;
								
$menu_arr=get_model_type($params['id']);

$request['m']		=	!isset($request['m'])?'':$request['m'];
$params['model']	=	empty($request['m'])?$menu_arr['type']:$request['m'];
$request['a']		=	!isset($request['a'])?'':$request['a'];
$params['action']	=	empty($request['a'])?'index':$request['a'];
$params['related_common'] =	empty($menu_arr['related_common'])?$params['model']:$menu_arr['related_common'];

$request['a']=='phpinfo'?exit:'';
//引入程序主文件
$loadFile=array(
	0=>'/inc/common.php',
	1=>'/inc/class.pager.php',
	2=>'/content/common/common.php',
	3=>'/inc/class.seo.php',
	4=>'/config/doc-global.php',
	5=>'/content/index/__sys.php',
);
foreach($loadFile as $k=>$v){
	require_once(ABSPATH.$v);
}
unset($loadFile);

HTML_load();
//默认开启访问数量统计
sys_counts('all',true);

//权限判断
if($params['model']!='user' || $params['model']!='index')
{
	$model_arr=array( 'article' , 'guestbook' , 'jobs' , 'order' , 'webmap' , 'poll' ,  'mapshow');
	if(intval($_SESSION[TB_PREFIX.'user_roleId'])<intval($menu_arr['level'])&&($params['action']=='view' ||$params['action']=='download' || in_array($menu_arr['type'],$model_arr)))
	{
		redirect(sys_href(0,'user'));exit();
	}
}

//加载 模块主程序
$controller=ABSPATH.'/content/'.$params['model'].'/index.php';
if(is_file($controller))
{
	require_once($controller);	
	require_once(ABSPATH.'/content/comment/index.php');

	//执行 Action	
	empty($params['action'])?index():(function_exists($params['action'])?$params['action']():redirect($go_404));
}
else
{
	redirect($go_404);
}
//加载 模板风格文件
$part_path=ABSPATH.'/skins/'.STYLENAME.'/';
$part_common_path=ABSPATH.'/skins/'.STYLENAME.'/common/';
$loadSkinIndex=$part_path.'index.php';
$loadSkinCommon=$part_path.'common.php';
$loadSkinUserCommon=$part_common_path.'common_user.php';
$loadSkinSearchCommon=$part_common_path.'common_search.php';
$loadSkinOtherCommon=$part_common_path.$params['related_common'];

switch ($params['related_common'])
{
	case 'index':
		if(is_file($loadSkinIndex))$include=$loadSkinIndex;
		break;
	case 'user':
		if(is_file($loadSkinUserCommon))
			$include=$loadSkinUserCommon;
		else
			$include=$loadSkinCommon;
		break;
	case 'search':
		if(is_file($loadSkinSearchCommon))
			$include=$loadSkinSearchCommon;
		else
			$include=$loadSkinCommon;
		break;
		
	default:
		if(is_file($loadSkinOtherCommon)) 
			$include=$loadSkinOtherCommon;
		elseif(is_file($loadSkinCommon))
			$include=$loadSkinCommon;
		else
			exit ('<span style="color:RED"><strong>pager error!</strong></span>');
		break;	
}
if(!is_file($include))exit('尚未选择模板');
PAGE_load($include);
unset($request);
unset($params);
unset($tag);
unset($path);
unset($data);