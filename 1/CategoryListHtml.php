<?php
	require './header.php';
	header("Content-Type:text/html;charset=utf-8");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<h1>后台文章分类管理</h1>
<form action="?action=add" method="post">
	分类名称:<input type="text" name="name">
    <input type="submit" value="添加">
</form>

<form method="post" action="?action=order">
<table border="1" cellpadding="3" cellspacing="0" width="20%">
	<tr bgcolor="skyblue">
		<td align="center">排序</td>
		<td align="center">分类名称</td>
		<td align="center">操作</td>
	</tr>
	<?php foreach ($category as $v):?>
            <tr>
                <td><input type="text" name="<?php echo $v['id'];?>" value="<?php echo $v['sort'];?>"></td>
                <td><?php echo $v['name'];?></td>
                <td><a href="#">删除</a>|<a href="">编辑</a> </td>
            </tr>
    <?php endforeach;?>
</table>
<div><input type="submit" value="保存排序"></div>
</form>