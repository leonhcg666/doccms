<?php
    // 为方便并保证您以后的快速升级 请使用SHL提供的如下全局数组
    
    // 数组定义/config/doc-global.php
    
    // 如有需要， 请去掉注释，输出数据。
    /*
    echo '<pre>';
        print_r($tag);
    echo '</pre>';
    */
?>
<style>
/*======中间部分内======*/
a{ text-decoration:none;}
.neir{font-family:"\5FAE\8F6F\96C5\9ED1","Microsoft Yahei","Hiragino Sans GB",tahoma,arial,"\5B8B\4F53"}
</style>

<?php 
    //2011-09-10
    $data=$tag['data.row']; 
?>
<div class="title" style="text-align: center; font-size: 20px;margin-bottom: 20px;">
    <p><?php echo $data['title']; ?></p>
</div>
<div style="font-size: 12px;margin: 0 20px">
    <span><?php echo date('Y-m-d',strtotime($data['dtTime'])) ?></span><span>　作者：<?php echo $data['author']; ?></span><span style="float: right;">点击量：<?php echo $data['counts']; ?></span>
    <hr style="margin: 5px 0 10px 0;width: 710px;">
</div>
<div class="neir" style="margin: 10px 20px;min-height: 500px;">
    <p><?php echo $data['content']; ?></p>
</div>
<div style="float: right;margin-right: 20px;margin-top: 20px;">
    <p ><a href="" style="color: #0D8110">(Top) 返回页面顶端</a></p>
</div>
<div>
    <hr style="margin: 0 ;padding: 0;width: 100%">
</div>
<div style="margin-top: 10px;margin-left: 10px;font-size: 13px">
<?php 
    $is_up=$tag['pager.data.up'];
    $is_down=$tag['pager.data.down'];
    if(is_array($is_down))
    {
    ?>
    <p>下一篇：<a href="<?php echo sys_href($params['id'],'list',$is_down['id'])?>"><?php echo $is_down['title']; ?></a></p>
    <?php 
    }   
    if(is_array($is_up))
    {
    ?>
    <p>上一篇：<a href="<?php echo sys_href($params['id'],'list',$is_up['id'])?>"><?php echo $is_up['title']; ?></a> </p>
    <?php   
    }   
    unset($is_up);
    unset($is_down);
?>
</div>