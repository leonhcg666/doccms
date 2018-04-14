<form name="form1" method="post" enctype="multipart/form-data" action="?p=<?php echo $request['p']; ?>&a=create&group_id=<?php echo $request['group_id']; ?>">
 <table width="100%" border="0" cellpadding="2" cellspacing="1" class="admintb">
  <tr class="adtbtitle">
    <td><h3>版面内容</h3><a href="javascript:history.back(1)" class="creatbt">返回</a> </td>
    <td width="72"><div align="right">
      <input name="submit" type="submit" value=" 保存 "  class="savebt"/>
    </div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">
	  <table width="96%" border="0" align="center" cellpadding="0" cellspacing="4">
        <tr>
          <td width="57">标题</td><td>
            <input type="text" class="txt" name="title" id="title" style="width:300px"> 出现顺序 <input type="text" name="ordering" value="0" class="txt" id="ordering" style="width:50px"></td>
        </tr>
		    <tr>
          <td width="57">图片地址</td>
          <td>
          <input name="picpath" class="txt" type="text" id="picpath" style="width:60%">
  			  <input disabled name="uploadfile" type="file" style="display: none;width:60%">
  			 <input type="button" name="bt2" value="本地上传" class="bluebutton" onClick="picpath.disabled=true;uploadfile.disabled=false;uploadfile.style.display='';picpath.style.display='none';this.style.display='none'">
          </td>
        </tr>
        <tr>
          <td width="57">PDF地址</td>
          <td>
          <input name="pdfpath" class="txt" type="text" id="pdfpath" style="width:60%">
          <input disabled name="pdfupfile" type="file" style="display: none;width:60%">
         <input type="button" name="bt2" value="本地上传" class="bluebutton" onClick="pdfpath.disabled=true;pdfupfile.disabled=false;pdfupfile.style.display='';pdfpath.style.display='none';this.style.display='none'">
          </td>
        </tr>
      <tr>
          <td width="57">图片注释</td>
          <td>
		  <p>
            <textarea name="description" rows="3" class="txt" id="summary" style="width:96%"></textarea><br />
			[如果您的图片上已经有了注释,这里也可以不填写][PDF格式要求:rar|zip|ppt|pptx|xls|xlsx|mpg|mpeg|avi|rm|rmvb|wmv|wav|wma|pdf]
          </p>
          </td>
        </tr>
      </table>	
	  </td>
  </tr>
</table>
</form>