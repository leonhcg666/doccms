<?php

checkme(10);
require(ABSPATH.'/inc/QueryList.class.php');
function index(){
	
}

function curl(){

	require_once(ABSPATH.'/admini/models/dt_list.php');

	global $weburl,$db,$request;

	$weburl=TrimArray($request['urlweb']);

	$cid = explode("=>",$request['select']);

	$channelId = $cid[1];

	/*閲囬泦閾炬帴澶勭悊*/

	$url = array();

	$url = explode(";",$request['listurl']);

	$url = array_unique($url);

	$url = TrimArray($url);//鍘婚櫎缃戝潃鐨勭┖鏍硷紝濡備笉鍘婚櫎鏈夌┖鏍肩殑缃戝潃浼氶噰闆嗕笉鍒版暟鎹�
	//杩囨护鍥犱负鏈�悗涓�釜;鍙峰紩璧风殑绌哄�

	foreach( $url as $k=>$v) {

    if(empty($v)) unset($url[$k]);

	}

	/*寮�閲囬泦鏁版嵁*/

	$cj=array();

	foreach ($url as $key ) { 
		
		$reg = array(
		    
		    'title'=>array('.category h1','text',''),    
		    
		    //'summary'=>array('.summary','text','-input strong'), 
		    
		    'content'=>array('#detailed','html','a -.share'),   
		   //'callback'=>array('HJ','callfun2')     
		    
		    );
		$rang = '#content';

		$hj = QueryList::Query($key,$reg,$rang,'curl');

		$hj->jsonArr[0]['url'] = $key;

		if(empty($hj->jsonArr[0]['content'])){


		} 

		else{

		$cj[]= $hj->jsonArr;


		}

	}

	foreach ($cj as $k ) {

		foreach ($k as $v) 
		{	
			preg_match_all ('|src="(.*)"|isU', c_img($v['content']), $img1);
			$list = new c_list();
			$list->addnew();
			$list->indexPic= $img1[1][0];
			$list->style = $request['sytle_color'].'@'.$request['sytle_font_b'].'@'.$request['sytle_font_i'].'@';
			$list->dtTime = date("Y-m-d H:i:s");
			$list->channelId=$channelId;
			$list->title=$v['title'];
			$list->content	=c_img($v['content']);
			$list->hassplitpages=(strpos($request['content'],'{#page#}')!==false)?'1':'0';				
			if($list->save()){
				save(ture,$k);
				//echo $v['url'].'閲囬泦鎴愬姛锛�;
			}

		}
	}

}

function save($type,$k){

	if ($type) {

		echo '{"flag":"0","url":"'.$k[0]['url'].'"}';

		exit();
	}

}

function c_img($content)
{
	global $weburl;

		preg_match_all ('|src="(.*)"|isU', $content, $img1);
		for ($i=0; $i < count($img1[1]); $i++) 
		{ 
			if(!empty($img1[1][$i])){
				if(!chstr($img1[1][$i],'http://')){
					$img1[1][$i] = $weburl.$img1[1][$i];
				}
				$data = file_get_contents($img1[1][$i]); // 璇绘枃浠跺唴瀹�
				$filetime = time(); //寰楀埌鏃堕棿鎴�				
				$filepath =ABSPATH."public/".date("Ym",$filetime)."/";//鍥剧墖淇濆瓨鐨勮矾寰勭洰褰�
				if(!is_dir($filepath)){
				    mkdir($filepath,0777, true);
				}
				$filename = date("YmdHis",$filetime).rand(100,999).'.'.substr($img1[1][$i],-3,3); //鐢熸垚鏂囦欢鍚嶏紝
				$img1[1][$i] = "/public/".date("Ym",$filetime)."/".$filename;
				$fp = @fopen($filepath.$filename,"w"); //浠ュ啓鏂瑰紡鎵撳紑鏂囦欢
				@fwrite($fp,$data); 
				fclose($fp);
				}
				//$images[]=$img1[1][$i];
				$content=str_replace($img1[0][$i],"src=".$img1[1][$i]."",$content);

		}
		return $content;

}




function type()
{
	global $db;
	$list=$db->get_results("SELECT id,title,type FROM ".TB_PREFIX."menu WHERE type='list' AND deep!='0' ORDER BY id ASC",ARRAY_A);

	//杈撳嚭鍒楄〃瀛愮被
	foreach ($list as $key => $value) {
		$tps.= ',"'.$value['title'].'=>'.$value['id'].'"';
	}

	$type='subcat[0] = new Array("list"'.$tps.');';


	return $type;
	 
}

function chstr($str,$in){

    $tmparr = explode($in,$str);

    if(count($tmparr)>1){

        return true;

    }else{

        return false;

    }

}

function TrimArray($Input){
    if (!is_array($Input))
        return trim($Input);
    return array_map('TrimArray', $Input);
}


?>