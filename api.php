<?php
//filename: api.php
header("content-type:text/html;charset=utf-8");
// 设置字符集
$dirName=dirname(__FILE__);
require_once($dirName.'/config/doc-config.php');
require_once(ABSPATH.'/inc/class.database.php');
$db=new DtDatabase();
$sql="SELECT * FROM ".TB_PREFIX."paper_group order by dtTime asc";
$results = $db->get_results($sql);
foreach ($results as $key => $value) {
  $time[$value->id]=date("Ynj",strtotime($value->dtTime));
  $p[$value->id]=$value->channelId;
}
?>
<?php
if (!empty($_GET)) {
   $year = $_GET['year'];
   $month = $_GET['month'];
}
if (empty($year)) {
   $year = date('Y');
} 
if (empty($month)) {
   $month = date('n');
} 
$day = date('d');

$start_weekday = date('w',mktime(0,0,0,$month,1,$year));
$days = date('t',mktime(0,0,0,$month,1,$year));

echo '<table border="0" width="320" height="205" align="center">';
echo '<tr height="24" colspan="7" style="font-size:12px" bgcolor="#FEE6CE">
      <td colspan="7" height="22" class="lan" style="color:#005AC1;font-weight:bold;">
        <span class="lan" style="FLOAT:left;PADDING-LEFT:5px;padding-top:3px"></span>
        <span style="FLOAT:left;color:#000000;margin-left:20px;">
          <a style="text-decoration:none; cursor:pointer;" onclick="postrili('.($year-1).','.$month.');">
            <img src="/skins/paper/style/images/zjt.gif"></a>
            &nbsp;&nbsp;
            <select name="nf" id="nf" onchange="nf(this.options[this.options.selectedIndex].value)">';
echo '<option value='.$year.' selected>'.$year.'</option>';
for ($start_year=substr(doccmsbirthday,0,4);$start_year<2049;$start_year++) {
echo '<option value='.$start_year.'>'.$start_year.'</option>';
}
echo  '</select>
            &nbsp;&nbsp;
          <a class="lan1" style="text-decoration:none;cursor:pointer;" onclick="postrili('.($year+1).','.$month.');">
            <img src="/skins/paper/style/images/yjt.gif"></a></span>
            <span style="FLOAT:right;margin-right:20px;">
          <a style="text-decoration:none; cursor:pointer;" onclick="postrili('.lastmonth($year,$month).');">
            <img src="/skins/paper/style/images/zjt.gif"></a>
            &nbsp;&nbsp;
            <select name="yf" id="yf" onchange="yf(this.options[this.options.selectedIndex].value)">';
echo '<option value='.$month.' selected>'.$month.'</option>';
for($start_month = 1;$start_month<=12;$start_month++){
 echo '<option value='.$start_month.'>'.$start_month.'</option>';
}
echo '</select>&nbsp;&nbsp;
    <a style="text-decoration:none;cursor:pointer;" onclick="postrili('.nextmonth($year,$month).');">
              <img src="/skins/paper/style/images/yjt.gif"></a></span>
    </td>
  </tr>';
echo '<tr bgcolor="#60ccf3" align="center" style="color:#ffffff">';
$week = array('日','一','二','三','四','五','六');
$i = 0;  //打印出来周日到周一
for ($i=0;$i<7;$i++){
    echo '<td height="20" style="line-height:20px;">'.$week[$i].'</td>';
}
echo '</tr>';
echo '<tr>';
$j = 0;
for ($j=0;$j<$start_weekday;$j++) {
    echo '<td style="color:#FFFFFF">'.$j.'</td>'; //打印空白，#FFFFFF为透明色，把前几天省去
}
$k = 1;
while ($k <= $days){ //打印日历
      if($id=array_search($year.$month.$k, $time)){
	 //echo '<td style="color:red">'.$k.'</td>'; //今天
   echo '<td width="24" height="21px" style="line-height:21px;" align="center" bgcolor="#FC6107">
      <a href="./?p='.$p[$id].'&a=paper&r='.$id.'" target="_blank" style="color: #fff; padding: 0; margin: 0;">
        <div style="cursor: hand; margin: 0; padding: 0px 0px;">'.$k.'</div></a></td>'; //今天
      } elseif($year.$month.$k == date('Y').date('m').$day){
    echo '<td width="24" height="21px" style="line-height:21px;color:#FF2A2A;" align="center" bgcolor="#EDEDED">'.$k.'</td>';//常规日子
      } else {
	 echo '<td width="24" height="21px" style="line-height:21px;" align="center" bgcolor="#EDEDED">'.$k.'</td>';//常规日子
      }
      if (($j+1)%7 == 0) {
	 echo '</tr><tr>';
      }
      $j++;
      $k++;
}
while ($j % 7 != 0) {
      echo '<td style="color:#FFFFFF">'.$j.'</td>';
      $j++;
}
echo '</tr>';
echo '</table>';

function lastmonth($year,$month) {
  if ($month == 1) {
     $year = $year -1;
     $month = 12;
  } else {
     $month -= 1;
  }
  return "$year,$month";
}
function nextmonth($year,$month){
  if ($month == 12){
     $year += 1;
     $month = 1;
  }else{
     $month +=1;
  }
  return "$year,$month";
}

?>
