<?php
class c_paper_group extends DtDatabase
{
	public $id;
	public $channelId;
	public $title;
	public $summary;
	public $pdfpath;
	public $puby;
	public $type;
	public $picpath;
	public $ordering;
	public $txtHeight;
	public $pubTime;
	public $dtTime;

	public $primary_key='id';

	protected $table_name;
	private $im_virgin=false;

	public function __construct()
	{
		$this->table_name = TB_PREFIX.'paper_group';
		parent::__construct();		
}
	public function get_request($request=array())
	{
		if(!empty($request)){
		if($request['id'])$this->id=$request['id'];
		if($request['channelId'])$this->channelId=$request['channelId'];
		$this->title=$request['title'];
		$this->summary=$request['summary'];
		if($request['pdfpath'])$this->pdfpath=$request['pdfpath'];
		if($request['puby'])$this->puby=$request['puby'];
		if($request['type'])$this->type=$request['type'];
		if($request['picpath'])$this->picpath=$request['picpath'];
		if($request['ordering'])$this->ordering=$request['ordering'];
		$this->txtHeight=$request['txtHeight'];
		if($request['pubTime'])$this->pubTime=$request['pubTime'];
		if($request['dtTime'])$this->dtTime=$request['dtTime'];
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
		$sql.=isset($this->title)?"title,":'';
		$sql.=isset($this->summary)?"summary,":'';
		$sql.=isset($this->pdfpath)?"pdfpath,":'';
		$sql.=isset($this->puby)?"puby,":'';
		$sql.=isset($this->type)?"type,":'';
		$sql.=isset($this->picpath)?"picpath,":'';
		$sql.=isset($this->ordering)?"ordering,":'';
		$sql.=isset($this->txtHeight)?"txtHeight,":'';
		$sql.=isset($this->pubTime)?"pubTime,":'';
		$sql.=isset($this->dtTime)?"dtTime,":'';
if(substr($sql,strlen($str)-1,1)==',')$sql=substr($sql,0,strlen($str)-1);		$sql.=")VALUES (";
		$sql.=isset($this->channelId)?"'$this->channelId',":'';
		$sql.=isset($this->title)?"'$this->title',":'';
		$sql.=isset($this->summary)?"'$this->summary',":'';
		$sql.=isset($this->pdfpath)?"'$this->pdfpath',":'';
		$sql.=isset($this->puby)?"'$this->puby',":'';
		$sql.=isset($this->type)?"'$this->type',":'';
		$sql.=isset($this->picpath)?"'$this->picpath',":'';
		$sql.=isset($this->ordering)?"'$this->ordering',":'';
		$sql.=isset($this->txtHeight)?"'$this->txtHeight',":'';
		$sql.=isset($this->pubTime)?"'$this->pubTime',":'';
		$sql.=isset($this->dtTime)?"'$this->dtTime',":'';
if(substr($sql,strlen($str)-1,1)==',')$sql=substr($sql,0,strlen($str)-1);		$sql.=')';

		}
		else{

		eval('$pid=$this->'.$this->primary_key.';$this->'.$this->primary_key.'=NULL;');

		$sql.="UPDATE `$this->table_name` SET ";
		$sql.=isset($this->id)?"`id`='$this->id',":'';
		$sql.=isset($this->channelId)?"`channelId`='$this->channelId',":'';
		$sql.=isset($this->title)?"`title`='$this->title',":'';
		$sql.=isset($this->summary)?"`summary`='$this->summary',":'';
		$sql.=isset($this->pdfpath)?"`pdfpath`='$this->pdfpath',":'';
		$sql.=isset($this->puby)?"`puby`='$this->puby',":'';
		$sql.=isset($this->type)?"`type`='$this->type',":'';
		$sql.=isset($this->picpath)?"`picpath`='$this->picpath',":'';
		$sql.=isset($this->ordering)?"`ordering`='$this->ordering',":'';
		$sql.=isset($this->txtHeight)?"`txtHeight`='$this->txtHeight',":'';
		$sql.=isset($this->pubTime)?"`pubTime`='$this->pubTime',":'';
		$sql.=isset($this->dtTime)?"`dtTime`='$this->dtTime',":'';
if(substr($sql,strlen($str)-1,1)==',')$sql=substr($sql,0,strlen($str)-1);
		$sql.=" WHERE `$this->primary_key` ='$pid' LIMIT 1";
		}
		$this->query($sql);
		return mysqli_insert_id();
	}
}
?>