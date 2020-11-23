<?php
function autoload($class_name){
    include $class_name. '.php';
}
spl_autoload_register('autoload');
class gg
{
    var $pdoMysql;

    public function __construct(){
        $this->pdoMysql=new pdoMysql();
    }
    public function selectAll(){
        $pdo=$this->pdoMysql->openConnection();
        $result = $pdo->query("select * from pet");
        $this->pdoMysql->closeConnection();
        return $result;
    }
    public function selectType(){
        $pdo=$this->pdoMysql->openConnection();
        $result = $pdo->query("select * from pet where status!=1");
        $this->pdoMysql->closeConnection();
        return $result;
    }
    public  function selectMyPet(){
        $pdo=$this->pdoMysql->openConnection();
        $result = $pdo->query("select * from pet where status=1");
        $this->pdoMysql->closeConnection();
        return $result;
    }
    public function updateType($id){
        $pdo=$this->pdoMysql->openConnection();
        $pdo->exec("update pet set status=1 where id=$id");
        $this->pdoMysql->closeConnection();
    }
    public function getPrice($id){
        $pdo=$this->pdoMysql->openConnection();
        $result = $pdo->query("select price from pet where id=$id");
        $this->pdoMysql->closeConnection();
        return $result;
    }
    public function getMoney($username){
        $pdo=$this->pdoMysql->openConnection();
        $result = $pdo->query("select money from user where name='$username'");
        $this->pdoMysql->closeConnection();
        return $result;
    }
    public function setMoney($newMoney,$username){
        $pdo=$this->pdoMysql->openConnection();
        $pdo->exec("update user set money=$newMoney where name='$username'");
        $this->pdoMysql->closeConnection();
    }
    public function getHealth($id){
        $pdo=$this->pdoMysql->openConnection();
        $result = $pdo->query("select health from pet where id=$id");
        $this->pdoMysql->closeConnection();
        return $result;
    }
    public function setHealth($id,$health){
        $pdo=$this->pdoMysql->openConnection();
        $pdo->exec("update pet set health=$health where id=$id");
        $this->pdoMysql->closeConnection();
    }
    public function getIntimacy($id){
        $pdo=$this->pdoMysql->openConnection();
        $result = $pdo->query("select intimacy from pet where id=$id");
        $this->pdoMysql->closeConnection();
        return $result;
    }
    public function setIntimacy($id,$intimacy){
        $pdo=$this->pdoMysql->openConnection();
        $pdo->exec("update pet set intimacy=$intimacy where id=$id");
        $this->pdoMysql->closeConnection();
    }
}