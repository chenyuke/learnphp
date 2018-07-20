<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/19
 * Time: 17:35
 */

namespace app\ctrl;
use core\imooc;

class indexCtrl extends imooc {
    public function index(){

        /*$model = new \core\lib\model();
        $sql = 'select * from book';
        $ret = $model->query($sql);
        p($ret->fetchAll());*/
        $value = 'hello world';
        $this->assign('data',$value);
        $this->display('index.html');
    }
}