<h2 class="title"><?php echo $pageInfo['submenuName'] ?></h2>
<form name="form1" enctype="multipart/form-data" method="post" action="?p=<?php echo $request['p'] ?>&a=edit&n=<?php echo $request['n'] ?>">
  <table width="100%" border="0" cellpadding="2" cellspacing="1" class="admintb">
    <tr class="adtbtitle">
      <td width="892"><h3>修改下载：</h3><a href="javascript:history.back(1)" class="creatbt">返回</a></td>
      <td width="72"><div align="right">
          <input name="submit" type="submit" value=" 保存 " class="savebt" />
        </div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#FFFFFF"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="4">
          <tr>
            <td width="57">软件名称</td>
            <td width="861"><input type="text" class="txt" value="<?php echo strFormat($download_item->title) ?>" name="title" id="title" style="width:96%"></td>
          </tr>
          <tr>
            <td width="57">软件 更新</td>
            <td><input name="filePath" id="filePath" type="text"  value="<?php echo strFormat($download_item->filePath) ?>" style="width:50%">
              <input name="uploadfile" id="uploadfile" type="file" size="50" maxlength= "50" style="display: none;">
              <input type="button" name="bt1" id="bt1" value="本地上传" class="bluebutton" onclick="document.getElementById('filePath').disabled=true;document.getElementById('uploadfile').disabled=false;document.getElementById('uploadfile').style.display='block';document.getElementById('filePath').style.display='none';document.getElementById('bt1').style.display='none';document.getElementById('picTips').style.display='none';">
              <span id="picTips">[可直接贴入在线链接，例：http://www.iwangle.me/wangle.rar]</span> <span class="picture">当您重新从本地上传软件时，原来的软件将被删除。</span></td>
          </tr>
          <tr>
            <td colspan="2"><a href="javascript:showHide('field_pane_on_2')"><img src="images/expand.gif" border="0"> 填写关键词&摘要 </a>
              <div id="field_pane_on_2" style="display: none; padding:0; margin:0;">
                <table width="100%" border="0" align="center" cellpadding="0">
                  <tr>
                    <td width="57"> 页面关键词：</td>
                    <td width="861"><textarea style='width:400px;' name='keywords' id='keywords' cols='90' rows='3'><?php echo strFormat($download_item->keywords) ?></textarea></td>
                  </tr>
                  <tr>
                    <td> 页面摘要：</td>
                    <td><textarea style='width:400px;' name='description' id='description' cols='90' rows='3'><?php echo strFormat($download_item->description) ?></textarea></td>
                  </tr>
                </table>
              </div></td>
          </tr>
          <tr>
            <td width="57">软件摘要</td>
            <td><?php echo ewebeditor(EDITORSTYLE,'content',$download_item->content); ?></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
