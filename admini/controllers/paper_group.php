<?php
require_once(ABSPATH.'/inc/class.paint.php');
require_once(ABSPATH.'/inc/class.upload.php');
require_once(ABSPATH.'/inc/models/paper_group.php');
function index()
{
	global $db,$paper_group,$request;
	$sql = 'SELECT * FROM `'.TB_PREFIX.'paper_group` WHERE channelId='.$request['p'];
	$sb = new sqlbuilder('mdt',$sql,'ordering asc,id DESC',$db,12);
	$paper_group = new DataTable($sb,'期刊列表');
	$paper_group->add_col('ID','id','db',0,'"$rs[id]"');
	$paper_group->add_col('期刊名称','title','db',0,'"<a href=\"./index.php?a=edit_group&p=$rs[channelId]&id=$rs[id]\">$rs[title]</a>"');
	$paper_group->add_col('期刊出版局','puby','db',0,'"$rs[puby]"');
	$paper_group->add_col('是否有PDF','pdfpath','db',100,'($rs["pdfpath"])?是:否');
	$paper_group->add_col('发布时间','pubTime','db',180,'"$rs[pubTime]"');
	$paper_group->add_col('添加时间','dtTime','db',180,'"$rs[dtTime]"');
	$paper_group->add_col('操作','edit','text',140,'"<a href=\"./index.php?a=destroy_group&p=$rs[channelId]&group_id=$rs[id]\" onclick=\"return confirm(\'您确认要删除?\');\">[删除]</a>|<a href=\"./index.php?a=edit_group&p=$rs[channelId]&id=$rs[id]\">[编辑]</a>"');
	$paper_group->add_col('排序[正序]','ordering','text',70,'"<input name=\"ordering[$rs[id]]\" onkeypress=\"return checkNumber(event)\" type=\"text\" value=\"$rs[ordering]\" class=\"txt\" size=\"2\" />"');
	if($_POST)
	{
		if(!empty($request['ordering']))
		{
			foreach($request['ordering'] as $id=>$o)
			{
				if(empty($o))$o=0;
				$sql ='UPDATE '.TB_PREFIX.'paper_group SET ordering='.$o.' WHERE id='.$id;
				$db->query($sql);
			}
		}
		redirect('?&p='.$request['p']);
	}

}

function create($request="",$group_id="")
{
	global $db,$request;
	if($_POST || $group_id>0 )
	{
		$paper = new paper();
		$paper->addnew($request);
		$paper->get_request($request);
		$paper->dtTime = date("Y-m-d H:i:s");
		if($group_id>0){
		$paper->group_id= $group_id;
		$paper->title   = $request["title"]."　第一版";
		}
		if(!empty($_FILES['uploadfile'])&&!$group_id)
		{
			if($_FILES['uploadfile']['size']>0 && $_FILES['uploadfile']['size']<5000000){//4.8MB
				$upload = new Upload();
				$fileName = $upload->SaveFile('uploadfile');
				$paint = new Paint(UPLOADPATH.$fileName);
				$paper->picpath = $paint->Resize(paperPicWidth,paperPicHight,'');
			}else{
				$paper->picpath ='';
			}
		}
		if(!empty($_FILES['pdfupfile'])&&empty($request['pdfpath']))
		{
		$paper->pdfpath = empty($request['pdfpath'])?upload_pdfile('pdfupfile'):$request['pdfpath'];
		//$paper->pdfpath = empty($request['pdfpath'])?upload_pdfile('pdfupfile',$paper->pdfpath):$request['pdfpath'];
		}
		$paper->save();
		if(!$group_id){
			redirect('?p='.$request['p'].'&a=edit_group&id='.$request['group_id']);
		}
	}
}
function lists()
	{
		global $db,$request,$pageInfo;
		$pageInfo['display']=false;
		$p=$request['p'];
		$id=$request['id'];
		$gid=$request['group_id'];
		switch($_REQUEST['action']){
			case 'list':
				$tags = array();
				$sql='SELECT id,title,pwidth,pheight,ptop,pleft FROM `'.TB_PREFIX.'paperlist` WHERE channelId='.intval($p).' and paperID='.intval($id).' order by ordering asc,id DESC';
				$tags=$db->get_results($sql,ARRAY_A);	
				echo json_encode($tags);
			break;
		
			case 'delete':
				$sql='delete FROM `'.TB_PREFIX.'paperlist` WHERE id= '.$id;
				$db->query($sql);	
				redirect('?p='.$p.'&a=edit&group_id='.$gid.'&id='.$request['pid']);
			break;
			
			case 'save':
			$paperlist = new paperlist();
			$paperlist->addnew();
			$paperlist->get_request($request);
			$paperlist->style = $request['sytle_color'].'@'.$request['sytle_font_b'].'@'.$request['sytle_font_i'].'@';
			if(!empty($request['dtTime']))
				$paperlist->dtTime = date("Y-m-d H:i:s",strtotime($request['dtTime']));
			else
				$paperlist->dtTime = date("Y-m-d H:i:s");
			$paperlist->channelId=intval($p);
			$paperlist->content	= $request['content'];
			echo $paperlist->save();			
			break;
		
		}
	}
