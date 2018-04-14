<?php
class c_paperlist extends DtDatabase
{
	public $id;
	public $channelId;
	public $paperID;
	public $pwidth;
	public $pheight;
	public $ptop;
	public $pleft;
	public $title;
	public $style;
	public $keywords;
	public $description;
	public $author;
	public $source;
	public $counts;
	public $dtTime;
	public $editTime;
	public $recommend;
	public $content;
	public $sourceUrl;
	public $ordering;

	public $primary_key='id';

	protected $table_name;
	private $im_virgin=false;

	public function __construct()
	{
		$this->table_name = TB_PREFIX.'paperlist';
		parent::__construct();		
}
	public function get_request($request=array())
	{
		if(!empty($request)){
		if($request['id'])$this->id=$request['id'];
		if($request['channelId'])$this->channelId=$request['channelId'];
		if($request['paperID'])$this->paperID=$request['paperID'];
		if($request['pwidth'])$this->pwidth=$request['pwidth'];
		if($request['pheight'])$this->pheight=$request['pheight'];
		if($request['ptop'])$this->ptop=$request['ptop'];
		if($request['pleft'])$this->pleft=$request['pleft'];
		$this->title=$request['title'];
		if($request['style'])$this->style=$request['style'];
		if($request['keywords'])$this->keywords=$request['keywords'];
		$this->description=$request['description'];
		if($request['author'])$this->author=$request['author'];
		if($request['source'])$this->source=$request['source'];
		if($request['counts'])$this->counts=$request['counts'];
		if($request['dtTime'])$this->dtTime=$request['dtTime'];
		if($request['editTime'])$this->editTime=$request['editTime'];
		if($request['recommend'])$this->recommend=$request['recommend'];
		$this->content=$request['content'];
		if($request['sourceUrl'])$this->sourceUrl=$request['sourceUrl'];
		if($request['ordering'])$this->ordering=$request['ordering'];
		}
		}

	public function addnew($request=array())
	{
		$this->im_virgin =true;		if(!empty($request)){
		$this->get_request($request);
		}
		}

	public function save()
	{
		if($this->im_virgin){
		eval("\$this->$this->primary_key=NULL;");
		$sql="INSERT INTO `$this->table_name` (";
		$sql.=isset($this->channelId)?"channelId,":'';
		$sql.=isset($this->paperID)?"paperID,":'';
		$sql.=isset($this->pwidth)?"pwidth,":'';
		$sql.=isset($this->pheight)?"pheight,":'';
		$sql.=isset($this->ptop)?"ptop,":'';
		$sql.=isset($this->pleft)?"pleft,":'';
		$sql.=isset($this->title)?"title,":'';
		$sql.=isset($this->style)?"style,":'';
		$sql.=isset($this->keywords)?"keywords,":'';
		$sql.=isset($this->description)?"description,":'';
		$sql.=isset($this->author)?"author,":'';
		$sql.=isset($this->source)?"source,":'';
		$sql.=isset($this->counts)?"counts,":'';
		$sql.=isset($this->dtTime)?"dtTime,":'';
		$sql.=isset($this->editTime)?"editTime,":'';
		$sql.=isset($this->recommend)?"recommend,":'';
		$sql.=isset($this->content)?"content,":'';
		$sql.=isset($this->sourceUrl)?"sourceUrl,":'';
		$sql.=isset($this->ordering)?"ordering,":'';
if(substr($sql,strlen($str)-1,1)==',')$sql=substr($sql,0,strlen($str)-1);		$sql.=")VALUES (";
		$sql.=isset($this->channelId)?"'$this->channelId',":'';
		$sql.=isset($this->paperID)?"'$this->paperID',":'';
		$sql.=isset($this->pwidth)?"'$this->pwidth',":'';
		$sql.=isset($this->pheight)?"'$this->pheight',":'';
		$sql.=isset($this->ptop)?"'$this->ptop',":'';
		$sql.=isset($this->pleft)?"'$this->pleft',":'';
		$sql.=isset($this->title)?"'$this->title',":'';
		$sql.=isset($this->style)?"'$this->style',":'';
		$sql.=isset($this->keywords)?"'$this->keywords',":'';
		$sql.=isset($this->description)?"'$this->description',":'';
		$sql.=isset($this->author)?"'$this->author',":'';
		$sql.=isset($this->source)?"'$this->source',":'';
		$sql.=isset($this->counts)?"'$this->counts',":'';
		$sql.=isset($this->dtTime)?"'$this->dtTime',":'';
		$sql.=isset($this->editTime)?"'$this->editTime',":'';
		$sql.=isset($this->recommend)?"'$this->recommend',":'';
		$sql.=isset($this->content)?"'$this->content',":'';
		$sql.=isset($this->sourceUrl)?"'$this->sourceUrl',":'';
		$sql.=isset($this->ordering)?"'$this->ordering',":'';
if(substr($sql,strlen($str)-1,1)==',')$sql=substr($sql,0,strlen($str)-1);		$sql.=')';

		}
		else{

		eval('$pid=$this->'.$this->primary_key.';$this->'.$this->primary_key.'=NULL;');

		$sql.="UPDATE `$this->table_name` SET ";
		$sql.=isset($this->id)?"`id`='$this->id',":'';
		$sql.=isset($this->channelId)?"`channelId`='$this->channelId',":'';
		$sql.=isset($this->paperID)?"`paperID`='$this->paperID',":'';
		$sql.=isset($this->pwidth)?"`pwidth`='$this->pwidth',":'';
		$sql.=isset($this->pheight)?"`pheight`='$this->pheight',":'';
		$sql.=isset($this->ptop)?"`ptop`='$this->ptop',":'';
		$sql.=isset($this->pleft)?"`pleft`='$this->pleft',":'';
		$sql.=isset($this->title)?"`title`='$this->title',":'';
		$sql.=isset($this->style)?"`style`='$this->style',":'';
		$sql.=isset($this->keywords)?"`keywords`='$this->keywords',":'';
		$sql.=isset($this->description)?"`description`='$this->description',":'';
		$sql.=isset($this->author)?"`author`='$this->author',":'';
		$sql.=isset($this->source)?"`source`='$this->source',":'';
		$sql.=isset($this->counts)?"`counts`='$this->counts',":'';
		$sql.=isset($this->dtTime)?"`dtTime`='$this->dtTime',":'';
		$sql.=isset($this->editTime)?"`editTime`='$this->editTime',":'';
		$sql.=isset($this->recommend)?"`recommend`='$this->recommend',":'';
		$sql.=isset($this->content)?"`content`='$this->content',":'';
		$sql.=isset($this->sourceUrl)?"`sourceUrl`='$this->sourceUrl',":'';
		$sql.=isset($this->ordering)?"`ordering`='$this->ordering',":'';
if(substr($sql,strlen($str)-1,1)==',')$sql=substr($sql,0,strlen($str)-1);
		$sql.=" WHERE `$this->primary_key` ='$pid' LIMIT 1";
		}
		$this->query($sql);
		return mysqli_insert_id();
	}
}
?>