<?php
require './header.php';
header("Content-Type:text/html;charset=utf-8");
?>
<h1>后台文章管理页面</h1>
<form method="post">
	文章分类：
	<select name="category">
		<?php foreach ($category as $v):?>
			<option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
		<?php endforeach;?>
	</select>
	<a href="category.php">分类管理</a><br>
    标题:<input type="text" name="title"><br>
    作者:<input type="text" name="author">
	<div>
        <link href="./umeditor/themes/default/css/umeditor.min.css" rel="stylesheet">
        <script src="./umeditor/third-party/jquery.min.js"></script>
        <script src="./umeditor/umeditor.config.js"></script>
        <script src="./umeditor/umeditor.min.js"></script>
        <script src="./umeditor/lang/zh-cn/zh-cn.js"></script>
        <script>
            $(function () {
                UM.getEditor('myEditor');
            });
        </script>
        <script type="text/plain" id="myEditor" style="width: 1025px;height: 250px" name="content">
            <p>添加文章内容......</p>
        </script>
    </div>
	<input type="submit" value="提交">
    <input type="button" value="取消" onclick="{if(confirm('确定要取消添加文章吗?')){window.location.href='index.php';}return false;}">
</form>