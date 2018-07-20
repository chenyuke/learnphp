<?php
	require('./Init.php');	
	require './Header.php';
	
	$a=isset($_GET['action'])?$_GET['action']:"";
	if($a=='add'){
		$data['name']=trim(htmlspecialchars($_POST['name']));
		if($data['name']===''){
			$error[]='文章分类名称不能为空!';
		}else{
			$sql="select id from cms_category where name=:name";
			if($db->data($data)->fetchRow($sql)){
				$error[]="该文章分类已存在";
			}else{
				 //插入到数据库
				$sql="insert into cms_category(name)values(:name)";
				$db->data($data)->query($sql);
				$error[]="success";
			}
		}
	}elseif($a=='order'){
		$sql="select id from cms_category";
		$result=$db->fetchAll($sql);
		$data=array();
		foreach($result as $v){
			$data[]=array(
				'id'=>intval($v['id']),
				'sort'=>isset($_POST[$v['id']])?intval($_POST[$v['id']]):0
			);
		}
		$sql="update cms_category set sort=:sort where id=:id";
		$db->data($data)->query($sql,true);
	}
	
	$sql="select id,name,sort from cms_category order by sort";
	$category=$db->fetchAll($sql);
	
	require './CategoryListHtml.php';
	require './ArticleAddHtml.php';
	
?>