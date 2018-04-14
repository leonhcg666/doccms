<!-- <li><a href="<?php echo sys_href($data['channelId'],'list',$data['id'])?>"><?php echo $data['title']; ?></a></li> -->

<li>
   <a href="<?php echo sys_href($data['channelId'],'list',$data['id'])?>"><?php echo $data['title']; ?></a>
   <span class="news-date"><?php echo date('[m-d]',strtotime($data['dtTime'])); ?></span>
</li>