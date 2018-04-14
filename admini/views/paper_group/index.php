<form name="form1" method="post" action="?p=<?php echo $request['p'] ?>">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="admintb">
  <tr class="adtbtitle">
    <td><h3>报刊管理</h3>
    <a href="?p=<?php echo $request['p'] ?>&a=create_group" class="creatbt">创建刊物名称</a></td>
    <td width="72"><div align="right">
        <input name="submit" type="submit" value=" 保存 " class="savebt" />
      </div></td>
  </tr>
  <tr>
    <td bgcolor="#ffffff" colspan="2"><?php echo $paper_group->render(); ?></td>
  </tr>
</table>
</form>
