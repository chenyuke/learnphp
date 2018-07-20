<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/20
 * Time: 13:57
 */
namespace core\lib;

class model extends \PDO{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=php';
        $username = 'root';
        $passwd = '';
        try{
            parent::__construct($dsn, $username, $passwd);
            $this->exec("SET NAMES 'utf8';");
        }catch (\PDOException $exception){
            p($exception->getMessage());
        }

    }

}