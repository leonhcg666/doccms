<li>
    <div class="tpcp " style="border-radius: 5px;">
        <div style="float: left;padding-left: 5px">
            <img src="<?php echo ispic($data['originalPic']); ?>" style="padding-top: 8px;  height:80px; width: 110px;">
        </div>
        <div class="tpxx" >
            <a href="<?php echo sys_href($data['channelId'],'list',$data['id'])?>">
                <h4 class="tptit" title="<?php echo $data['title']; ?>"><?php echo $data['title']; ?></h4>
                <p class="" style="font-size: 14px;color: #ADADAD"><?php echo $data['description']; ?></p>
            </a>
        </div>
    </div>
</li>