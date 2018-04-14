<form name="form1" method="post" action="?&a=edit_group&p=<?php echo $request['p'] ?>&group_id=<?php echo $request['id'] ?>" enctype="multipart/form-data">
  <table width="100%" border="1" cellpadding="0" cellspacing="0" style="border-color:#F9F9F9">
    <tr class="adtbtitle" style="height:5em;">
      <td><h3>修改报刊</h3><a href="./index.php?p=<?php echo $request['p'] ?>" class="creatbt">返回</a></td>
      <td align="right"><span id="msg" style="color:#FF0000"></span><input name="submit" type="submit" class="button" style="height:auto" value="应 用"></td>
    </tr>
    <tr>
      <td width="30%">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
              <td colspan="2" bgcolor="#FFFFFF">
                  <div class="focus">
                   <img src="<?php echo $edit_group_item->picpath ?>" width="<?php echo paperPicWidth ?>" height="<?php echo paperPicHight ?>" thumb="" alt="<?php echo $edit_group_item->title ?>" text="<?php echo $edit_group_item->title ?>" />
                   <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
                  <div class="set">
              更新封面：
              <input name="uploadfile" type="file" style="width:50%">是：<input type="radio" value="1" name="yesup"> 否：<input type="radio" value="0" name="yesup">
              <p class="style">
                期刊名称：
                <input id="title" name="title"  value="<?php echo $edit_group_item->title ?>" />
                发刊时间：
                <input name="pubTime" class="txt" id="dtTime" value="<?php echo $edit_group_item->pubTime ?>" style="font-size:9pt;width:152px; border:#6CF 2px solid;" onClick="WdatePicker()" />
              </p>
              <p class="style">
                PDF地址:

          <input name="pdfpath" class="txt" type="text" id="pdfpath" value="<?php echo $edit_group_item->pdfpath ?>" style="width:60%">
          <input disabled name="pdfupfile" type="file" style="display: none;width:60%">
          <input type="button" name="bt2" value="本地上传" class="bluebutton" onClick="pdfpath.disabled=true;pdfupfile.disabled=false;pdfupfile.style.display='';pdfpath.style.display='none';this.style.display='none'">
              </p>
              <div class="base" id="base">
                <p id="p-adTrigger">期刊出版局：
                <input id="title" name="puby"  value="<?php echo $edit_group_item->puby ?>" />
                </p>
                <p id="p-adTrigger">刊物类型:
                <input id="title" name="type"  value="<?php echo $edit_group_item->type ?>" placeholder="半月刊"/>
                </p>
                <p id="p-adTrigger">刊物顺序:
                <input id="title" name="ordering"  value="<?php echo $edit_group_item->ordering ?>" placeholder="0"/>
                </p>
                <div class="clear"></div>
                <p>宽度<input id="width" disabled="disabled" value="<?php echo paperPicWidth;?>" />(px)  高度<input id="height" disabled="disabled" value="<?php echo paperPicHight;?>" />(px) </p>
              </div>
              <div class="clear"></div>
              <span class="tip"> 提示：发刊时间应填本次出版时间;刊物类型：月刊、周刊等;更新封面需勾选单项选择框！<br />
              </span> 
              </div>
               </td>
          </tr>
        </table>
      </td>
      <td width="69%" valign="top"><?php echo $paper_group->render(); ?></td>
    </tr>
  </table>
</form>
