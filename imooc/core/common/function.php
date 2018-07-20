<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/19
 * Time: 10:32
 */
function p($var){
    if(is_bool($var)){
        var_dump($var);
    }else if(is_null($var)){
        var_dump(NULL);
    }else{
        echo "<pre>".print_r($var,true)."</pre>";
    }
}