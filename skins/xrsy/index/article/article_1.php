<!-- <li>&middot;<a href="<?php echo sys_href($data['channelId'].'&i='.$data['id'])?>" <?php echo $data['style']; ?>><?php echo $data['title']; ?></a></li> -->
<?php $dp = $data['pageId'] +1; ?>
<div class="ztdt-col-md col-xs-6">
    <span> <a href="<?php echo sys_href($data['channelId'].'&i='.$data['id'].'&mdtp='.$dp)?>"><p> 查看详情</p></a></span>
        <img src="<?php echo $data['originalPic'];?>" style="width: 232px; height: 151px;" alt="创新创业" class="img-thumbnail img-responsive">
    <div class="jsname" >
      <a href="<?php echo sys_href($data['channelId'].'&i='.$data['id'].'&mdtp='.$dp)?>"><?php echo $data['title'];?></a>
    </div>
</div>


