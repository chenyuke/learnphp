<?php
class MysqlPdo{
    private $dbConfig=array(
        'db'=>'mysql',
        'host'=>'localhost',
        'port'=>'3306',
        'user'=>'root',
        'pwd'=>'',
        'charset'=>'utf8_bin',
        'dbname'=>'php'
    );
    private static $instance;  //单例模式
    private $db;   //PDO实例
    private $data=array(); //操作数据
    private function __construct($params)
    {
        $this->dbConfig=array_merge($this->dbConfig,$params);
        $this->connect();
    }
    //连接服务器
    private function connect(){
        //mysql:host=localhost
        //mysql:host:localhost;port=3306;dbname=php;charset=utf-8
        //$dsn="{$this->dbConfig['db']}:host={$this->dbConfig['host']};port={$this->dbConfig['port']};dbname={$this->dbConfig['dbname']};charset={$this->dbConfig['charset']}";
        $dsn="{$this->dbConfig['db']}:host={$this->dbConfig['host']};port={$this->dbConfig['port']};dbname={$this->dbConfig['dbname']}";
		try{
            //实例化PDO
            $this->db=new PDO($dsn,$this->dbConfig['user'],$this->dbConfig['pwd'],array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
			$this->db->exec("SET NAMES 'utf8';"); 
        }catch (PDOException $exception){
            die("数据库连接失败".$exception->getMessage());
        }
    }
    public static function getInstance($params=array()){
        if(!self::$instance instanceof self){
            self::$instance=new self($params);
        }
        return self::$instance; //返回对象
    }
    //私有化克隆,防止外部调用clone $对象 生成新的对象,因为是单例模式
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    //通过预处理方式执行sql
    public function query($sql,$batch=false){
        $data=$batch?$this->data:array($this->data);
        $this->data=array();
        //通过预处理方式执行SQL
        $stmt=$this->db->prepare($sql);
        foreach($data as $v){
            if($stmt->execute($v)===false){
                die("数据库PDO预处理操作失败");
            }
        }
        return $stmt;
    }
    public function data($data){
        $this->data=$data;
        return $this; //返回对象自身用于连贯操作
    }
    //取得一行结果
    public function fetchRow($sql){
        return $this->query($sql)->fetch(PDO::FETCH_ASSOC);//返回索引数组
    }
    //取得多行结果
    public function fetchAll($sql){
        return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}