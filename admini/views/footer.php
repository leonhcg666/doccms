</div>
<div class="footer">
	<div></div>
	<p><a href="<?php echo ROOTPATH ?>/" target="_blank"><?php if(cnStrLen(htmlspecialchars(stripslashes(SITENAME)))>45)echo cnSubStr(htmlspecialchars(stripslashes(SITENAME)),0,45).'..'; else echo htmlspecialchars(stripslashes(SITENAME)); ?></a> - © CopyRight 2017 - <?php echo date("Y"); ?>, Power by <a href="http://www.iwangle.me/" target="_blank">wangle</a>, Inc.</p>
	<p>Build: <?php echo VERSION; ?>   GMT+<?php echo TIMEZONENAME; ?>, <?php echo date('Y-m-d H:i');?> ,  This web page is started at <?php echo cmsbirthday;?> , Cache <?php if(intval(CACHETIME)>0) echo 'enabled'; else echo 'disabled';?></p>
</div>
</body>
</html>