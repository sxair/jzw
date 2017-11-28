<?php if (!defined('THINK_PATH')) exit();?><table style="width:97%;margin:5px;text-align:center">
    <tr style="background:#D2F9F9">
        <th style="width:10%">编号</th>
        <th style="width:60%">标题</th>
        <th style="width:30%">操作</th>
    </tr>
    <?php if(is_array($qz)): $i = 0; $__LIST__ = $qz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo[qiuzhi_id] != ''): ?><tr><td><?php echo ($vo["qiuzhi_id"]); ?></td>
     		<td><a href="<?php echo U('/Jz/qzinfo',array('id'=>$vo[qiuzhi_id]));?>"  target="_Blank"><?php echo ($vo["title"]); ?></a></td>
	        <td><a href="<?php echo U('/Jz/reqzpage',array(qiuzhi_id=>$vo[qiuzhi_id]));?>">修改</a>&nbsp&nbsp&nbsp
            <?php if($vo[status] == 0): ?><a href="<?php echo U('/Jz/reqzstatus',array(status=>1,qiuzhi_id=>$vo[qiuzhi_id]));?>">已工作</a>
            <?php else: ?>
            <a href="<?php echo U('/Jz/reqzstatus',array(status=>0,qiuzhi_id=>$vo[qiuzhi_id]));?>">求职</a><?php endif; ?>
            &nbsp&nbsp&nbsp&nbsp<a href="<?php echo U('/Jz/delqz',array(qiuzhi_id=>$vo[qiuzhi_id]));?>">删除</a></td>
            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </table>