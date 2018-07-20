<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/19
 * Time: 10:48
 */

namespace core;
class imooc{
    public static $classMap = array();
    public $assign;
    static public function run(){
        p("ok");
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $clctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        if(isset($ctrlFile)){
            include $ctrlFile;
            $ctrl = new $clctrlClass();
            $ctrl->$action();
        }else{
            throw new \Exception('找不到控制器'.$ctrlClass);
        }

    }
    static public function load($class){
        if(isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\','/',$class);
            $file = IMOOC.$class.'.php';
            if(is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }
    }

    public function assign($name,$value){
        $this->assign[$name] = $value;
    }
    public function display($file){
        $file = APP.'/views/'.$file;
        if(is_file($file)){
            extract($this->assign);
            include $file;
        }
    }
}