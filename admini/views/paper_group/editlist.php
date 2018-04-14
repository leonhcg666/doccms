<?php $style = explode('@',$list_item->style)?>
 <form name="form1" method="post" action="?a=editlist&p=<?php echo $request['p'] ?>&n=<?php echo $request['n'] ?>">
  <table width="100%" border="0" cellpadding="2" cellspacing="1" class="admintb">
  <tr class="adtbtitle">
    <td width="892"><input type="hidden" value="<?php echo $request['pid'] ?>" name="pid"><input type="hidden" value="<?php echo $request['group_id'] ?>" name="gid"><a href="javascript:history.back(1)" class="creatbt">返回</a></td>
    <td width="91"><div align="right">
        <input name="submit" type="submit" value=" 保存 " class="savebt" />
      </div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;<span style="color:#FF0000">温馨提示</span>：如要对该篇文章分页，请在您要分页地方加上  <span style="color:#0000FF">{#page#}</span> 即可&nbsp;]
      <style>
.tcolor{width:22px;height:20px;display:block; float:left; margin:0 10px;}
</style>
      <script>
          function checkcolor(i)
		  {
			  if(i=='b')
			  {
			 	 document.getElementById('titleColor').style.fontWeight='bold';
				 document.getElementById('sytle_font_b').value='bold';
			  }
			  else if(i=='i')
			  {
			 	 document.getElementById('titleColor').style.fontStyle='italic';
				 document.getElementById('sytle_font_i').value='italic';
			  }
			  else if(i=='clear')
			  {
			 	 document.getElementById('titleColor').style.fontWeight='normal';
			 	 document.getElementById('titleColor').style.color='#000';
				 document.getElementById('titleColor').style.fontStyle='normal';
				 document.getElementById('sytle_color').value='';
				 document.getElementById('sytle_font_b').value='';
				 document.getElementById('sytle_font_i').value='';
			  }
			  else
			  {
		   		  document.getElementById('titleColor').style.color='#'+i;
				  document.getElementById('sytle_color').value=i;
			  }
		  }
      </script>
      <input type="hidden" name="sytle_color" id="sytle_color" value="<?php echo $style[0]?>">
      <input type="hidden" name="sytle_font_b"  id="sytle_font_b"  value="<?php echo $style[1]?>">
      <input type="hidden" name="sytle_font_i"  id="sytle_font_i"  value="<?php echo $style[2]?>">
      <table width="96%" border="0" align="center" cellpadding="0" cellspacing="4">
        <tr>
          <td width="77"><span id="titleColor" style="font-size:16px;color:#<?php echo $style[0]?>;font-weight:<?php echo $style[1]?>;font-style:<?php echo $style[2]?>;  ">标题样式</span></td>
          <td width="841"><a href="javascript:;" onclick="checkcolor('EE1B2E');"><span class="tcolor" style="background:#EE1B2E;"></span></a> <a href="javascript:;" onclick="checkcolor('EE5023');"><span class="tcolor" style="background:#EE5023;"></span></a> <a href="javascript:;" onclick="checkcolor('996600');"><span class="tcolor" style="background:#996600;"></span></a> <a href="javascript:;" onclick="checkcolor('3C9D40');"><span class="tcolor" style="background:#3C9D40;"></span></a> <a href="javascript:;" onclick="checkcolor('2897C5');"><span class="tcolor" style="background:#2897C5;"></span></a> <a href="javascript:;" onclick="checkcolor('2B65B7');"><span class="tcolor" style="background:#2B65B7;"></span></a> <a href="javascript:;" onclick="checkcolor('8F2A90');"><span class="tcolor" style="background:#8F2A90;"></span></a> <a href="javascript:;" onclick="checkcolor('b');" title="粗体"><span id="check7" style="font-weight:800; font-size:16px;">B</span></a> <a href="javascript:;" onclick="checkcolor('i');" title="斜体"><span id="check7" style="font-weight:800; font-size:16px;">I</span></a> <a href="javascript:;" onclick="checkcolor('clear');"><span id="check7" style="font-weight:800; font-size:16px;">还原</span></a></td>
        </tr>
        <tr>
          <td width="77">页面标题</td>
          <td width="841"><input type="text" class="txt" name="title" id="title" style="width:96%" value="<?php echo $list_item->title ?>"></td>
        </tr>
        <tr>
          <td width="77">作者</td>
          <td width="90%"><input type="text" class="txt"  name="author" id="title" style="width:96%" value="<?php echo $list_item->author ?>"></td>
        </tr>
        <tr>
          <td width="77">来源名称</td>
          <td><input type="text" class="txt"  name="source" id="source" style="width:96%" value="<?php echo $list_item->source ?>"></td>
        </tr>
		<tr>
          <td width="77">来源链接</td>
          <td><input type="text" class="txt"  name="sourceUrl" id="sourceUrl" style="width:96%" value="<?php echo $list_item->sourceUrl ?>"></td>
        </tr>
        <tr>
          <td colspan="2"><a href="javascript:showHide('field_pane_on_2')"><img src="images/expand.gif" border="0"> 填写关键词&摘要 </a>
            <div id="field_pane_on_2" style="display: none; padding:0; margin:0;">
              <table width="100%" border="0" align="center" cellpadding="0">
                <tr>
                  <td> 页面关键词：</td>
                  <td width="90%"><textarea style='width:400px;' name='keywords' id='keywords' cols='90' rows='3'><?php echo $list_item->keywords ?></textarea></td>
                </tr>
                <tr>
                  <td> 页面摘要：</td>
                  <td><textarea style='width:400px;' name='description' id='description' cols='90' rows='3'><?php echo $list_item->description ?></textarea></td>
                </tr>
              </table>
          </div></td>
        </tr>
        <tr>
          <td colspan="2" valign="top"><?php echo ewebeditor(EDITORSTYLE,'content',$list_item->content); ?></td>
        </tr>
        <tr>
          <td width="57">点击次数</td>
          <td width="175"><input type="text" name="counts" class="txt" id="counts" value="<?php echo $list_item->counts ?>" style="width:80%">
            次</td>
        </tr>
        <tr>
          <td width="57">添加日期</td>
          <td width="200"><input type="text" name="dtTime" class="txt" id="dtTime" value="<?php echo date('Y-m-d H:i:s',strtotime($list_item->dtTime)) ?>" style="font-size:9pt;width:152px; border:#6CF 2px solid;" onClick="WdatePicker()"></td>
        </tr>
        <tr>
          <td colspan="2"><img src="./images/light.gif" alt="内容优化小建议" border="0" /> 内容优化小建议：段落小标题请用h2,h3标签。文章主题关键词请使用strong,em标签加强语气！</td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
