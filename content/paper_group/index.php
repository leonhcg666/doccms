<?php
function index()
{
	global $db;
	global $params;
	global $tag;	// 标签数组

	$sql="SELECT * FROM `".TB_PREFIX."paper_group` WHERE channelId=".$params['id']."";//获取栏目下的所有封面
	$sb = new sqlbuilder('mdt',$sql,'ordering ASC,id DESC',$db,listCount,true,URLREWRITE?'/':'./');
	if(!empty($sb->results))
	{
		foreach($sb->results as $k =>$v)
	    {
	    	if(!empty($v['originalPic']))
	    	{
		    	$sb->results[$k]['originalPic'] = ispic($v['originalPic']);
				$sb->results[$k]['indexPic']	= ispic($v['indexPic']);
	    	}
			if(!empty($v['style']))
			{
				$style = explode('@',$v['style']);
				$sb->results[$k]['style'] ='style="color:#'.$style[0].';font-weight:'.$style[1].';font-style:'.$style[2].'"';
			}
	    }
		$tag['data.results']=$sb->results;
		if($sb->totalPageNo()>1) 
		{
			$tag['pager.cn']=$sb->get_pager_show();
			$tag['pager.en']=$sb->get_en_pager_show();
		}
	}
	$sb=null;
}
function getcontent($p,$r,$page,$data){
   if($data->hassplitpages==1){
   	   if($page==0)$page=1;
	   $article=explode('{#page#}',$data->content);
	   $pagenum=count($article);
	   if($pagenum<$page){
	   	 $result['navbar']='';
         $result['content']='超出分页范围,非法请求！';
	   }else{
	       $result['content']=$article[$page-1];
	       $result['navbar']=pages_nav($pagenum,$p,$r,$page);	//分页导航
	   }
   }else{
        $result['navbar']='';
        $result['content']=$data->content;
   }
    return $result;
} 
function paper()
{
	global $db;
	global $params;
	global $tag;	// 标签数组
	$sqlindex="SELECT * FROM `".TB_PREFIX."paper_group` WHERE id=".$params['args']."";//获取栏目下的所有封面
	//$paperindex = $db->get_row($sqlindex);
	$sql="SELECT * FROM `".TB_PREFIX."paper` WHERE group_id=".$params['args']."";//获取栏目下的所有封面
	$sb = new sqlbuilder('mdt',$sql,'ordering ASC,id DESC',$db,listCount,true,URLREWRITE?'/':'./');
	if(!empty($sb->results))
	{
		//$pid=$_GET['pid']?intval($_GET['pid']):"1";
		foreach($sb->results as $k =>$v)
	    {
	    	// $sb->results[$v['id']] = $sb->results[$k];
	    	// unset($sb->results[$k]);
	    	$sql2="SELECT * FROM `".TB_PREFIX."paperlist` WHERE paperID=".$v['id']."";
	    	$sb2 = new sqlbuilder('mdt',$sql2,'ordering ASC,id DESC',$db,listCount,true,URLREWRITE?'/':'./');
			$sb->results[$k]['list'] = $sb2->results;

	    }
		$tag['data.results']=$sb->results;
		//$tag['paperindex']=object_array($paperindex);
		if($sb->totalPageNo()>1) 
		{
			$tag['pager.cn']=$sb->get_pager_show();
			$tag['pager.en']=$sb->get_en_pager_show();
		}
	}
	$sb=null;

}
function view()
{
	global $db;
	global $params;
	global $tag;
	//print_r($params);
	$sql="UPDATE ".TB_PREFIX."paperlist SET counts=counts+1 WHERE id=".$params['args'];
	$db->query($sql);
	$sqlindex="SELECT * FROM `".TB_PREFIX."paper` WHERE id=(SELECT paperID FROM `".TB_PREFIX."paperlist` WHERE id=".$params['args'].")";//获取栏目下的所有封面
	$paperindex = $db->get_row($sqlindex);
	if(!$paperindex)exit('错误的ID！');
	$sqlpaper="SELECT * FROM `".TB_PREFIX."paper` WHERE group_id=".$paperindex->group_id;//获取栏目下的所有封面
	$sb = new sqlbuilder('mdt',$sqlpaper,'ordering ASC,id DESC',$db,listCount,true,URLREWRITE?'/':'./');
	if(!empty($sb->results))
	{
		//$pid=$_GET['pid']?intval($_GET['pid']):"1";
		foreach($sb->results as $k =>$v)
	    {
	    	// $sb->results[$v['id']] = $sb->results[$k];
	    	// unset($sb->results[$k]);
	    	$sql2="SELECT * FROM `".TB_PREFIX."paperlist` WHERE paperID=".$v['id']."";
	    	//print_r($sql2);
	    	$sb2 = new sqlbuilder('mdt',$sql2,'ordering ASC,id DESC',$db,listCount,true,URLREWRITE?'/':'./');
			$sb->results[$k]['list'] = $sb2->results;
			if(!empty($sb2->results))
			{
				foreach ($sb2->results as $kk =>$dd) {
					if($dd['id']==$params['args'])
					{$tag['data.row']=$sb2->results[$kk];
					$tag['pid']=$k;
					}
				}
			}
	    }
		$tag['data.results']=$sb->results;
		$tag['paperindex']=(array)($paperindex);
		if($sb->totalPageNo()>1) 
		{
			$tag['pager.cn']=$sb->get_pager_show();
			$tag['pager.en']=$sb->get_en_pager_show();
		}
	}
	$sb=null;

	$is_up=$db->get_row('SELECT * FROM '.TB_PREFIX.'paperlist WHERE id<'.$params['args'].' ORDER BY id DESC LIMIT 0,1',ARRAY_A);
	$is_down=$db->get_row('SELECT * FROM '.TB_PREFIX.'paperlist WHERE id>'.$params['args'].' ORDER BY id ASC  LIMIT 0,1',ARRAY_A);
	$ups=is_array($is_up)?"<a href='/?p=".$params['id']."&a=view&r=".$is_up['id']."' class='list_title_fanye'>上一篇</a>":"<a class='list_title_fanye'>没有了</a>";
	$downs=is_array($is_down)?"<a href='/?p=".$params['id']."&a=view&r=".$is_down['id']."' class='list_title_fanye'>下一篇</a>":"<a class='list_title_fanye'>没有了</a>";
	$tag['updown']=$ups.$downs;
	unset($is_up);
	unset($is_down);
}
function pages_nav($pagenum,$p,$r,$cpage)
{
	global $tag;
	
	if($cpage==0)$cpage=1;
	
	if(URLREWRITE)
	{
		if($cpage==1)
		$navbar.='<span class="s1 s3">上一版</span>';
		else
		$navbar.='<a href="/'.$tag['channel.menuname'].'/n'.$r.'.html/'.(intval($cpage)-1).'" target="_self" class="s1">上一版</a>';
	}
	else
	{
		if($cpage==1)
		$navbar.='<span class="s1 s3">上一版</span>';
		else
		$navbar.='<a href="./?p='.$p.'&a=view&r='.$r.'&c='.(intval($cpage)-1).'" target="_self" class="s1">上一版</a>';
	}
	for($c=1;$c<=$pagenum;$c++)
	{
		if(URLREWRITE)
		{
			if($c == $cpage)
			$navbar.='<a href="/'.$tag['channel.menuname'].'/n'.$r.'.html/'.$c.'" target="_self" class="s2">'.$c.'</a>';
			else
			$navbar.='<a href="/'.$tag['channel.menuname'].'/n'.$r.'.html/'.$c.'">'.$c.'</a>';
		}
		 else
		{
			if($c == $cpage)
			$navbar.='<a href="./?p='.$p.'&a=view&r='.$r.'&c='.$c.'" target="_self" class="s2">'.$c.'</a>';
			else
			$navbar.='<a href="./?p='.$p.'&a=view&r='.$r.'&c='.$c.'">'.$c.'</a>';
		}
	}
	if(URLREWRITE)
	{
		if($cpage==$pagenum)
		$navbar.='<span class="s1 s3">下一版</span>';
		else
		$navbar.='<a href="/'.$tag['channel.menuname'].'/n'.$r.'.html/'.(intval($cpage)+1).'" target="_self" class="s1">下一版</a>';
	}
	else
	{
		if($cpage==$pagenum)
		$navbar.='<span class="s1 s3">下一版</span>';
		else
		$navbar.='<a href="./?p='.$p.'&a=view&r='.$r.'&c='.(intval($cpage)+1).'" target="_self" class="s1">下一版</a>';
	}
	return $navbar;
}
?>
