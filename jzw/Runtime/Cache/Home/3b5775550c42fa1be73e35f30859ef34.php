<?php if (!defined('THINK_PATH')) exit();?><div style="margin:0px 0px 0px 500px">
<img src="/picture/<?php echo ($id); ?>.jpg" style="height:350px" ><br/>
身份证号：<?php echo ($id_card); ?><br/><br/>
<form action="/index.php/Admin/checkid_ok" method="post" style="display:inline-block">
<input type="hidden" name="type" value="2">
<input type="hidden" name="id" value="<?php echo ($id); ?>">
<input type="submit" value="通过" />
</form>
<form action="/index.php/Admin/checkid_ok" method="post" style="display:inline-block;padding-left:30px;">
<input type="hidden" name="type" value="0">
<input type="hidden" name="id" value="<?php echo ($id); ?>">
<input type="submit" value="拒绝" />
</form>
</div>