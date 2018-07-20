<?php
require './init.php';
$sql='select id,name from cms_category order by sort';
$category=$db->fetchAll($sql);
if (!empty($_POST)){
    //获取文章分类
    $data['cid']=isset($_POST['category'])?abs(intval($_POST['category'])):0;
    //获取文章标题
    $data['title']=isset($_POST['title'])?trim(htmlspecialchars($_POST['title'])):'';
    //获取作者
    $data['author']=isset($_POST['author'])?trim(htmlspecialchars($_POST['author'])):'';
    //获取文章内容
    $data['content']=isset($_POST['content'])?trim($_POST['content']):'';
	if(empty($data['cid'])){
		$error[]=$data['cid'];
	}
    if(empty($data['cid'])||empty($data['title'])||empty($data['author'])){
        $error[]='cid='.$data['cid'].'|title='.$data['title'].'|author='.$data['author'];
    }else{
        $sql="insert into cms_article(title,content,author,addtime,cid)values(:title,:content,:author,now(),:cid)";
        $db->data($data)->query($sql);
        //跳转到首页
        header("location:index.php");
    }
}
require './ArticleAddHtml.php';