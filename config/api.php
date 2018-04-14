<?php
//filename: calengar.php
header("content-type:text/html;charset=utf-8");
// 设置字符集
?>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<style>
form{
    margin:0px;
    padding:0px;
}
td{
    text-align:center;
    width:80px;
}
</style>
<?php
if (!empty($_GET)) {
   $year = $_GET['year'];
   $month = $_GET['month'];
}
if (empty($year)) {
   $year = date('Y');
} 
if (empty($month)) {
   $month = date('m');
} 
$day = date('d');

$start_weekday = date('w',mktime(0,0,0,$month,1,$year));
$days = date('t',mktime(0,0,0,$month,1,$year));
//echo $year.'<br />';
//echo $month.'<br />';
//echo $day.'<br />';
//echo $days.'<br />';
//echo $start_weekday;

echo '<table border = "1">';
echo '<tr><td colspan=7 style="text-align:center">'.$year.'年'.$month.'月'.'</td></td>';
echo '<tr>';
$week = array('星期日','星期一','星期二','星期三','星期四','星期五','星期六');
$i = 0;  //打印出来周日到周一
for ($i=0;$i<7;$i++){
    echo '<td>'.$week[$i].'</td>';
}
echo '</tr>';
echo '<tr>';
$j = 0;
for ($j=0;$j<$start_weekday;$j++) {
    echo '<td style="color:#FFFFFF">'.$j.'</td>'; //打印空白，#FFFFFF为透明色，把前几天省去
}
$k = 1;
while ($k <= $days){ //打印日历
      if ($k == $day){
	 echo '<td style="color:red">'.$k.'</td>';
      } else {
	 echo '<td>'.$k.'</td>';
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

function lastyear($year,$month) {
  $year = $year-1;
  return "year=$year&month=$month";
}
function lastmonth($year,$month) {
  if ($month == 1) {
     $year = $year -1;
     $month = 12;
  } else {
     $month -= 1;
  }
  return "year=$year&month=$month";
}
function nextyear($year,$month){
  $year += 1;
  return "year=$year&month=$month";
}
function nextmonth($year,$month){
  if ($month == 12){
     $year += 1;
     $month = 1;
  }else{
     $month +=1;
  }
  return "year=$year&month=$month";
}

echo '<tr>';
echo '<td><a href=?'.lastyear($year,$month).' style=text-decoration:none>'."上一年".'</a></td>';
echo '<td><a href=?'.lastmonth($year,$month).' style=text-decoration:none>'."上一月".'</a></td>';
echo '<td colspan=3 style="text-align:center">';
echo '<form name="myform" method="GET">';
echo '<select name=year>';
for ($start_year=1970;$start_year<2049;$start_year++) {
    echo '<option value='.$start_year.'>'.$start_year.'</option>';
}
echo '</select>'.'年';
echo '<select name=month>';
for($start_month = 1;$start_month<=12;$start_month++){
 echo '<option value='.$start_month.'>'.$start_month.'</option>';
}
echo '</select>';
echo '月';
echo '<input type = "submit" name = "search" value = "查询">';
echo '</form>';
echo '</td>';
echo "<td><a href=?".nextyear($year,$month)." style=text-decoration:none>".'下一年'.'</a></td>';
echo "<td><a href=?".nextmonth($year,$month)." style=text-decoration:none>".'下一月'.'</a></td>';
echo '</tr>';
echo '</table>';
?>