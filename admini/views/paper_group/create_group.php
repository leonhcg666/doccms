<script language="javascript" type="text/javascript" src="../inc/js/date/WdatePicker.js"></script>
<form name="form1" method="post" action="?p=<?php echo $request['p'] ?>&a=create_group" enctype="multipart/form-data">
  <table width="100%" border="0" cellpadding="2" cellspacing="1" class="admintb">
    <tr class="adtbtitle">
      <td width="892"><h3>添加期刊</h3><a href="javascript:history.back(1)" class="creatbt">返回</a></td>
      <td width="72"><div align="right">
          <input name="submit" type="submit" value=" 保存 " class="savebt" />
        </div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#FFFFFF"><div class="focusmain"> 
        <div class="focus">
            <img src="views/paper_group/detail.jpg" thumb="" alt="焦点图模块演示图片之三" text="图片3更详细的描述文字" />
            <div class="clear"></div>
          </div>
          <div class="set">
            <p class="style">
              期刊名称：
              <input id="title" name="title"  value="" />
              发刊时间：
              <input name="pubTime" class="txt" id="dtTime" value="<?php echo date("Y-m-d H:i:s");?>" style="font-size:9pt;width:152px; border:#6CF 2px solid;" onClick="WdatePicker()" />
            </p>
            <div class="base" id="base">
              <p id="p-adTrigger">期刊出版局：
              <input id="title" name="puby"  value="雅安职业技术学院" />
              </p>
              <p id="p-adTrigger">刊物类型:
              <input id="title" name="type"  value="" placeholder="半月刊"/>
              </p>
              <p id="p-adTrigger">刊物顺序:
                <input id="title" name="ordering"  value="0" placeholder="0"/>
              </p>
              <div class="clear"></div>
              <p id="p-width">宽度<input id="width" disabled="disabled" value="<?php echo paperPicWidth;?>" />(px) </p>
              <p id="p-height">高度<input id="height" disabled="disabled" value="<?php echo paperPicHight;?>" />(px) </p>
            </div>
            <div class="clear"></div>
            <span class="tip"> 提示：发刊时间应填本次出版时间;刊物类型：月刊、周刊等;上传后的宽高在站点设置里定义。<br />
            </span> </div>
        </div></td>
    </tr>
  </table>
    <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#C5EAF5">
    <tr>
      <td width="892"><a href="javascript:showHide('field_pane_on_3')"><img src="images/expand.gif" border="0"> 添加封面图</a> | <a href="javascript:history.back(1)">返回</a></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="4">
          <tr>
            <td width="861"><div id="field_pane_on_3" style="display: none; padding:0; margin:0;"> 上传封面图：
                <input name="originalPic" class="txt" type="text"  style="width:50%">
                <input disabled name="uploadfile" type="file" style="display: none;width:50%">
                <input type="button" name="bt2" value="本地上传" class="bluebutton" onclick="originalPic.disabled=true;uploadfile.disabled=false;uploadfile.style.display='';originalPic.style.display='none';this.style.display='none'">
                <input name="submit" type="submit" value=" 保存并上传 " />
              </div></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