function editlist()
{
	global $list_item,$db,$request;
	if(empty($request['title']))
	{
		$sql='SELECT * FROM '.TB_PREFIX.'paperlist WHERE id='.$request['n'];
		$list_item = $db->get_row($sql);
	}
	else
	{
		$list = new paperlist();
		$list->get_request($request);
		$list->style = $request['sytle_color'].'@'.$request['sytle_font_b'].'@'.$request['sytle_font_i'].'@';
		if(!empty($request['dtTime']))
			$list->dtTime = date("Y-m-d H:i:s",strtotime($request['dtTime']));
		else
			$list->dtTime = date("Y-m-d H:i:s");
		$list->id=$request['n'];
		$list->channelId=$request['p'];
		$list->content	= $request['content'];	
		$list->save();
		redirect('?p='.$request['p'].'&a=edit&group_id='.$request['pid'].'&id='.$request['gid']);
	}
}
function edit()
{
	global $db,$request,$papers;
	if(!$_POST)
	{
		$p=$request['p'];
		$gid=$request['id'];
		$pid=$request['group_id'];
		$sb = new sqlbuilder('mdt','SELECT * FROM `'.TB_PREFIX.'paperlist` WHERE channelId='.intval($p).' and paperId='.intval($gid),'ordering asc,id DESC',$db,12);
		$papers = new DataTable($sb,'版面内容 | <a class="deleteall" >点击图片设置内容</a>');
		$papers->add_col('序号','id','db',40,'"$rs[id]"');
		$papers->add_col('标题','title','db',0,'"$rs[title]"');
		$papers->add_col('预览','','',40,'"<a target=\"_blank\" href=\"/?p='.$p.'&a=view&r=$rs[id]\">预览</a>"');
		$papers->add_col('添加时间','dtTime','db',180,'"$rs[dtTime]"');
		$papers->add_col('操作','edit','text',140,'"<a href=\"?p='.$p.'&a=lists&id=$rs[id]&action=delete&pid='.$gid.'&group_id='.$pid.'\" onclick=\"return confirm(\'您确认要删除?\');\">[删除]</a>|<a href=\"./index.php?p='.$p.'&a=editlist&group_id=$rs[paperID]&n=$rs[id]&pid='.$pid.'\">[编辑]</a>"');
		$papers->add_col('排序[正序]','ordering','text',70,'"<input name=\"orderings[$rs[id]]\" onkeypress=\"return checkNumber(event)\" type=\"text\" value=\"$rs[ordering]\" class=\"txt\" size=\"2\" />"');
	}
	if(empty($request['title']))
	{
		global $edit_item;
		$sql='SELECT * FROM `'.TB_PREFIX.'paper` WHERE id='.intval($request['id']);
		$edit_item = $db->get_row($sql);
	}
	else
	{
		$id=intval($request['id']);
		$paper = new paper();
		$paper->id=$id;
		$paper->get_request($request);
		$paper->dtTime=date("Y-m-d H:i:s");
		// print_r($request);
		// exit;
		if(!empty($_FILES['uploadfile']))
		{
			//删除遗留图片
			$sql = 'SELECT picpath FROM `'.TB_PREFIX.'paper` WHERE id='.$id;
			$picpath = $db->get_var($sql);
			if(!empty($picpath)){
				if(is_file(ABSPATH.$picpath))@unlink(ABSPATH.$picpath);
			}
			// print_r($_FILES['uploadfile']);
			// exit;
			if($_FILES['uploadfile']['size']>0 && $_FILES['uploadfile']['size']<5000000){//4.8MB
				$upload = new Upload();
				$fileName = $upload->SaveFile('uploadfile');
				$paint = new Paint(UPLOADPATH.$fileName);
				$paper->picpath = $paint->Resize(paperPicWidth,paperPicHight,'');
			}else{
				$paper->picpath ='';
			}
		}

		if(!empty($_FILES['pdfupfile'])&&empty($request['pdfpath']))
		{
			//删除遗留文件
			$sql = 'SELECT pdfpath FROM `'.TB_PREFIX.'paper` WHERE id='.$id;
			$paper_item = $db->get_var($sql);
			$paper->pdfpath = empty($request['pdfpath'])?upload_pdfile('pdfupfile',$paper_item):$request['pdfpath'];
		}

		$paper->save();
		if(!empty($request['orderings']))
		{
			foreach($request['orderings'] as $ids=>$o)
			{
				if(empty($o))$o=0;
				$sql ='UPDATE '.TB_PREFIX.'paperlist SET ordering='.$o.' WHERE id='.$ids;
				$db->query($sql);
			}
		}
		redirect('?p='.$request['p'].'&a=edit&group_id='.$request['group_id'].'&id='.$id);

	}	
}
function create_group()
{
	global $db,$request;
	if($_POST)
	{
		$request['title'] = trim($request['title']);
		if(empty($request['title']))
		{
			echo "<script language='javascript'>window.alert('报刊名称不能为空!');window.history.go(-1);</script>";
			exit;
		}
		$paper_group = new paper_group();
		$paper_group->addnew($request);
		//$paper_group->dtTime = date("Y-m-d H:i:s");
		if(!empty($_FILES['uploadfile']))
		{
			$upload = new Upload();
			$fileName = $upload->SaveFile('uploadfile');
			if(empty($fileName))echo $upload->showError();
			$paint = new Paint(UPLOADPATH.$fileName);
			$paper_group->picpath = $request['picpath'] = $paint->Resize(paperPicWidth,paperPicHight,'');
		}
		$paper_group->channelId = $request['p'];
		if($gid=$paper_group->save()){
			create($request,$gid);
			redirect("?p=".$request['p']);
		}else{
			echo '创建失败';
		}
	}
	
}
function edit_group()
{
	global $db,$request,$edit_group_item,$paper_group;
	$sql = "SELECT * FROM ".TB_PREFIX."paper_group WHERE id=".intval($request['id']);
	$edit_group_item = $db->get_row($sql);

	if(!$_POST)
	{
		$p=$request['p'];
		$gid=$request['id'];
		$sb = new sqlbuilder('mdt','SELECT * FROM `'.TB_PREFIX.'paper` WHERE group_id='.intval($gid),'ordering asc,id DESC',$db,12);
		$paper_group = new DataTable($sb,'版面列表 | <a class="deleteall" href="?p='.$p.'&a=create&group_id='.$gid.'">添加一个版面</a>');
		$paper_group->add_col('序号','id','db',40,'"$rs[id]"');
		$paper_group->add_col('标题','title','db',0,'"$rs[title]"');
		$paper_group->add_col('是否有PDF','pdfpath','db',0,'($rs["pdfpath"])?是:否');
		$paper_group->add_col('添加时间','dtTime','db',180,'"$rs[dtTime]"');
		$paper_group->add_col('操作','edit','text',140,'"<a href=\"./index.php?p='.$p.'&a=destroy&group_id='.$gid.'&id=$rs[id]\" onclick=\"return confirm(\'您确认要删除?\');\">[删除]</a>|<a href=\"./index.php?p='.$p.'&a=edit&group_id='.$gid.'&id=$rs[id]\">[编辑]</a>"');
		$paper_group->add_col('排序[正序]','ordering','text',70,'"<input name=\"orderings[$rs[id]]\" onkeypress=\"return checkNumber(event)\" type=\"text\" value=\"$rs[ordering]\" class=\"txt\" size=\"2\" />"');
	}
	else
	{	
		$request['title'] = trim($request['title']);
		if(empty($request['title']))
		{
			echo "<script language='javascript'>window.alert('报刊名称不能为空!');window.history.go(-1);</script>";
			exit;
		}
		$pic=$request['yesup'];
		$paper_group = new paper_group();
		$paper_group->id=$request['group_id'];
		$paper_group->get_request($request);
		$paper_group->dtTime = date("Y-m-d H:i:s");
		if($pic>0)
		{
			//删除遗留图片 不删除 因为默认的第一版采用同一封面 由子页面发起删除
			$sql = 'SELECT picpath FROM `'.TB_PREFIX.'paper_group` WHERE id='.$paper_group->id;
			$picpath = $db->get_var($sql);
			if(!empty($picpath)){
				if(is_file(ABSPATH.$picpath))@unlink(ABSPATH.$picpath);
			}
			if($_FILES['uploadfile']['size']>0 && $_FILES['uploadfile']['size']<5000000){
				$upload = new Upload();
				$fileName = $upload->SaveFile('uploadfile');
				$paint = new Paint(UPLOADPATH.$fileName);
				$paper_group->picpath = $paint->Resize(paperPicWidth,paperPicHight,'');
			}else{
				$paper_group->picpath ='';
			}
		}
		if(!empty($_FILES['pdfupfile'])&&empty($request['pdfpath']))
		{
			//删除遗留文件
			$sql = 'SELECT pdfpath FROM `'.TB_PREFIX.'paper_group` WHERE id='.$paper_group->id;
			$paper_item = $db->get_var($sql);
			$paper_group->pdfpath = empty($request['pdfpath'])?upload_pdfile('pdfupfile',$paper_item):$request['pdfpath'];
		}
		$paper_group->save();
		if(!empty($request['orderings']))
		{
			foreach($request['orderings'] as $ids=>$o)
			{
				if(empty($o))$o=0;
				$sql ='UPDATE '.TB_PREFIX.'paper SET ordering='.$o.' WHERE id='.$ids;
				$db->query($sql);
			}
		}
		redirect('?a=edit_group&p='.$request['p'].'&id='.$request['group_id']);
	}
}
function destroy_group()
{
	global $db,$request;
	$sql = 'SELECT count(*) FROM `'.TB_PREFIX.'paper` WHERE group_id='.intval($request['group_id']);
	$count = $db->get_var($sql);
	if($count>0){
		exit('请先删除此版面 下的数据');
	}
	
	$sql = 'DELETE FROM `'.TB_PREFIX.'paper_group` WHERE id='.intval($request['group_id']);
	if($db->query($sql))
	redirect('?p='.intval($request['p']));
	else
	{
		echo '删除失败！';
	}
}
function destroy()
{
	global $db,$request;
	$sql='DELETE FROM `'.TB_PREFIX.'paperlist` WHERE paperID= '.intval($request['id']);
	$db->query($sql);
	$sql = 'DELETE FROM `'.TB_PREFIX.'paper` WHERE id='.intval($request['id']);
	if($db->query($sql))
	redirect('?p='.intval($request['p']).'&a=edit_group&id='.intval($request['group_id']));
	else
	{
		echo '删除失败！';
	}
}
function user_flash()
{
	global $db,$request;	
	$group_id=intval($request['group_id']);
	
	$sql ='UPDATE '.TB_PREFIX.'flash_group SET sign=1 WHERE id='.$group_id;
	$db->query($sql);
	$sql ='UPDATE '.TB_PREFIX.'flash_group SET sign=0 WHERE id not in('.$group_id.')';
	$db->query($sql);
	redirect('?m=system&s=flashoptions');
}
function upload_pdfile($fileName,$oldFile='')
{
	$upload = new Upload();
	$upload->Upload('50000000','/upload/File/');
	del_old_file($oldFile);
	if(!empty($_FILES[$fileName]))
	{
		$upload->AllowExt='rar|zip|ppt|pptx|xls|xlsx|mpg|mpeg|avi|rm|rmvb|wmv|wav|wma|pdf';
		$fileName = $upload->SaveFile($fileName);
		if(empty($fileName))echo $upload->showError();
		return UPLOADPATH.'File/'.$fileName;
	}
}
function del_old_file($oldFile)
{
	if(!empty($oldFile))
	{
		if(is_file(ABSPATH.$oldFile))
		{
			@unlink(ABSPATH.$oldFile);
		}
	}
}
?>