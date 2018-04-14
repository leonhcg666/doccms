<form name="form1" method="post" enctype="multipart/form-data" action="?p=<?php echo $request['p'] ?>&a=edit&id=<?php echo $request['id']?>">
  <table width="100%" border="0" cellpadding="2" cellspacing="1"  class="admintb">
    <tr class="adtbtitle">
      <td><h3>修改版面信息</h3><a href="javascript:history.back(1)" class="creatbt">返回</a></td>
      <td width="72"><div align="right">
          <input name="submit" type="submit" value=" 保存 " class="savebt"/>
        </div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#FFFFFF">
        <table width="96%" border="0" align="center" cellpadding="0" cellspacing="4">
          <tr>
            <td colspan="2">
              <img id="p<?php echo $edit_item->id ?>" src="<?php echo $edit_item->picpath ?>"width="<?php echo paperPicWidth ?>" height="<?php echo paperPicHight ?>" >
              <input type="hidden" name="url" class="txt" id="url" value="<?php echo $edit_item->url ?>">
              <input type="hidden" name="group_id" value="<?php echo $request['group_id'] ?>">
            </td>
        </tr>
          <tr>
            <td colspan="2"> <?php echo $papers->render(); ?></td>
          </tr>
          <tr>
            <td width="57">标题</td>
            <td><input type="text" class="txt" name="title" id="title" value="<?php echo $edit_item->title ?>" style="width:300px">
              出现顺序
              <input type="text" name="ordering" class="txt" id="ordering" value="<?php echo $edit_item->ordering ?>" style="width:50px"></td>
          </tr>
          
          <tr>
            <td width="57">版面图片</td>
            <td><input name="picpath" class="txt" type="text" value="<?php echo $edit_item->picpath ?>" id="picpath" style="width:60%">
              <input disabled name="uploadfile" type="file" style="display: none;width:60%">
              <input type="button" name="bt2" value="本地上传" class="bluebutton" onClick="picpath.disabled=true;uploadfile.disabled=false;uploadfile.style.display='';picpath.style.display='none';this.style.display='none'">　<span style="color:red">提示错误则刷新</span></td>
          </tr>
          <tr>
          <td width="57">PDF地址</td>
          <td>
          <input name="pdfpath" class="txt" type="text" id="pdfpath" value="<?php echo $edit_item->pdfpath ?>" style="width:60%">
          <input disabled name="pdfupfile" type="file" style="display: none;width:60%">
         <input type="button" name="bt2" value="本地上传" class="bluebutton" onClick="pdfpath.disabled=true;pdfupfile.disabled=false;pdfupfile.style.display='';pdfpath.style.display='none';this.style.display='none'">
          </td>
        </tr>
          <tr>
            <td colspan="2">图片注释
              <p>
                <textarea name="description" rows="3" class="txt" id="description" style="width:96%"><?php echo $edit_item->description ?></textarea>
                <br />
                [如果您的图片上已经有了注释,这里也可以不填写] </p></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<link media="screen" rel="stylesheet" href="/inc/css/jquery.tag.css" type="text/css" />
<link media="screen" rel="stylesheet" href="/inc/css/jquery-ui.custom.css" type="text/css" />
<script type='text/javascript' src='/inc/js/jq.custom.js'></script>
<script type='text/javascript' src='/inc/js/jquery.tag.min.js'></script>
<style>
  .tc .blk{width:900px;background: #fff;padding: 20px 20px;}
  .tc .blk h2{color:#aaa;}
  a.closeBtn{position:absolute;top:10px;right:10px;display:block;width:60px;padding:4px 0;text-align:center;background:#fff;border:1px solid #85B6E2;color:#333;}
  a.closeBtn:hover{color:#fff;border:1px solid #85B6E2;background:#85B6E2;}
  .jTagLabels{width:300%;}
</style>
<script>
 $(document).ready(function(){
        $("#p<?php echo $edit_item->id ?>").tag({
          canDelete: false,
          canTag: true,
          save: function(width,height,top_pos,left,label,the_tag){
              $.post("?p=<?php echo $request['p'] ?>&a=lists",{'action':'save','paperID':<?php echo $edit_item->id?>,'pwidth':width,'pheight':height,'ptop':top_pos,'pleft':left,'title':label},function(id){
                the_tag.setId(id);
                if(id>0){alert("选择成功！");window.location.reload();}
              });
            },
          remove: function(id){
              $.post("?p=<?php echo $request['p'] ?>&a=lists",{'action':'delete','id':id});
            }
        });
        $.getJSON("?p=<?php echo $request['p'] ?>&a=lists&id=<?php echo $edit_item->id?>",{'action':'list'},function(tags){
          $.each(tags, function(key,tag){
            $("#p<?php echo $edit_item->id ?>").addTag(tag.pwidth,tag.pheight,tag.ptop,tag.pleft,tag.title,tag.id);
          });
        });
        // var tags='[{"id":"3","title":"11","pwidth":"100","pheight":"100","ptop":"318","left":"280"},{"id":"2","title":"1024","pwidth":"100","pheight":"100","ptop":"387","left":"137"},{"id":"1","title":"9999","pwidth":"324","pheight":"221","ptop":"319","left":"0"}]';
        // $.each(tags, function(key,tag){
        //     $("#p<?php echo $edit_item->id ?>").addTag(tag.pwidth,tag.pheight,tag.ptop,tag.left,tag.title,tag.id);
        //   });
  });
</script>
