<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/19
 * Time: 11:40
 */
namespace core\lib;
class route{
    public $ctrl;
    public $action;
    //private $my_request_url;
    function __construct()
    {
        //p($_SERVER);
        // /yk/study/imooc/index.php/index/index
        // 因为教程是放跟目录，所以这一步自己做了处理，只是为了和教程同步
        if(isset($_SERVER['REQUEST_URI'])){
            $my_request_url = substr($_SERVER['REQUEST_URI'],25);
        }
        //p($my_request_url);

        if(isset($my_request_url) && $my_request_url != '/'){
            $pathArr = explode('/',trim($my_request_url,'/'));
            if(isset($pathArr[0])){
                $this->ctrl = $pathArr[0];
            }
            if(isset($pathArr[1])){
                $this->action = $pathArr[1];
            }
            $count = count($pathArr);
            $i = 2;
            while ($i < $count){
                if(isset($pathArr[$i+1])){
                    $_GET[$pathArr[$i]] = $pathArr[$i+1];
                }
                $i = $i + 2;
            }

            p($_GET);
        }else{
            $this->ctrl = 'index';
            $this->action = 'index';
        }
    }
}